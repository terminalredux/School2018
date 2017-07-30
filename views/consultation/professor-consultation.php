<?php

use app\models\Building\Building;
use kartik\date\DatePicker;
use kartik\time\TimePicker;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

$js = <<<JS
       
        $("#consultationform-date").on("change paste keyup", function() {
            var arrayDate = $(this).val().split('-');
            var date = new Date(arrayDate[2], arrayDate[1]-1, arrayDate[0]);
            date.setDate(date.getDate() + 4 - (date.getDay()||7));
            var yearStart = new Date(date.getFullYear(),0,1);
            var weekNo = Math.ceil(( ( (date - yearStart) / 86400000) + 1)/7);
            var weekType;
            if (weekNo % 2) {
                weekType = 'Tydzień nieparzysty';
            } else {
                weekType = 'Tydzień parzysty';
            }
        
            $('#weekType').html(weekType); 
        });
JS;
$this->registerJs($js, View::POS_LOAD);

$this->title = $modelProfessor->fullname . ' ' . Yii::t('app', 'consultation.consultations');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['/professor/index']];
$this->params['breadcrumbs'][] = ['label' => $modelProfessor->fullnameTitle , 'url' => ['/professor/view', 'id' => $modelProfessor->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'consultation.consultations') ];


?>
<h3><?= Yii::t('app', 'consultation.consultations') . ': ' ?><strong><?= $modelProfessor->fullnameTitle ?></strong></h3>
<div class="col-md-6">
    
</div>
<div class="col-md-6">
    <div class="panel panel-default consultation-form">
        <div class="panel-heading">
            <?= Yii::t('app', 'consultation.add_consultation')?>
            <span id="weekType" style="float: right;"></span>
        </div>
        <div class="panel-body">
            <?php $form = ActiveForm::begin(); ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'building')->dropDownList(Building::getBuildingsList(), [
                        'prompt' => Yii::t('app', 'building.select_building'),
                        'onChange' => '
                            $.post("/consultation/rooms-list?buildingId=' . '"+$(this).val(), function(data) {
                                $("select#consultationform-room_id").html(data);
                            });',
                    ]) ?>
                </div>
                <div class="col-md-6">
                     <?= $form->field($model, 'room_id')->dropDownList([])->label(Yii::t('app', 'room.room')) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?= 
                        $form->field($model, 'date')->widget(DatePicker::className(), [
                            'type' => DatePicker::TYPE_COMPONENT_APPEND,
                            'pluginOptions' => [
                                'format' => 'dd-mm-yyyy'
                            ],
                        ]); 
                    ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'time_begin')->widget(TimePicker::className(), [
                        'pluginOptions' => [
                            'showMeridian' => false,
                        ],
                    ]) ?>
                </div>
                <div class="col-md-3">
                    <?= $form->field($model, 'time_end')->widget(TimePicker::className(), [
                        'pluginOptions' => [
                            'showMeridian' => false,
                        ],
                    ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <strong data-toggle="collapse" data-target="#additionalInfo" style="cursor: pointer;">
                            <?= $model->getAttributeLabel('additional_info') ?>
                    </strong>
                    <div id="additionalInfo" class="collapse">
                        <?= $form->field($model, 'additional_info')->textarea(['rows' => 6])->label(false); ?>
                    </div>
                </div>
            </div>
            <br>
            <?= Html::submitButton(Yii::t('app', 'system.add') ,['class' => 'btn btn-success']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>