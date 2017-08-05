<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= Yii::t('app', 'department.update_department') ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-8">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
            </div>
            <div class="col-md-4">
                <?= $form->field($model, 'short_name')->textInput(['maxlength' => true]) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

