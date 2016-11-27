<?php
//可以考虑把搜索标签整合一下做成函数返回，这样不用写重复代码
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ListView;
/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ProjectSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = '项目一览';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-index">

    <div class="col-md-3 ">
        <div class="row">
            <p class="alert alert-success" role="alert" style="margin:10px 0px 10px 0px">项目级别</p>
             <div class="col-md-4">
                <a href="?r=project/index&level=院级"><button type="button" class="btn btn-default">院级</button></a>
             </div>
             <div class="col-md-4">
                <a href="?r=project/index&level=校级"><button type="button" class="btn btn-default">校级</button></a>
             </div>
             <div class="col-md-4">
                <a href="?r=project/index&level=省级"><button type="button" class="btn btn-default">省级</button></a>
             </div>
             <div class="col-md-12">
                <a href="?r=project/index&level=国家级"><button type="button" class="btn btn-default">国家级</button></a>
             </div>
        </div>
        <div class="row">
            <p class="alert alert-success" role="alert" style="margin:10px 0px 10px 0px">项目类型</p>
            <div class="btn-group">
             <div class="col-md-6">
                <a href="?r=project/index&typ=创新项目"><button type="button" class="btn btn-default">创新项目</button></a>
             </div>
             <div class="col-md-6">
                <a href="?r=project/index&typ=创业项目"><button type="button" class="btn btn-default">创业项目</button></a>
             </div>
            </div>
        </div><div class="row">
            <p class="alert alert-success" role="alert" style="margin:10px 0px 10px 0px">发布时间</p>
            <div class="col-md-12btn-group">
              <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                         选择时间<span class="caret"></span>
              </button>
              
              <ul class="dropdown-menu" role="menu">
                   <?php 
                        $year=date('Y');
                        for($i=3;$i>=0;$i--){
                            ?>
                            <li><a href="?r=project/index&time=<?= $year-$i?>"><?= $year-$i?></a></li>
                            <?php 
                        }
                   ?>         
              </ul>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    

        <?= ListView::widget([
            'dataProvider' => $dataProvider,
            'itemView' => '_listitem', 
           ]); ?>

    </div>
    
    
</div>
