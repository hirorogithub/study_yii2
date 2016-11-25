<?php

namespace frontend\controllers;

class ResumeController extends \yii\web\Controller
{
    public function actionSend()
    {
        return $this->render('send');
    }

    public function actionView()
    {
        return $this->render('view');
    }

}
