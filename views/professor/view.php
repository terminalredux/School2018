<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->title = $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'system.update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'system.delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'system.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'academic_title_id',
            'firstname',
            'middlename',
            'lastname',
            'gender',
            'website',
            'email:email',
            'status',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
