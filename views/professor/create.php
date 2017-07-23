<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'professor.create_professor');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'professor.professors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="professor-create">
    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'professor.create_professor')
    ]) ?>
</div>
