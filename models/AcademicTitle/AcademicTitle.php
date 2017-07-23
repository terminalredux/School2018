<?php

namespace app\models\AcademicTitle;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

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
    const SCENARIO_CREATE = 'create-academic-title';
    const SCENARIO_ORDER = 'order-academic-title';
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_CREATE => ['short', 'full'],
        ]);
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
            [['short', 'full'], 'required', 'on' => self::SCENARIO_CREATE],
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
    
    public function generateOrderItems($models)
    {
        return ArrayHelper::map($models, 'id', 'sortableItemName');
    }
    
    public function getSortableItemName()
    {
        return ['content' => $this->short];
    }
    
    /**
     * Purpose of this method: order is
     * generated dynamicaly based on the
     * highest searched value
     * @return bool
     */
    public function saveAcademicTitle()
    {
        $maxOrderValue = AcademicTitle::find()->select('max(academic_title.order)')->scalar();
        $this->order = $maxOrderValue + 1;
        return $this->save();
    }
    
    
    
}
