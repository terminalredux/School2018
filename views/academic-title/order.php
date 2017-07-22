<?php

use kartik\sortinput\SortableInput;

$this->title = Yii::t('app', 'academic_title.order_title');
$this->params['breadcrumbs'][] = $this->title;
?>

<?= 
    SortableInput::widget([
    'name'=> 'sort_list_1',
    'items' => [
        1 => ['content' => '<i class="glyphicon glyphicon-cog"></i> Item # 1'],
        2 => ['content' => '<i class="glyphicon glyphicon-cog"></i> Item # 2'],
        3 => ['content' => '<i class="glyphicon glyphicon-cog"></i> Item # 3'],
        4 => ['content' => '<i class="glyphicon glyphicon-cog"></i> Item # 4'],
        5 => ['content' => '<i class="glyphicon glyphicon-cog"></i> Item # 5', 'disabled'=>true]
    ],
    'hideInput' => true,]);
?>

