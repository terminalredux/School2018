<?php

namespace app\models\Major;

use app\models\Department\Department;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "major".
 *
 * @property integer $id
 * @property integer $department_id
 * @property string $name
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Department $department
 */
class Major extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'major';
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
            [['department_id', 'name'], 'required'],
            [['department_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 100],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'major.id'),
            'department_id' => Yii::t('app', 'major.department_id'),
            'name' => Yii::t('app', 'major.name'),
            'description' => Yii::t('app', 'major.description'),
            'status' => Yii::t('app', 'major.status'),
            'created_at' => Yii::t('app', 'major.created_at'),
            'updated_at' => Yii::t('app', 'major.updated_at'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }

    /**
     * @inheritdoc
     * @return MajorQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MajorQuery(get_called_class());
    }
}
