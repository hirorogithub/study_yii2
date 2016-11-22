<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'student_ID')->textInput(['maxlength' => true])->hint('*重要信息，请准确填写') ?>
    
    <?= $form->field($model, 'username')->textInput(['maxlength' => true])->hint('*重要信息，请准确填写') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->hint('*重要信息，请准确填写') ?>
    
    <?= $form->field($model, 'phone')->textInput()->hint('*重要信息，请准确填写') ?>

    <?= $form->field($model, 'grade')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'subject')->textInput(['maxlength' => true]) ?>
   
    <?= $form->field($model, 'GPA_discribe')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'self_discribe')->textarea(['rows'=>7,'maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton( '更新', ['class' =>  'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
