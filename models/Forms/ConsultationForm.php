<?php

namespace app\models\Forms;

use app\models\Consultation\Consultation;



class ConsultationForm extends Consultation
{
    
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
       
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['building', 'date', 'time_begin', 'time_end'], 'safe'],
        ]);
    }
    
   
}