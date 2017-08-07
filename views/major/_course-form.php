<?php

use app\models\CourseBasic\CourseBasic;
use app\models\CourseType\CourseType;
use kartik\select2\Select2;
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
                <?= $form->field($model, 'course_basic_id')->widget(Select2::className(), [
                    'data' => CourseBasic::getBasicCourseList(),
                    'options' => [
                        'class' => 'no-border-radius',
                        'placeholder' => Yii::t('app', 'course.course'),
                    ],

                ])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'course_type_id')->widget(Select2::className(), [
                    'data' => CourseType::getCourseTypeList(),
                    'options' => [
                        'placeholder' => Yii::t('app', 'course_type.course_type'),
                    ],

                ])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <?= $form->field($model, 'ects')->textInput(['placeholder' => $model->getAttributeLabel('ects')])->label(false) ?>
            </div>
            <div class="col-md-6">
                <?= $form->field($model, 'total_hours')->textInput(['placeholder' => $model->getAttributeLabel('total_hours')])->label(false) ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <?= Html::submitButton(Yii::t('app', 'system.add'), ['class' => 'btn btn-success', 'style' => 'width: 100%;']) ?>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
    </div>
</div>