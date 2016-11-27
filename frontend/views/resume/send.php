<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model frontend\models\User */

$this->title = '简历信息预览';
$this->params['breadcrumbs'][] = '简历信息预览';
?>

<div class="resume-send">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>请核对信息：</p>
    <div class="row">
        <p class="alert alert-success" role="alert">项目信息</p>
        <div class="col-md-6">
        <?= DetailView::widget([
        'model' => $project,
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
        'model' => $project,
        'attributes' => [ 
            'instructor.name',
            'instructor.sex',
            'instructor.degree',
            'instructor.researchDirection',
        ],
    ]) ?>
        </div>   
    </div>
    
    <div class="row">
    <?php 
        if($student->have_Init==1){   
    ?>

    <p class="alert alert-success" role="alert">个人信息</p>
            <?= DetailView::widget([
                'model' => $student,
                'attributes' => [ 
                    'username',
                    'student_name',
                    'email',
                    'grade',
                    'grade',
                    'subject',
                    'phone',
                    'GPA_discribe',
                    'self_discribe',
                  ],
             ]) ?>
    <p><span class="glyphicon glyphicon-exclamation-sign"> 如需修改个人信息，请在个人信息栏目修改。</span></p>
    </div>
    <?php $form = ActiveForm::begin(); ?>
    <?= Html::activeHiddenInput($student,'have_Init',['value'=>1]) ?>
    <div class="pull-right">
        <?= Html::submitButton( '确认', ['class' => 'btn btn-success']) ?>
    </div>
    <?php ActiveForm::end(); ?>
    <?php 
        }
        else{
    ?>
    <p class="alert alert-danger" role="alert">个人信息</p>
    <p><span class="glyphicon glyphicon-exclamation-sign"> 系统检测到你并未填写过个人信息，无法进行申请，请点下面的按钮进行填写</span></p>
     <a href="?r=user/update&id=<?= Yii::$app->user->id?>"><button type="button" class="btn btn-success">填写信息</button></a>     
     <?php }?>
</div>
