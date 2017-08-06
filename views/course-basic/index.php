<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'course_basic.courses_basic');
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>
    
<div class="col-md-6">    
<?php Pjax::begin(); ?>    
<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            
            'name',
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
<div class="col-md-6">
    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'course_type.create_course_type'),
    ]) ?>
</div>