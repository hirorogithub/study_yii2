<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = '更新导师信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '导师', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->ins_ID]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="instructor-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
