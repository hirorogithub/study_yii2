<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-dview">

    <h1><?= Html::encode($this->title) ?></h1>

    <div class="row">
        <div class="col-md-6">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'title',
            'type',
            'level',
            'apply_time',        
        ],
    ]) ?>
        </div>
        
        <div class="col-md-6">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [ 
            'instructor.name',
            'instructor.sex',
            'instructor.degree',
            'instructor.researchDirection',
        ],
    ]) ?>
        </div>   
    </div>
    <div class="pull-right">
        <button type="button" class="btn btn-success">asdjhg
        </button>
    </div>
    

</div>
