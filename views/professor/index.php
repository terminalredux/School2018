<?php

use app\models\Professor\Professor;
use yii\grid\GridView;
use yii\helpers\Html;
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
                'attribute' => 'academicTitle.short',
                'filter' => Professor::getAcademicTitleListFilter(),
                'value' => function($model) {
                    return Professor::getAcademicTitleList()[$model->academic_title_id];
                }
            ],
            'firstname',
            'lastname',
            'email:email',
         
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
