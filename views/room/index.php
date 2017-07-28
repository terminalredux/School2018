<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\Room\RoomSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Rooms');
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
