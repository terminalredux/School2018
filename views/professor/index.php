<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

$this->title = Yii::t('app', 'professor.professors');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-index">

    <h1><?= Html::encode($this->title) ?></h1>
   
    <p>
        <?= Html::a(Yii::t('app', 'professor.create_professor'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'label' => Yii::t('app', 'academic_title.academic_title'),
                'attribute' => 'academicTitle.short'
            ],
            'firstname',
            'middlename',
            'lastname',
            // 'gender',
            'email:email',
            // 'status',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
