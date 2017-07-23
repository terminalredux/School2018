<?php

namespace app\models\Forms;

use app\models\AcademicTitle\AcademicTitle;



class AcademicTitleForm extends AcademicTitle
{
    public $orderItem; 
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        return array_merge(parent::scenarios(), [
            self::SCENARIO_ORDER => ['orderItem'],
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_merge(parent::rules(), [
            [['orderItem'], 'required', 'on' => self::SCENARIO_ORDER],
            ['orderItem', 'safe']
        ]);
    }
    
    /**
     * @return bool
     */
    public function saveOrder()
    {
        $success = true;
        $itemsID = explode(',', $this->orderItem);
     
        foreach ($itemsID as $key => $value) {
            $model = AcademicTitle::find()->andWhere(['id' => $value])->limit(1)->one();
            if ($model) {
                $model->order = $key;
                if (!$model->save()) {
                    $success = false;
                }
            }
        }
        return $success;
    }
}