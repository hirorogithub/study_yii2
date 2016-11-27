<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $user common\models\User */

?>
<div class="resume-send">

        <p><strong>项目信息：</strong></p>
        <?= DetailView::widget([
        'model' => $project,
        'attributes' => [
             'title',
             'type',
             'level',
             'apply_time'
             ],
        ]) ?>
        <p><strong>学生信息：</strong></p>
        <?= DetailView::widget([
        'model' => $student,
        'attributes' => [
            'username',
            'student_name',
            'email',
            'grade',      
            'subject',
            'phone',
            'GPA_discribe',
            'self_discribe'   
             ],
        ]) ?>

</div>
