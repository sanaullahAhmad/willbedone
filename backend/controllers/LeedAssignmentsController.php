<?php

namespace backend\controllers;

use Yii;
use backend\models\LeedAssignments;
use app\models\LeedAssignmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * LeedAssignmentsController implements the CRUD actions for LeedAssignments model.
 */
class LeedAssignmentsController extends Controller
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
     * Lists all LeedAssignments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new LeedAssignmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LeedAssignments model.
     * @param integer $id
     * @param integer $leeds_id
     * @param integer $leeds_user_id
     * @return mixed
     */
    public function actionView($id, $leeds_id, $leeds_user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $leeds_id, $leeds_user_id),
        ]);
    }

    /**
     * Creates a new LeedAssignments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LeedAssignments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'leeds_id' => $model->leeds_id, 'leeds_user_id' => $model->leeds_user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LeedAssignments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $leeds_id
     * @param integer $leeds_user_id
     * @return mixed
     */
    public function actionUpdate($id, $leeds_id, $leeds_user_id)
    {
        $model = $this->findModel($id, $leeds_id, $leeds_user_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'leeds_id' => $model->leeds_id, 'leeds_user_id' => $model->leeds_user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing LeedAssignments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $leeds_id
     * @param integer $leeds_user_id
     * @return mixed
     */
    public function actionDelete($id, $leeds_id, $leeds_user_id)
    {
        $this->findModel($id, $leeds_id, $leeds_user_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the LeedAssignments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $leeds_id
     * @param integer $leeds_user_id
     * @return LeedAssignments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $leeds_id, $leeds_user_id)
    {
        if (($model = LeedAssignments::findOne(['id' => $id, 'leeds_id' => $leeds_id, 'leeds_user_id' => $leeds_user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
