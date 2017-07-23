<?php

use kartik\sortinput\SortableInput;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = Yii::t('app', 'academic_title.order_title');
$this->params['breadcrumbs'][] = $this->title;
?>

<?php
    $form = ActiveForm::begin([
        'action' => Url::to(['academic-title/order']),
    ]); 
?>

<?= 
    $form->field($modelForm, 'orderItem')->widget(SortableInput::className(), [
        'name'=> 'orderItem',
        'items' => $sortableData,
        'hideInput' => true,
    ])->label(false); 
?>

<?= Html::submitButton(Yii::t('app', 'system.save'), ['class' => 'btn btn-success']) ?>
<?php ActiveForm::end(); ?>

