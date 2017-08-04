<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'department.departments');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
  
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <?= Yii::t('app', 'department.create_department') ?>
            </div>
            <div class="panel-body">
                <?php $form = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
                    </div>
                    <div class="col-md-3">
                        <?= $form->field($model, 'short_name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('short_name')])->label(false) ?>
                    </div>
                    <div class="col-md-3">
                        <?= Html::submitButton(Yii::t('app', 'system.create'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <strong data-toggle="collapse" data-target="#description"><?= $model->getAttributeLabel('description') ?></strong>
                        <?= $form->field($model, 'description')->textarea(['rows' => 6, 'id' => 'description', 'class' => 'collapse'])->label(false) ?>
                    </div>
                </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
    </div>
    <div class="row">
        <?php Pjax::begin(); ?>    
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'name',
                    'short_name',
                    'description:ntext',

                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                    ],
                ],
            ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
