<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Major',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'major.majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="major-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
