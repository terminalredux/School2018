<?php

use kartik\sortinput\SortableInput;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'academic_title.order_title');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
// $form = ActiveForm::begin([
//'action' => Url::to(['asset-type/filters', 'id' => $model->id]),
//]); ?>

<?= 
    SortableInput::widget([
    'name'=> 'academicTitlesOrder',
    'items' => $sortableData,
    'hideInput' => true,]);
?>

