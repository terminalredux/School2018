<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'department_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

   
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
  

    <?php ActiveForm::end(); ?>

