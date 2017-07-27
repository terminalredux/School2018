<?php

namespace app\models\Building;

use app\models\RoomTypeBuilding\RoomTypeBuilding;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "building".
 *
 * @property integer $id
 * @property string $name
 * @property string $street
 * @property string $street_number
 * @property string $city
 * @property string $postcode
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class Building extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'building';
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
            [['name', 'street', 'street_number', 'city', 'postcode'], 'required'],
            [['description'], 'string'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 100],
            [['street', 'city'], 'string', 'max' => 50],
            [['street_number'], 'string', 'max' => 10],
            [['postcode'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'building.id'),
            'name' => Yii::t('app', 'building.name'),
            'street' => Yii::t('app', 'building.street'),
            'street_number' => Yii::t('app', 'building.street_number'),
            'city' => Yii::t('app', 'building.city'),
            'postcode' => Yii::t('app', 'building.postcode'),
            'description' => Yii::t('app', 'building.description'),
            'status' => Yii::t('app', 'building.status'),
            'created_at' => Yii::t('app', 'building.created_at'),
            'updated_at' => Yii::t('app', 'building.updated_at'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getRoomTypeBuildings()
    {
        return $this->hasMany(RoomTypeBuilding::className(), ['building_id' => 'id']);
    }
    
    
    /**
     * @inheritdoc
     * @return BuildingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BuildingQuery(get_called_class());
    }
}
