<?php

$this->title = Yii::t('app', 'room_type.create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'room_type.room_types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
