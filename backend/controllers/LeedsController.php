<?php

namespace backend\controllers;

use backend\models\User;
use Yii;
use backend\models\Leeds;
use backend\models\LeedAssignments;
use app\models\LeedsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * LeedsController implements the CRUD actions for Leeds model.
 */
class LeedsController extends Controller
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
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'create'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'member-delete'],
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
     * Lists all Leeds models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeedsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Leeds model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id),
        ]);
    }

    /**
     * Creates a new Leeds model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Leeds();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'users' => $users,
                'LeedAssignments' => $LeedAssignments,
            ]);
        }
    }

    /**
     * Updates an existing Leeds model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        $model           = $this->findModel($id, $user_id);
        $users           = User::find()->all();
        $LeedAssignments = LeedAssignments::find()->where(['leeds_id'=>$id])->all();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(isset($_POST['leeds_user_id']))
            {
                //echo "sucess";exit;
                foreach($_POST['leeds_user_id'] as $deskey=>$desvalue)
                {

                    $up_data = array('leeds_user_id' => $_POST['leeds_user_id'][$deskey], 'leeds_id' => $id);
                    if(is_numeric ($deskey))
                    {
                        Yii::$app->db->createCommand()->update('leed_assignments', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        $laid=1; $prm = LeedAssignments::find()->orderBy('id DESC')->one();if($prm){ $laid=$prm->id+1; }
                        $up_data['id']          =$laid;
                        $up_data['status']      ='1';
                        $up_data['date_created']=date('Y-m-d H:i:s');
                        Yii::$app->db->createCommand()->insert('leed_assignments', $up_data)->execute();
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model'           => $model,
                'users'           => $users,
                'LeedAssignments' => $LeedAssignments,
            ]);
        }
    }
    public function actionMemberDelete( $row_id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('leed_assignments', ['id' => $row_id] )->execute();
        return Json::encode(array('result'=>'Deleted Successfully'));
    }
    /**
     * Deletes an existing Leeds model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $this->findModel($id, $user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Leeds model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Leeds the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Leeds::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
