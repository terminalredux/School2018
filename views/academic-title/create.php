<?php

$this->title = Yii::t('app', 'academic_title.create_academic_title');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'academic_title.academic_title'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="academic-title-create">

    <?= $this->render('_form', [
        'model' => $model,
        'title' => Yii::t('app', 'academic_title.create_academic_title'),
    ]) ?>

</div>
