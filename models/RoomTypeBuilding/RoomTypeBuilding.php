<?php

namespace app\models\RoomTypeBuilding;

use app\models\Building\Building;
use app\models\Room\Room;
use app\models\RoomType\RoomType;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "room_type_building".
 *
 * @property integer $id
 * @property integer $building_id
 * @property integer $room_type_id
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Building $building
 * @property RoomType $roomType
 */
class RoomTypeBuilding extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_type_building';
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
            ['room_type_id', 'required'],
            [['building_id', 'room_type_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['building_id'], 'exist', 'skipOnError' => true, 'targetClass' => Building::className(), 'targetAttribute' => ['building_id' => 'id']],
            [['room_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomType::className(), 'targetAttribute' => ['room_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'room_type_building.id'),
            'building_id' => Yii::t('app', 'room_type_building.building_id'),
            'room_type_id' => Yii::t('app', 'room_type_building.room_type_id'),
            'status' => Yii::t('app', 'room_type_building.status'),
            'created_at' => Yii::t('app', 'room_type_building.created_at'),
            'updated_at' => Yii::t('app', 'room_type_building.updated_at'),
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getBuilding()
    {
        return $this->hasOne(Building::className(), ['id' => 'building_id']);
    }

    /**
     * @return ActiveQuery
     */
    public function getRoomType()
    {
        return $this->hasOne(RoomType::className(), ['id' => 'room_type_id']);
    }
    
    /**
     * @return ActiveQuery
     */
    public function getRooms()
    {
        return $this->hasMany(Room::className(), ['room_type_building_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return RoomTypeBuildingQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoomTypeBuildingQuery(get_called_class());
    }
    
    /**
     * Removing a RoomTypeBuilding model that
     * is a relation between RoomType and Building 
     * @return bool
     */
    public function deleteRelation($id) 
    {
        $model = RoomTypeBuilding::find()->andWhere(['id' => $id])->limit(1)->one();
        return $model->delete();
    }
    
    /**
     * @return bool
     */
    public function isUsed($id)
    {
        $model = RoomTypeBuilding::find()->andWhere(['id' => $id])->limit(1)->one();
        return $model->rooms;
    }
    
    
    /**
     * Gets all RoomTypeBuilding models of
     * a specific Building
     * @return array
     */
    public static function getAllRoomTypeBuilding($buildingId) 
    {
        $models = RoomTypeBuilding::find()->andWhere(['status' => 1])->andWhere(['building_id' => $buildingId])->all();
        return ArrayHelper::map($models, 'id', 'roomTypeName');
    }
    
    public function getRoomTypeName()
    {
        return $this->roomType->type;
    }
}
