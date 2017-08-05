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

        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    
        <?php ActiveForm::end(); ?>
    </div>
</div>
    

