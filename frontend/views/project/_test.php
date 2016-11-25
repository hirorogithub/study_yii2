<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '项目一览';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-test">

    <div class="col-md-3 ">
        <p class="alert alert-success" role="alert">项目级别</p>
        as高科技安莉芳
        <p class="alert alert-success" role="alert">申请时间</p>
         sdfhbsdh
        <p class="alert alert-success" role="alert">状态</p>
        skljdfnbpsobn
    </div>
    <div class="col-md-9">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_tview', 
           ]); ?>

    </div>
    
    
</div>
