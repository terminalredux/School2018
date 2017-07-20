<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Academic Titles');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-index">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>
        <?= Html::a(Yii::t('app', 'Create Academic Title'), ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a(Yii::t('app', 'Set Order'), ['order'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'short',
            'full',
            'order',
            //'status',
            'created_at:datetime',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
