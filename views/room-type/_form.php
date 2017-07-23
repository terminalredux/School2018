<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="room-type-form">
    <div class="panel panel-default">
        <div class="panel-heading"><?= $title ?></div>
        <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => 'btn btn-success']) ?>
        <?php ActiveForm::end(); ?>
        </div>
    </div>   

</div>
