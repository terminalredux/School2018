<?php

use kartik\sortinput\SortableInput;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'academic_title.academic_titles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-index">

    <h1><?= Html::encode($this->title) ?></h1>
 
    <div class="row">
        <div class="col-md-7">
            <?php Pjax::begin(); ?>    
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        
                        'short',
                        'full',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{update} {delete}'
                        ],

                    ],
                ]); ?>
            <?php Pjax::end(); ?>
        </div>
        <div class="col-md-5">
            <div class="row">
                <div class="col-md-12">
                <?= $this->render('_form', [
                    'model' => $model,
                    'title' => Yii::t('app', 'academic_title.create_academic_title'),
                ]) ?>
                </div>
            </div>
            <div class="row">
                <div class="panel panel-default">
                    <div class="panel-heading" data-toggle="collapse" href="#panelOrder" style="cursor: pointer;">
                        <?= Yii::t('app', 'academic_title.order_title') ?>
                    </div>
                    <div class="panel-body collapse" id="panelOrder">
                    <?php
                    $form = ActiveForm::begin([
                            'action' => Url::to(['academic-title/index']),
                        ]); 
                    ?>

                    <?= 
                        $form->field($modelForm, 'orderItem')->widget(SortableInput::className(), [
                            'name'=> 'orderItem',
                            'items' => $sortableData,
                            'hideInput' => true,
                        ])->label(false); 
                    ?>

                    <?= Html::submitButton(Yii::t('app', 'system.save'), ['class' => 'btn btn-success']) ?>
                    <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>    
    
</div>
