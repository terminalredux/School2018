<?php

use kartik\sortinput\SortableInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.gv_button_relations')];

?>

<h4><?= Yii::t('app', 'building.gv_button_relations') . ': ' ?><strong><?= $model->name ?></strong></h4>


    <?php
    $formAll = ActiveForm::begin([
            'action' => Url::to(['/building/relations', 'id' => $model->id]),
        ]); 
    ?>
    <div class="row">
        <div class="col-md-4">
            <h5><?= Yii::t('app', 'room_type.accepted_room_types') ?>:</h5>
            <?=
            $formAll->field($roomTypesBuildingForm, 'acceptedRomeTypes')->widget(SortableInput::classname(), [
                'items' => [],
                'hideInput' => false,
                'sortableOptions' => [
                    'connected'=>true,
                ],
                'options' => ['class' => 'form-control', 'readonly' => true, 'id' => 'acceptedRoomTypes']
            ])->label(false);
            ?>
        </div>
        <div class="col-md-4">
            <h5><?= Yii::t('app', 'room_type.all_room_types') ?>:</h5>
            <?= 
                SortableInput::widget([
                    'name'=> 'allRomeTypes',
                    'items' => $sortableData,
                    'hideInput' => true,
                    'sortableOptions' => [
                        'itemOptions'=>['class'=>'alert alert-info'],
                        'connected'=>true,
                    ],
                ]);
            ?>
        </div>
    </div>

    <?= Html::submitButton(Yii::t('app', 'system.save_changes'), ['class' => 'btn btn-success']) ?>
    <?php ActiveForm::end(); ?>
