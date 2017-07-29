<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consultation\ConsultationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultation-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'professor_id') ?>

    <?= $form->field($model, 'room_id') ?>

    <?= $form->field($model, 'begin') ?>

    <?= $form->field($model, 'end') ?>

    <?php // echo $form->field($model, 'additional_info') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'public') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
