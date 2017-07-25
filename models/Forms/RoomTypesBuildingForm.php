<?php

namespace app\models\Forms;

use app\models\RoomType\RoomType;
use app\models\RoomTypeBuilding\RoomTypeBuilding;

class RoomTypesBuildingForm extends RoomType
{
    public $acceptedRomeTypes;
    public $allRoomTypes;
    
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
            [['acceptedRomeTypes', 'allRoomTypes'], 'safe']
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
        $toomTypesIDsToChoose = explode(',', $this->allRoomTypes);
      
        $temp = array_merge($roomTypeIDs, $toomTypesIDsToChoose);
        $duplicates = [];
        foreach(array_count_values($temp) as $val => $c) {
            if($c > 1) {
                $duplicates[] = $val;
            }
        }
        
        if (!empty($duplicates)) { // JEŚLI JEST DUPLIKAT W DWOCH SORTABLE
           $results =  $roomTypeIDs; 
        } else {
            $results =  $roomTypeIDs;
        }
        
        //delete previous
        $roomTypeBuildings = RoomTypeBuilding::find()->andWhere(['building_id' => $buildingId])->all();
        if ($roomTypeBuildings) {
            foreach ($roomTypeBuildings as $roomTypeBuilding) {
                if(!$roomTypeBuilding->delete()){
                   $successDelete = false; 
                }
            }
        } 
        
        //saves all sortable list
        if (!empty($results[0])) {
            foreach ($results as $room_type_id) {
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