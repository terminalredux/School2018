<?php

use app\models\Professor\Professor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
 <?php $form = ActiveForm::begin(); ?>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'academic_title_id')->dropDownList(Professor::getAcademicTitleList()) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'firstname')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'middlename')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-3">
        <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
        <?= $form->field($model, 'gender')->radioList([
            '1'=> Yii::t('app', 'professor.male'), 
            '2'=> Yii::t('app', 'professor.female') 
        ]) ?>
    </div>
    <div class="col-md-4">
        <?= $form->field($model, 'website')->textInput(['maxlength' => true]) ?>
    </div>
    <div class="col-md-5">
        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    </div>
</div>

<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'system.create') : Yii::t('app', 'system.update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


<?php ActiveForm::end(); ?>

