<?php

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Room',
]) . $model->id;

$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="room-update">

    <h1><?= Yii::t('app', 'room.room') . ' ' . $model->number . ' (' . $model->roomTypeBuilding->building->name . ')' ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'room.update_room'),
        'buildingId' => $buildingId,
    ]) ?>

</div>
