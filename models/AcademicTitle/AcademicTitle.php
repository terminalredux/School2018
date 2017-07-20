<?php

namespace app\models\AcademicTitle;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "academic_title".
 *
 * @property integer $id
 * @property string $short
 * @property string $full
 * @property integer $order
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class AcademicTitle extends ActiveRecord
{
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
    public static function tableName()
    {
        return 'academic_title';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['short', 'full', 'order'], 'required'],
            [['order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['short'], 'string', 'max' => 50],
            [['full'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'academic_title.id'),
            'short' => Yii::t('app', 'academic_title.short'),
            'full' => Yii::t('app', 'academic_title.full'),
            'order' => Yii::t('app', 'academic_title.order'),
            'status' => Yii::t('app', 'academic_title.status'),
            'created_at' => Yii::t('app', 'academic_title.created_at'),
            'updated_at' => Yii::t('app', 'academic_title.updated_at'),
        ];
    }

    /**
     * @inheritdoc
     * @return AcademicTitleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AcademicTitleQuery(get_called_class());
    }
}
