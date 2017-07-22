<?php

$this->title = Yii::t('app', 'academic_title.update_academic_title', [
    'modelClass' => 'Academic Title',
]) . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academic Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'academic_title.update');
?>
<div class="academic-title-update">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'academic_title.update_academic_title')
    ]) ?>

</div>
