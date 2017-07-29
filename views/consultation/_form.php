<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Consultation\Consultation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="consultation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'professor_id')->textInput() ?>

    <?= $form->field($model, 'room_id')->textInput() ?>

    <?= $form->field($model, 'begin')->textInput() ?>

    <?= $form->field($model, 'end')->textInput() ?>

    <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'public')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
