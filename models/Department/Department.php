<?php

namespace app\models\Department;

use app\models\Major\Major;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "department".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $short_name
 */
class Department extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'department';
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
            [['name', 'short_name'], 'required'],
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['short_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'department.id'),
            'name' => Yii::t('app', 'department.name'),
            'description' => Yii::t('app', 'department.description'),
            'status' => Yii::t('app', 'department.status'),
            'created_at' => Yii::t('app', 'department.created_at'),
            'updated_at' => Yii::t('app', 'department.updated_at'),
            'short_name' => Yii::t('app', 'department.short_name'),
        ];
    }

    /**
     * @inheritdoc
     * @return DepartmentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DepartmentQuery(get_called_class());
    }
    
    /**
     * @return ActiveQuery
     */
    public function getMajors()
    {
        return $this->hasMany(Major::className(), ['department_id' => 'id']);
    }

}
