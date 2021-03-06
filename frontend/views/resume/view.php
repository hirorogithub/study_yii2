<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = '投递记录';
$this->params['breadcrumbs'][] = '投递记录';
?>
<div class="resume-view">
    
    <h1>投递记录：</h1>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['label'=>'项目名称','value'=>'title'],
            ['label'=>'项目类型','value'=>'type'],
            ['label'=>'项目级别','value'=>'level'],
            ['label'=>'导师','value'=>'name'],
            ['label'=>'导师职称','value'=>'degree'],
            ['label'=>'研究方向','value'=>'researchDirection'],
            ['label'=>'所属系别','value'=>'dept_name'],
            ['label'=>'投递时间','value'=>'time'],
        ],
    ]); ?>
</div>