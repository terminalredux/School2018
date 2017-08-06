<?php

use yii\helpers\Html;

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'major.majors'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;

?>
<h1><?= $model->name ?></h1>
<div class="row">
    <?= Html::a(Yii::t('app', 'system.update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'course.courses'), ['courses', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    <?= Html::a(Yii::t('app', 'system.delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'style' => 'float: right;',
            'data' => [
                'confirm' => Yii::t('app', 'system.confirm'),
                'method' => 'post',
            ],
        ]) ?>
</div>
<br>
<div class="row">
    <p>
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor auctor, condimentum augue tempus, facilisis metus. Ut rhoncus magna sit amet tortor fermentum tempus. Mauris tempus odio a mollis tempor. Quisque dictum ligula eu risus mattis, sed vulputate purus ullamcorper. Nulla in tellus erat. Proin dignissim dolor aliquam tortor venenatis, a condimentum est aliquet. Ut finibus sit amet est eu consequat. Vestibulum imperdiet tristique bibendum. Interdum et malesuada fames ac ante ipsum primis in faucibus.

Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Interdum et malesuada fames ac ante ipsum primis in faucibus. Praesent nec sagittis purus. Phasellus nulla nisi, fermentum venenatis elementum a, tempor sit amet metus. Morbi lobortis ac nulla vel condimentum. Sed scelerisque, sapien at maximus efficitur, dui quam tempor turpis, et egestas nisl nisl at tellus. Vestibulum ut venenatis turpis, a pharetra augue. Aliquam non enim turpis.
    </p>
</div>