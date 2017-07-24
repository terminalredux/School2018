<?php

use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'building.buildings');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="building-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'building.building_create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'street',
            'street_number',
            'city',
            'postcode',
           
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=> '{view}',  
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
