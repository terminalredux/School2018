<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Consultation\Consultation */

$this->title = Yii::t('app', 'Create Consultation');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Consultations'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="consultation-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
