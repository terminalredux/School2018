<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'academic_title.academic_titles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-index">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>
        <?= Html::a(Yii::t('app', 'academic_title.create_academic_title'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Set Order'), ['order'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'short',
            'full',
            'created_at:datetime',
            
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
            
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
