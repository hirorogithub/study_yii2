<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="project-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pro_ID], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pro_ID], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <div class="row">
        <div class="col-md-6">
        <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'pro_ID',
            'title',
            'ins_ID',
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
            'pro_ID',
            'title',
            'ins_ID',
            'type',
            'level',
            'apply_time',
        ],
    ]) ?>
        </div>   
    </div>
    

</div>
