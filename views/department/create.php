<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'department.create_department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'department.departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="department-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
