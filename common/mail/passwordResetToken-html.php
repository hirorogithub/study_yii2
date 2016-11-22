<?php
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
<div class="password-reset">
    <p>你好 <?= Html::encode($user->username) ?>,</p>

    <p>请点击以下链接以重置创新创业项目报名系统的密码</p>

    <p><?= Html::a(Html::encode($resetLink), $resetLink) ?></p>
</div>
