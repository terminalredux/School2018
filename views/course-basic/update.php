<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Course Basic',
]) . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'course_basic.create_course_basic'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="course-basic-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'course_type.update_course_type'),
    ]) ?>

</div>
