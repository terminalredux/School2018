<?php

namespace app\models\Forms;

use app\models\Building\Building;
use app\models\RoomType\RoomType;
use app\models\RoomTypeBuilding\RoomTypeBuilding;
use yii\helpers\ArrayHelper;

class RoomTypesBuildingForm extends RoomType
{
    public $selectedRoomType;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['selectedRoomType', 'safe'],
        ]);
    }
    
    /**
     * Method first check if Building and RoomType exists
     * @param id $buildingId 
     * @return bool
     */
    public function addRoomTypeBuilding($buildingId) 
    {
        $success = true;
        $model = new RoomTypeBuilding();
        
        if (!RoomType::find()->andWhere(['status' => 1])->andWhere(['id' => $this->selectedRoomType])->limit(1)->one()) {
            $success = false;
        }
        
        if ($success) {
            $model->room_type_id = $this->selectedRoomType;
            $model->building_id = $buildingId;
            
            if ($model->save()) {
                return true;
            }
        }
        
        return false;
    }
    
    /**
     * Gets all unadded RoomType models
     * mapped to 'id' and 'type'. 
     * @return array
     */
    public function getsRoomTypes() 
    {
        $models = RoomType::find()->andWhere(['status' => 1])->all();
        
        return ArrayHelper::map($models, 'id', 'type');
    }
    
   
}