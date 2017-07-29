<?php

use app\models\RoomTypeBuilding\RoomTypeBuilding;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="panel panel-default">
    
    <div class="panel-heading">
        <?= $title ?>
    </div>
    <div class="panel-body">
    <?php $form = ActiveForm::begin(); ?>    
        
    <?= $form->field($model, 'room_type_building_id')->dropDownList(RoomTypeBuilding::getAllRoomTypeBuilding($buildingId))->label(Yii::t('app', 'room_type.room_types')) ?>
    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
    <?php ActiveForm::end(); ?>
    </div>
</div>
