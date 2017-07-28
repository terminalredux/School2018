<?php

use app\models\Room\Room;
use app\models\RoomTypeBuilding\RoomTypeBuilding;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

?>

<?php $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'room_type_building_id')->dropDownList(RoomTypeBuilding::getAllRoomTypeBuilding($buildingId))->label(Yii::t('app', 'room_type.room_types')) ?>

<?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

<?= $form->field($model, 'additional_info')->textarea(['rows' => 6]) ?>


<?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>


<?php ActiveForm::end(); ?>

