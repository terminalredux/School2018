<?php

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Course Type',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'course_type.course_types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->type, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'system.update');
?>
<div class="course-type-update">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'course_type.update_course_type')
    ]) ?>

</div>
