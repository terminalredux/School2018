<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'room.create_room');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'room.rooms'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'buildingId' => $buildingId,
    ]) ?>

</div>
