<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Major',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'major.majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="major-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'major.update_major'),
    ]) ?>

</div>
