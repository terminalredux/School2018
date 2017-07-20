<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AcademicTitle\AcademicTitle */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="academic-title-form">
    <div class="col-md-6">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'short')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'full')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'order')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'academic_title.save') : Yii::t('app', 'academic_title.update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>
    <?php ActiveForm::end(); ?>

</div>
