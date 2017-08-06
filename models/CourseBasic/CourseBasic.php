<?php

namespace app\models\CourseBasic;

use Yii;

/**
 * This is the model class for table "course_basic".
 *
 * @property integer $id
 * @property string $name
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class CourseBasic extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'course_basic';
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
            [['name'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'course_basic.id'),
            'name' => Yii::t('app', 'course_basic.name'),
            'status' => Yii::t('app', 'course_basic.status'),
            'created_at' => Yii::t('app', 'course_basic.create_at'),
            'updated_at' => Yii::t('app', 'course_basic.update_at'),
        ];
    }

    /**
     * @inheritdoc
     * @return CourseBasicQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CourseBasicQuery(get_called_class());
    }
}
