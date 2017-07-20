<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\AcademicTitle\AcademicTitle */

$this->title = Yii::t('app', 'Create Academic Title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Academic Titles'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
