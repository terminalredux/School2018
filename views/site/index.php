<?php

use yii\helpers\Html;

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="row">
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/school.png">
            <h5><?= Html::a(Yii::t('app', 'building.buildings'), ['/building/index']) ?></h5>
        </div>
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/microscope.png">
            <h5><?= Html::a(Yii::t('app', 'room_type.room_types'), ['/room-type/index']) ?></h5>
        </div>
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/professor.png">
            <h5><?= Html::a(Yii::t('app', 'professor.professors'), ['/professor/index']) ?></h5>
        </div>
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/diploma.png">
            <h5><?= Html::a(Yii::t('app', 'academic_title.academic_titles'), ['/academic-title/index']) ?></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/university.png">
            <h5><?= Html::a(Yii::t('app', 'department.departments'), ['/department/index']) ?></h5>
        </div>
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/column.png">
            <h5><?= Html::a(Yii::t('app', 'major.majors'), ['/major/index']) ?></h5>
        </div>
        <div class="col-xs-3 text-center main-menu-options">
            <img src="images/blackboard-1.png">
            <h5><?= Html::a(Yii::t('app', 'course_type.course_types'), ['/course-type/index']) ?></h5>
        </div>
        
        
    </div>
    
    
</div>
