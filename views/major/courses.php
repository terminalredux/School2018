<?php

?>

<h3><?= $modelMajor->name . ' ' . Yii::t('app', 'course.courses') ?></h3>
<br>
<div class="col-md-6">
    <?php foreach($modelsCourse as $modelCourse): ?>
        <div class="panel panel-default">
           <div class="panel-heading">
                <div class="row">
                    <div class="col-md-8">
                         <?= $modelCourse->courseBasic->name ?>
                    </div>
                    <div class="col-md-4">
                        <?= $modelCourse->courseType->type ?>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-6">
                        <?= Yii::t('app', 'course.ects') ?>
                        <?= $modelCourse->ects ?>
                    </div>
                    <div class="col-md-6">
                        <?= Yii::t('app', 'course.total_hours') ?>
                        <?= $modelCourse->total_hours ?>
                    </div>
                </div>
            </div>
        </div>
    
    
        
    <?php endforeach; ?>
</div>
<div class="col-md-6">
    <?= 
        $this->render('_course-form', [
            'model' => $modelCourse,
            'title' => Yii::t('app', 'course.create_course'),
        ]);
    ?>
</div>
