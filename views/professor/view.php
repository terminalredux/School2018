<?php

use yii\helpers\Html;

$this->title = $model->firstname . ' ' . $model->lastname;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'system.update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'consultation.consultations'), ['/consultation/professor-consultation', 'professorId' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'system.delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'float: right;',
            'data' => [
                'confirm' => Yii::t('app', 'system.confirm'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <br>
    <div class="col-md-2">
        <p><?= Yii::t('app', 'professor.fullname') ?>:</p>   
        <p><?= Yii::t('app', 'professor.email') ?>:</p>  
        <p><?= Yii::t('app', 'professor.website') ?>:</p>   
    </div>
    <div class="col-md-4"> 
        <p>
            <strong>
            <?= ' ' . $model->academicTitle->short . ' ' ?>    
            <?= $model->firstname  . ' ' . ($model->middlename ? $model->middlename . ' ' : '') . $model->lastname ?>
            </strong>
        </p>  
        <p><?= $model->email ? $model->email : Yii::t('app', 'system.not_set') ?></p>  
        <p><?= $model->website ? $model->website : Yii::t('app', 'system.not_set') ?></p>  
    </div>

  

</div>
