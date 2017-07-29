<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = $modelProfessor->fullname . ' ' . Yii::t('app', 'consultation.consultations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['/professor/index']];
$this->params['breadcrumbs'][] = ['label' => $modelProfessor->fullnameTitle , 'url' => ['/professor/view', 'id' => $modelProfessor->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'consultation.consultations') ];


?>
<h3><?= Yii::t('app', 'consultation.consultations') . ': ' ?><strong><?= $modelProfessor->fullnameTitle ?></strong></h3>
<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'professor_id')->textInput() ?>
    <?= $form->field($model, 'room_id')->textInput() ?>
    <?= $form->field($model, 'date')->textInput() ?>
    <?= $form->field($model, 'time_begin')->textInput() ?>
    <?= $form->field($model, 'time_end')->textInput() ?>
    <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->textInput() ?>

    <?= Html::submitButton(Yii::t('app', 'Cre') ,['class' => 'btn btn-success']) ?>
   
    <?php ActiveForm::end(); ?>
</div>