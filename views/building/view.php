<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'system.update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'building.gv_button_relations'), ['relations', 'buildingId' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'room.rooms'), ['/room/index', 'buildingId' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'system.delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'float: right;',
            'data' => [
                'confirm' => Yii::t('app', 'system.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-4">
            <h5><strong><?= Yii::t('app', 'building.address') ?>:</strong></h5>
            <p><?= $model->city . ' ' . $model->postcode ?></p>
            <p><?= $model->street . ' ' . $model->street_number ?></p>
        </div>
        <?php if ($model->description != ""): ?>
        <div class="col-md-4">
            <p><strong><?= Yii::t('app', 'building.description') ?>:</strong></p>
            <p><?= $model->description ?></p>
        </div>
        <?php endif; ?>
        <div class="col-md-4">
            
        </div>
    </div>
</div>
