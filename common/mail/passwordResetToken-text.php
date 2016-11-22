<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$resetLink = Yii::$app->urlManager->createAbsoluteUrl(['site/reset-password', 'token' => $user->password_reset_token]);
?>
你好 <?= $user->username ?>,

请点击以下链接以重置创新创业项目报名系统的密码：

<?= $resetLink ?>
