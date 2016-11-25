<?php

namespace frontend\controllers;

use Yii;
use frontend\models\Project;
use frontend\models\User;
use frontend\models\ProjectSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\ActiveDataProvider;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('_dview', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionTest()
    {
        $query= Project::find()->with('instructor');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 2,
            ],
        ]);
        return $this->render('_test', [
            'dataProvider' => $dataProvider,
        ]);
    }
    
    
    public function actionSend()
    {
        $project=Project::findOne(1);
        $student=User::findOne(1);
        return Yii::$app
        ->mailer
        ->compose('resume_send',[
            'student'=>$student,
            'project'=>$project,
        ])
        ->setFrom([Yii::$app->params['supportEmail'] => '申报系统邮件机器人'])
        ->setTo('2211637298@qq.com')
        ->setSubject('简历信息')
        ->send();
    }
    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
