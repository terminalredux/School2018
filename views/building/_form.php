<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="panel panel-default">
    <div class="panel-heading"><?= $title ?></div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
            <?= $form->field($model, 'street')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'street_number')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
            <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-2">
            <?= $form->field($model, 'postcode')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>    
        <div class="row">    
            <div class="col-md-12">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => 'btn btn-success']) ?>
            </div>    
        </div>    

        <?php ActiveForm::end(); ?>
    </div>
</div>
