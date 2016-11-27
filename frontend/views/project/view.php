<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\Project */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '项目', 'url' => ['index']];
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
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($model,'has_viewed',['value'=>$model->has_viewed]) ?>
    <div class="pull-right">
        <?= Html::submitButton( '投递简历', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    

</div>
