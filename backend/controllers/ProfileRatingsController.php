<?php

namespace backend\controllers;

use Yii;
use backend\models\ProfileRatings;
use app\models\ProfileRatingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProfileRatingsController implements the CRUD actions for ProfileRatings model.
 */
class ProfileRatingsController extends Controller
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
     * Lists all ProfileRatings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProfileRatingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProfileRatings model.
     * @param integer $id
     * @param integer $user_profiles_id
     * @return mixed
     */
    public function actionView($id, $user_profiles_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_profiles_id),
        ]);
    }

    /**
     * Creates a new ProfileRatings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProfileRatings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_profiles_id' => $model->user_profiles_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProfileRatings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_profiles_id
     * @return mixed
     */
    public function actionUpdate($id, $user_profiles_id)
    {
        $model = $this->findModel($id, $user_profiles_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_profiles_id' => $model->user_profiles_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProfileRatings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_profiles_id
     * @return mixed
     */
    public function actionDelete($id, $user_profiles_id)
    {
        $this->findModel($id, $user_profiles_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProfileRatings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_profiles_id
     * @return ProfileRatings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_profiles_id)
    {
        if (($model = ProfileRatings::findOne(['id' => $id, 'user_profiles_id' => $user_profiles_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
