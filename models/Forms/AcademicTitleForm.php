<?php

namespace app\models\Forms;

use app\models\AcademicTitle\AcademicTitle;



class AcademicTitleForm extends AcademicTitle
{
    public $orderItem; 
    
    //return array_merge(parent::behaviors(), [
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            ['orderItem', 'safe']
        ]);
    }
}