<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    


    <?php $form = ActiveForm::begin(); ?>
    
    
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading"><?= $title ?></div>
            <div class="panel-body">
                <div class="col-md-3">
                    <?= $form->field($model, 'short')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('short')])->label(false) ?>
                </div>
                <div class="col-md-7">
                    <?= $form->field($model, 'full')->textInput(['maxlength' => true, 'placeholder' => $model->getAttributeLabel('full')])->label(false) ?>
                </div>
                <div class="col-md-2">
                    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'academic_title.save') : Yii::t('app', 'academic_title.update'), 
                        [
                            'class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary',
                            'style' => 'width: 100%'
                        ]) ?>
                </div>    
            </div>
        </div>
    </div>

    

    <?php ActiveForm::end(); ?>

