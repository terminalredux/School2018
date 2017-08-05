<?php

use app\models\Major\Major;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="panel panel-default">
    <div class="panel-heading">
        <?= $title ?>
    </div>
    <div class="panel-body">
        <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'department_id')->dropDownList(Major::getDepartmentsList(), ['prompt' => Yii::t('app', 'major.choose_department')])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('name')])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
            </div>
        </div>
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?php ActiveForm::end(); ?>
    </div>
</div>

    

