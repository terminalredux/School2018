<?php

use app\models\Building\Building;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker;

$this->title = $modelProfessor->fullname . ' ' . Yii::t('app', 'consultation.consultations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['/professor/index']];
$this->params['breadcrumbs'][] = ['label' => $modelProfessor->fullnameTitle , 'url' => ['/professor/view', 'id' => $modelProfessor->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'consultation.consultations') ];


?>
<h3><?= Yii::t('app', 'consultation.consultations') . ': ' ?><strong><?= $modelProfessor->fullnameTitle ?></strong></h3>
<div>
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'building')->dropDownList(Building::getBuildingsList(), [
        'prompt' => Yii::t('app', 'building.select_building'),
        'onChange' => '
            $.post("/consultation/rooms-list?buildingId=' . '"+$(this).val(), function(data) {
                $("select#consultationform-room_id").html(data);
            });',
    ]) ?>
    <?= $form->field($model, 'room_id')->dropDownList([])->label(Yii::t('app', 'room.room')) ?>
    <?= 
        $form->field($model, 'date')->widget(DatePicker::className(), [
             'type' => DatePicker::TYPE_COMPONENT_APPEND,
            'pluginOptions' => [
                'format' => 'D, dd-M-yyyy'
            ],
        ]); 
    ?>
    
    <?= $form->field($model, 'time_begin')->textInput() ?>
    <?= $form->field($model, 'time_end')->textInput() ?>
    <?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>
    <?= $form->field($model, 'status')->textInput() ?>

    <?= Html::submitButton(Yii::t('app', 'system.add') ,['class' => 'btn btn-success']) ?>
   
    <?php ActiveForm::end(); ?>
</div>