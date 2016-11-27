<?php

namespace frontend\controllers;
use frontend\models\Project;
use frontend\models\User;
use frontend\models\Resume;
use backend\models\Instructor;
use Yii;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;

class ResumeController extends \yii\web\Controller
{
    

    public function actionSend($pro_id)
    {
        if (Yii::$app->user->isGuest) {
              Yii::$app->session->setFlash('error', '如需要投递简历，请先登录');
              return  $this->redirect(['site/login']);;
        }
        $project=Project::findOne($pro_id);
        //var_dump($project);
        $student=User::findOne(Yii::$app->user->id);
        $model =new Resume();
                
        if (Yii::$app->request->post()){
            $instructor=Instructor::findOne($project->ins_ID);
            if($model->sendMail($pro_id)&&$instructor->has_sent<=20){                               
                $instructor->has_sent++;
                Yii::$app->db->createCommand('UPDATE `instructor` SET `has_sent`='.$instructor->has_sent.' WHERE `ins_ID`='.$instructor->ins_ID)
                ->query();                              
                Yii::$app->session->setFlash('success', '发送成功:)');
                $model->username=$student->username;
                $model->project_ID=$pro_id;    
                $model->save();          
                return $this->redirect(['project/index']);
            } else {
                Yii::$app->session->setFlash('error', '发送失败:(');
            }
            
        }

        
        
        return $this->render('send',[
            'project'=>$project,
            'student'=>$student,
        ]);
    }
    
    public function actionView()
    {
        $cnt=Yii::$app->db->createCommand("SELECT COUNT(*) FROM `resume`join`project`join`instructor` ".
                    "on( `instructor`.`ins_ID`=`project`.`ins_ID`and`resume`.`project_ID`=`project`.`pro_ID`) ".
                    "WHERE `username`=".
                    Yii::$app->user->identity->username)
                            ->queryScalar();
        $dataProvider=new SqlDataProvider([
            'sql'=>"SELECT * FROM `resume`join`project`join`instructor` ".
                    "on( `instructor`.`ins_ID`=`project`.`ins_ID`and`resume`.`project_ID`=`project`.`pro_ID`) ".
                    "WHERE `username`=".
                    Yii::$app->user->identity->username,
            'totalCount'=>$cnt,
            'pagination'=>[
                'pageSize'=>10,
            ],
            
        ]);
        return $this->render('view',[
            'dataProvider'=>$dataProvider,
            'searchModel'=>NULL,
            
        ]);
    }
    
    

}
