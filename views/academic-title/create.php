<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'academic_title.create_academic_title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'academic_title.academic_title'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
