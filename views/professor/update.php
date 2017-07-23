<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Professor',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->firstname . ' ' . $model->lastname , 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="professor-update">
    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'professor.update_professor')
    ]) ?>
</div>
