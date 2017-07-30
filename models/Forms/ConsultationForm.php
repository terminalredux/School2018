<?php

namespace app\models\Forms;

use app\models\Consultation\Consultation;



class ConsultationForm extends Consultation
{
    const SCENARIO_CREATE = 'create-consultation'; 
    
    public $building;
    public $date;
    public $time_begin;
    public $time_end;
    
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
             self::SCENARIO_CREATE => ['date', 'time_begin', 'time_end', 'room_id', 'additional_info'],
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['date', 'time_begin', 'time_end'], 'required', 'on' => self::SCENARIO_CREATE],
            [['date', 'time_begin', 'time_end'], 'safe'],
        ]);
    }
    
    /**
     * Saving a single consultation date
     * @return bool
     */
    public function saveConsultation() 
    {
        $beginStr = $this->date . ' ' . $this->time_begin;
        $endStr = $this->date . ' ' . $this->time_end;
        
        $this->begin = strtotime($beginStr); 
        $this->end = strtotime($endStr); 
     
        return $this->save();
    }
   
}