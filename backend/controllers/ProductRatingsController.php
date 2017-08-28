<?php

namespace backend\controllers;

use Yii;
use backend\models\ProductRatings;
use app\models\ProductRatingsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductRatingsController implements the CRUD actions for ProductRatings model.
 */
class ProductRatingsController extends Controller
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
     * Lists all ProductRatings models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductRatingsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductRatings model.
     * @param integer $id
     * @param integer $products_id
     * @return mixed
     */
    public function actionView($id, $products_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $products_id),
        ]);
    }

    /**
     * Creates a new ProductRatings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductRatings();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'products_id' => $model->products_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductRatings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $products_id
     * @return mixed
     */
    public function actionUpdate($id, $products_id)
    {
        $model = $this->findModel($id, $products_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'products_id' => $model->products_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductRatings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $products_id
     * @return mixed
     */
    public function actionDelete($id, $products_id)
    {
        $this->findModel($id, $products_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductRatings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $products_id
     * @return ProductRatings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $products_id)
    {
        if (($model = ProductRatings::findOne(['id' => $id, 'products_id' => $products_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
