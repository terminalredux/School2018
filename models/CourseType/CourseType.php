<?php

namespace app\models\CourseType;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "course_type".
 *
 * @property integer $id
 * @property string $type
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CourseType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_type';
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
            [['type'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['type'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'course_type.id'),
            'type' => Yii::t('app', 'course_type.type'),
            'status' => Yii::t('app', 'course_type.status'),
            'created_at' => Yii::t('app', 'course_type.create_a'),
            'updated_at' => Yii::t('app', 'course_type.update_at'),
        ];
    }

    /**
     * @inheritdoc
     * @return CourseTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseTypeQuery(get_called_class());
    }
}
