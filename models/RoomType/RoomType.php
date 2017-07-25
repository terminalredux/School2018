<?php

namespace app\models\RoomType;

use app\models\RoomTypeBuilding\RoomTypeBuilding;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "room_type".
 *
 * @property integer $id
 * @property string $type
 * @property string $description
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 */
class RoomType extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'room_type';
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
            [['description'], 'string'],
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
            'id' => Yii::t('app', 'room_type.id'),
            'type' => Yii::t('app', 'room_type.type'),
            'description' => Yii::t('app', 'room_type.description'),
            'status' => Yii::t('app', 'room_type.status'),
            'created_at' => Yii::t('app', 'room_type.created_at'),
            'updated_at' => Yii::t('app', 'room_type.updated_at'),
        ];
    }

    /**
     * @inheritdoc
     * @return RoomTypeQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new RoomTypeQuery(get_called_class());
    }
    
    public function generateOrderRoomTypes($buildingId)
    {
        $roomTypeIDs = [];
       
        $roomTypesBuilding = RoomTypeBuilding::find()->andWhere(['building_id' => $buildingId])->all();
        if ($roomTypesBuilding) {
            foreach ($roomTypesBuilding as $roomTypeBuilding) {
                array_push($roomTypeIDs, $roomTypeBuilding->room_type_id);
            }
        }
        //var_dump($roomTypeIDs);die;
        
        return ArrayHelper::map(RoomType::find()
                ->andWhere(['status' => 1])
                ->andWhere(['<>','id', $roomTypeIDs])
                ->all(), 'id', 'sortableRoomTypes');
        
        //return ArrayHelper::map($models, 'id', 'sortableRoomTypes');
    }
    
    public function getSortableRoomTypes()
    {
        return ['content' => $this->type];
    }
    
    /**
     * Gets already assigned room types to
     * the specific Building
     * @return array
     */
    public function assignedRoomTypes($buildingId)
    {
        $roomTypeIDs = [];
        $roomTypes = [];
        $roomTypesBuilding = RoomTypeBuilding::find()->andWhere(['building_id' => $buildingId])->all();
        if ($roomTypesBuilding) {
            foreach ($roomTypesBuilding as $roomTypeBuilding) {
                array_push($roomTypeIDs, $roomTypeBuilding->room_type_id);
            }
        }
        
        if (count($roomTypeIDs)) {
            $roomTypes = ArrayHelper::map(RoomType::find()->andWhere(['id' => $roomTypeIDs])->all(), 'id', 'sortableRoomTypes');
        }
        
        return $roomTypes;
    }
}
