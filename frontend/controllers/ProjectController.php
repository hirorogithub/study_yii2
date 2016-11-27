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
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        $project=Project::findOne($id);
        $project->has_viewed++;
        Yii::$app->db->createCommand('UPDATE `project` SET `has_viewed`='.$project->has_viewed.' WHERE `pro_ID`='.$project->pro_ID)
        ->query();
       if (Yii::$app->request->post()){
            return $this->redirect(['resume/send','pro_id'=>$id]);        
        } 
        /*正确的代码顺序，把增加语句放在上面，会因为响应表单该函数再一次被调用而多加一次，这样浏览数就是两倍增长
         * $project->has_viewed++;
        Yii::$app->db->createCommand('UPDATE `project` SET `has_viewed`='.$project->has_viewed.' WHERE `pro_ID`='.$project->pro_ID)
        ->query();*/
        
        
        
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    
    public function actionIndex($typ=NULL,$level=NULL,$time=NULL)
    {
       
        
        $query= Project::find()->with('instructor');

        if($typ!=NULL)  $query->andFilterWhere(['like','type', $typ]);
        if($level!=NULL)$query->andFilterWhere(['like','level' ,$level]);
        if($time!=NULL) $query->andFilterWhere(['like','apply_time' , $time]);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 8,
            ],
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
                'typ'=>$typ,
                'level'=>$level,
                'time'=>$time,
            
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
