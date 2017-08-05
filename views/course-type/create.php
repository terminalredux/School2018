<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'course_type.create_course_type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'course_type.course_types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
