<?php

namespace app\models\Forms;

use app\models\RoomType\RoomType;

class RoomTypesBuildingForm extends RoomType
{
   
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
        
          
        ]);
    }
    
   
}