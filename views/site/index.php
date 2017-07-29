<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-md-3 text-center main-menu-options">
            <img src="images/school.png">
            <h4><?= Html::a(Yii::t('app', 'building.buildings'), ['/building/index']) ?></h4>
        </div>
        <div class="col-md-3 text-center main-menu-options">
            <img src="images/professor.png">
            <h4><?= Html::a(Yii::t('app', 'professor.professors'), ['/professor/index']) ?></h4>
        </div>
        <div class="col-md-3 text-center main-menu-options">
            <img src="images/diploma.png">
            <h4><?= Html::a(Yii::t('app', 'academic_title.academic_titles'), ['/academic-title/index']) ?></h4>
        </div>
    </div>
    
</div>
