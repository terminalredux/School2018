<?php

use app\models\Building\Building;
use app\models\Consultation\Consultation;
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
<br>
<div class="col-md-6 consultation-result">
    <?php $i = 1 ?>
    <?php foreach ($consultations as $consultation): ?>
    <!-- SETS PANEL COLOR DEPENDING ON STATUS -->
    <?php 
        if ($consultation->status == Consultation::STATUS_ACTIVE && $consultation->public == Consultation::STATUS_PUBLIC) {
            $panelclass = 'consultation-active';
            $headingclass = 'consultation-active-heading';
        } else if ($consultation->status == Consultation::STATUS_CANCEL && $consultation->public == Consultation::STATUS_PUBLIC) {
            $panelclass = 'consultation-cancel';
            $headingclass = 'consultation-cancel-heading';
        }
        else {
            $panelclass = '';
            $headingclass = '';
        }
    ?>
    <!-- -->
        <div class="panel panel-default <?= $panelclass ?>">
            <div class="panel-heading consultation-panel-heading <?= $headingclass ?>">
                <div class="row">
                    <div class="" style="cursor: pointer;" data-toggle="collapse" data-target="<?= '#content' . $consultation->id?>">
                        <div class="col-xs-3">
                            <?= $i . '. ' ?>
                        </div>
                        <div class="col-xs-5 text-center">
                            <?= Yii::$app->formatter->asDate($consultation->begin, 'dd-MM-yyyy') ?>
                        </div>
                        <div class="col-xs-3">
                            <span style="float: right;">
                                <?= Yii::$app->formatter->asTime($consultation->begin, 'H:mm') ?>
                                <?= $consultation->begin ? ' - ' . Yii::$app->formatter->asTime($consultation->end, 'H:mm') : '' ?>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-1">
                        <?php if ($consultation->public): ?>
                        <i class="fa fa-eye" aria-hidden="true" title="<?= Yii::t('app', 'system.public') ?>"></i>
                        <?php else: ?>
                            <?= Html::a('<i class="fa fa-eye-slash" aria-hidden="true" title="' . Yii::t('app', 'system.publish') . '"></i>', ['public', 'id' => $consultation->id]) ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="panel-body consultation-panel-body collapse" id="<?= 'content' . $consultation->id ?>">
                <div class="row"  style="margin-top: 10px;">
                    <div class="col-md-6">
                        <?= $consultation->room->roomTypeBuilding->building->name ?><br>
                        <?= Yii::t('app', 'room.room') . ': ' .$consultation->room->number ?> 
                        <?= '(' . $consultation->room->roomTypeBuilding->roomType->type . ')' ?><br>
                    </div>
                    <div class="col-md-6">
                        <div style="float: right;">
                            <?= Yii::t('app', 'system.status') . ': ' ?>
                            <?= Consultation::statusList()[$consultation->status] ?><br>
                            <?= Consultation::publicList()[$consultation->public] ?>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row"  style="margin-bottom: 10px;">
                    <div class="col-md-12">
                    <?= Html::a('<i class="fa fa-times" aria-hidden="true"></i>' . ' ' . Yii::t('app', 'system.delete'), ['delete', 'id' => $consultation->id], [
                        'data' => [
                            'confirm' => Yii::t('app', 'system.confirm'),
                            'method' => 'post',
                        ],
                    ]) ?>
                    <?php if ($consultation->public): ?>    
                    <?= Html::a('<i class="fa fa-eye-slash" aria-hidden="true"></i>' . ' ' . Yii::t('app', 'system.unpublish'), ['not-public', 'id' => $consultation->id], [
                        'style' => 'margin-left: 10px;',
                    ]) ?>  
                    <?php else: ?>
                    <?= Html::a('<i class="fa fa-eye" aria-hidden="true"></i>' . ' ' . Yii::t('app', 'system.publish'), ['public', 'id' => $consultation->id], [
                        'style' => 'margin-left: 10px;',
                    ]) ?>  
                    <?php endif; ?>
                    <?php if ($consultation->status != Consultation::STATUS_CANCEL && $consultation->public == Consultation::STATUS_PUBLIC): ?>
                    <?= Html::a('<i class="fa fa-minus-circle" aria-hidden="true"></i>' . ' ' . Yii::t('app', 'consultation.status_cancel'), ['cancel', 'id' => $consultation->id], [
                        'style' => 'margin-left: 10px;',
                    ]) ?>
                    <?php endif; ?>  
                    </div>
                </div>
            </div>
        </div>
    <?php $i++ ?>
    <?php endforeach; ?>
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