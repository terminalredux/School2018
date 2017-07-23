<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Professor\Professor */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Professor',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="professor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
