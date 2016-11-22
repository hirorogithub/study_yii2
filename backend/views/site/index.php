<?php

/* @var $this yii\web\View */

$this->title = '创新创业项目报名系统';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Welcome!</h1>

        <p class="lead">你可以在这里进行导师和项目的管理。</p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4 col-lg-offset-2">
                    <h2>管理导师名单</h2>

                <p>您可以进行导师名单的增删查改,请慎重操作。</p>
                <p>该导师名单将用于与项目连结，构成项目的完整信息。</p>
                </br>
                </br>
               

                <p><a class="btn btn-default" href="?r=instructor/index">管理导师名单 &raquo;</a></p>              
            </div>
            <div class="col-lg-4">
                <h2>管理项目名单</h2>

                <p>您可以进行项目名单的增删查改,请慎重操作。</p>
                <p>添加新的项目时请注意导师是否已经存在，若否，请先添加该到时信息。</p>
                <p>该项目名单将用于与学生信息连结，构成简历表。</p>

                <p><a class="btn btn-default" href="?r=project/index">管理项目名单 &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
