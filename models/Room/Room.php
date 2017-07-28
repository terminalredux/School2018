<?php

namespace app\models\Room;

use Yii;

/**
 * This is the model class for table "room".
 *
 * @property integer $id
 * @property integer $room_type_building_id
 * @property string $number
 * @property string $additional_info
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property RoomTypeBuilding $roomTypeBuilding
 */
class Room extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['room_type_building_id', 'number'], 'required'],
            [['room_type_building_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['additional_info'], 'string'],
            [['number'], 'string', 'max' => 50],
            [['room_type_building_id'], 'exist', 'skipOnError' => true, 'targetClass' => RoomTypeBuilding::className(), 'targetAttribute' => ['room_type_building_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'room.id'),
            'room_type_building_id' => Yii::t('app', 'room.room_type_building_id'),
            'number' => Yii::t('app', 'room.number'),
            'additional_info' => Yii::t('app', 'room.additional_info'),
            'status' => Yii::t('app', 'room.status'),
            'created_at' => Yii::t('app', 'room.created_at'),
            'updated_at' => Yii::t('app', 'room.updated_at'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRoomTypeBuilding()
    {
        return $this->hasOne(RoomTypeBuilding::className(), ['id' => 'room_type_building_id']);
    }

    /**
     * @inheritdoc
     * @return RoomQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoomQuery(get_called_class());
    }
}
