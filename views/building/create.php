<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'building.building_create');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'building.building_create'),
    ]) ?>

</div>
