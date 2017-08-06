<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <?= $title ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
            </div>
            <div class="col-md-4">
                <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['style' => 'width: 100%;','class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            </div>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>








