<?php

use app\models\RoomType\RoomType;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $buildingModel->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $buildingModel->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.gv_button_relations')];

?>

<h4><?= Yii::t('app', 'building.gv_button_relations') . ': ' ?><strong><?= $buildingModel->name ?></strong></h4>

<div class="row">
    <div class="col-md-12">
    <?= Html::a(Yii::t('app', 'room_type.add_room_type'), ['/room-type/index'], ['class' => 'btn btn-primary', 'style' => 'float: right;']) ?>
    </div>
</div><br>

<div class="col-md-6">
    <?php foreach ($roomTypesBuildingModels as $model): ?>
        <div class="panel panel-default">
            <div class="panel-body">
                <?= $model->roomType->type ?>
            </div>
        </div>
    <?php endforeach; ?>
</div>
<div class="col-md-6">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('app', 'room_type_building.add_to_building') ?>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin([
                    'action' => Url::to(['building/relations', 'buildingId' => $buildingModel->id]),
                ]); ?>
                <div class="col-md-8">
                   <?= $form->field($roomTypesBuildingFormModel, 'selectedRoomType')->dropDownList(RoomType::getUnassignedRoomTypes($buildingModel->id))->label(false)?>
                </div>
                <div class="col-md-4">
                    <?= Html::submitButton(Yii::t('app', 'system.add') , ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
</div>









