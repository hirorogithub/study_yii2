<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Instructor */

$this->title = '添加导师';
$this->params['breadcrumbs'][] = ['label' => '导师', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="instructor-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
