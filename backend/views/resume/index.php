<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ResumeSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '查看投递记录';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resume-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['label'=>'项目名称','value'=>'title'],
            ['label'=>'项目类型','value'=>'type'],
            ['label'=>'项目级别','value'=>'level'],
            ['label'=>'导师','value'=>'name'],
            ['label'=>'导师职称','value'=>'degree'],
            ['label'=>'学生姓名','value'=>'student_name'],
            ['label'=>'学号','value'=>'username'],
            ['label'=>'投递时间','value'=>'time'],
        ],
    ]); ?>
</div>
