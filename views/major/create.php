<?php

use yii\helpers\Html;

$this->title = Yii::t('app', 'major.create_major');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'major.majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="major-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'major.create_major'),
    ]) ?>

</div>
