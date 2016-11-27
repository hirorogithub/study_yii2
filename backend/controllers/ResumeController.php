<?php

namespace backend\controllers;

use Yii;
use backend\models\Resume;
use backend\models\ResumeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\SqlDataProvider;
use yii\filters\AccessControl;
/**
 * ResumeController implements the CRUD actions for Resume model.
 */
class ResumeController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Resume models.
     * @return mixed
     */
    public function actionIndex()
    {
        $cnt=Yii::$app->db->createCommand("SELECT COUNT(*) FROM `resume`join`project`join`instructor`join`user` ".
                    "on( `instructor`.`ins_ID`=`project`.`ins_ID`and`resume`.`project_ID`=`project`.`pro_ID` and `resume`.`username`=`user`.`username`) ")
                            ->queryScalar();
        $dataProvider=new SqlDataProvider([
            'sql'=>"SELECT * FROM `resume`join`project`join`instructor`join`user`  ".
                    "on( `instructor`.`ins_ID`=`project`.`ins_ID`and`resume`.`project_ID`=`project`.`pro_ID`and `resume`.`username`=`user`.`username`) ",
            'totalCount'=>$cnt,
            'pagination'=>[
                'pageSize'=>10,
            ],
            
        ]);

        return $this->render('index', [
            'searchModel' => NULL,
            'dataProvider' => $dataProvider,
        ]);
    }

   
    /**
     * Finds the Resume model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Resume the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Resume::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
