<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('添加项目', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'pro_ID',
            'title',
            'type',
            'level',
            'apply_time',
            'instructor.name',
            ['label'=>'性别','value'=>'instructor.sex'],
            ['label'=>'职称','value'=>'instructor.degree'],
            ['label'=>'研究方向','value'=>'instructor.researchDirection'],
            ['label'=>'邮箱地址','value'=>'instructor.email'],
            ['label'=>'联系电话','value'=>'instructor.phone'],
            ['label'=>'所属系别','value'=>'instructor.dept_name'],
            /*'sex',
            'degree',
            'researchDirection',
            'email:email',
            'phone',
            'dept_name',*/
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
