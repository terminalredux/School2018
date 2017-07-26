<?php



$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.buildings'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $this->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'building.gv_button_relations')];

?>

<h4><?= Yii::t('app', 'building.gv_button_relations') . ': ' ?><strong><?= $model->name ?></strong></h4>
