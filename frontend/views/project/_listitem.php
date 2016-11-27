<?php

use yii\helpers\Html;
use yii\helpers\HtmlPurifier;

?>

<div class="project_tview table-bordered table-hover" style="padding:0px 15px 10px ;">
    <a style="text-decoration:none" href="?r=project/view&id=<?= $model->pro_ID?>"><h2><?= Html::encode($model->title) ?></h2></a>
    <div class="row">
        <div class="col-md-2"><span class="label label-primary"><?= HtmlPurifier::process($model->level) ?></span></div>
        <div class="col-md-3"> <?= HtmlPurifier::process(HtmlPurifier::process(Yii::$app->formatter->format($model->apply_time, 'date') )) ?>申请</div>
    </div>
    <div class="row">
          <div class="col-md-2"><strong>类型  </strong></div><div class="col-md-2"> <?=HtmlPurifier::process($model->level) ?></div>
          <div class="col-md-2"><strong>导师  </strong></div><div class="col-md-2"> <?= HtmlPurifier::process($model->instructor->name) ?></div>
          <div class="col-md-2 col-md-offset-2"><span class="glyphicon glyphicon-eye-open"> <?= HtmlPurifier::process($model->has_viewed) ?></span></div>
    </div>
</div>