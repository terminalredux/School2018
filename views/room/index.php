<?php

use app\models\Building\Building;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'Rooms');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['building/index']];
$this->params['breadcrumbs'][] = ['label' => Building::find()->andWhere(['id' => $buildingId])->limit(1)->one()->name, 'url' => ['building/view', 'id' => $buildingId]];
$this->params['breadcrumbs'][] = $this->title;
?>


    <h1><?= Html::encode($this->title) ?></h1>
<div class="col-md-7">   
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => Yii::t('app', 'room_type.room_types'),
                'attribute' => 'roomTypeBuilding.roomType.type',
               
            ],
            'number',
            'additional_info:ntext',
         
            [
                'class' => 'yii\grid\ActionColumn',
                'template'=>'{update} {delete}'
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>
</div>
    
<div class="col-md-5">   
    <?= $this->render('_form', [
        'model' => $model,
        'buildingId' => $buildingId,
    ]) ?>
</div>
