<?php

namespace backend\controllers;

use Yii;
use backend\models\ProjectAssignments;
use app\models\ProjectAssignmentsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProjectAssignmentsController implements the CRUD actions for ProjectAssignments model.
 */
class ProjectAssignmentsController extends Controller
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
     * Lists all ProjectAssignments models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectAssignmentsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProjectAssignments model.
     * @param integer $id
     * @param integer $projects_id
     * @return mixed
     */
    public function actionView($id, $projects_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $projects_id),
        ]);
    }

    /**
     * Creates a new ProjectAssignments model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProjectAssignments();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'projects_id' => $model->projects_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProjectAssignments model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $projects_id
     * @return mixed
     */
    public function actionUpdate($id, $projects_id)
    {
        $model = $this->findModel($id, $projects_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'projects_id' => $model->projects_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProjectAssignments model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $projects_id
     * @return mixed
     */
    public function actionDelete($id, $projects_id)
    {
        $this->findModel($id, $projects_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProjectAssignments model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $projects_id
     * @return ProjectAssignments the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $projects_id)
    {
        if (($model = ProjectAssignments::findOne(['id' => $id, 'projects_id' => $projects_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
