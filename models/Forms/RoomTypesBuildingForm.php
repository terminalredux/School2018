<?php

namespace app\models\Forms;

use app\models\RoomType\RoomType;
use app\models\RoomTypeBuilding\RoomTypeBuilding;

class RoomTypesBuildingForm extends RoomType
{
    public $acceptedRomeTypes;
    
    /**
     * @inheritdoc
     
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_ORDER => ['orderItem'],
        ]);
    }*/
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            //[['orderItem'], 'required', 'on' => self::SCENARIO_ORDER],
            ['acceptedRomeTypes', 'safe']
        ]);
    }
    
    /**
     * @param int buildingId
     * @return bool
     */
    public function saveBuildingRoomType($buildingId)
    {
        $successSave = true;
        $successDelete = true;
        $roomTypeIDs = explode(',', $this->acceptedRomeTypes);
       
        //delete previous
        $roomTypeBuildings = RoomTypeBuilding::find()->andWhere(['building_id' => $buildingId])->all();
        //var_dump($roomTypeBuildings);die;
        if ($roomTypeBuildings) {
            foreach ($roomTypeBuildings as $roomTypeBuilding) {
                if(!$roomTypeBuilding->delete()){
                   $successDelete = false; 
                }
            }
        } 
        
        //saves all sortable list
        if ($roomTypeIDs[0] != "") {
            foreach ($roomTypeIDs as $room_type_id) {
                $roomTypeBuilding = new RoomTypeBuilding();
                $roomTypeBuilding->building_id = $buildingId;
                $roomTypeBuilding->room_type_id = $room_type_id;

                if (!$roomTypeBuilding->save()) {
                    $successSave = false;
                }
            }
        }
       
        return $successSave;
    }
    
}