<?php

namespace app\models\Course;

use app\models\CourseBasic\CourseBasic;
use app\models\CourseType\CourseType;
use app\models\Major\Major;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "course".
 *
 * @property integer $id
 * @property integer $course_basic_id
 * @property integer $course_type_id
 * @property integer $major_id
 * @property integer $ects
 * @property integer $total_hours
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property CourseBasic $courseBasic
 * @property CourseType $courseType
 * @property Major $major
 */
class Course extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course';
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['course_basic_id', 'course_type_id', 'major_id', 'ects', 'total_hours'], 'required'],
            [['course_basic_id', 'course_type_id', 'major_id', 'ects', 'total_hours', 'status', 'created_at', 'updated_at'], 'integer'],
            [['course_basic_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseBasic::className(), 'targetAttribute' => ['course_basic_id' => 'id']],
            [['course_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => CourseType::className(), 'targetAttribute' => ['course_type_id' => 'id']],
            [['major_id'], 'exist', 'skipOnError' => true, 'targetClass' => Major::className(), 'targetAttribute' => ['major_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'course.id'),
            'course_basic_id' => Yii::t('app', 'course.course_basic_id'),
            'course_type_id' => Yii::t('app', 'course.course_type_id'),
            'major_id' => Yii::t('app', 'course.major_id'),
            'ects' => Yii::t('app', 'course.ects'),
            'total_hours' => Yii::t('app', 'course.total_hours'),
            'status' => Yii::t('app', 'course.status'),
            'created_at' => Yii::t('app', 'course.create_course_basic'),
            'updated_at' => Yii::t('app', 'course.update_at'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getCourseBasic()
    {
        return $this->hasOne(CourseBasic::className(), ['id' => 'course_basic_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getCourseType()
    {
        return $this->hasOne(CourseType::className(), ['id' => 'course_type_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getMajor()
    {
        return $this->hasOne(Major::className(), ['id' => 'major_id']);
    }

    /**
     * @inheritdoc
     * @return CourseQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseQuery(get_called_class());
    }
}
