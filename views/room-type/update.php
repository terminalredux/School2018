<?php

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Room Type',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'room_type.room_types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="room-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
