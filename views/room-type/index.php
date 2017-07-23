<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'room_type.room_types');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="room-type-index">

    <h1><?= Html::encode($this->title) ?></h1>
  
    <p>
        <?= Html::a(Yii::t('app', 'room_type.create'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
        <div class="row">
            <div class="col-md-6">
            <?php Pjax::begin(); ?>    <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'filterModel' => $searchModel,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],

                        'type',
                        'description:ntext',

                        [
                            'class' => 'yii\grid\ActionColumn',
                            'template'=>'{update} {delete}',
                        ],
                    ],
                ]); ?>
            <?php Pjax::end(); ?>
            </div>
            <div class="col-md-6">
                <?= $this->render('_form', [
                    'model' => $model,
                    'title' => Yii::t('app', 'academic_title.create_academic_title'),
                ]) ?>
            </div>
        </div>
</div>
