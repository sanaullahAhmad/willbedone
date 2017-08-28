<?php

namespace backend\controllers;

use Yii;
use backend\models\ProductCategories;
use app\models\ProductCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ProductCategoriesController implements the CRUD actions for ProductCategories model.
 */
class ProductCategoriesController extends Controller
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
     * Lists all ProductCategories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ProductCategories model.
     * @param integer $id
     * @param integer $categories_id
     * @param integer $products_id
     * @return mixed
     */
    public function actionView($id, $categories_id, $products_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $categories_id, $products_id),
        ]);
    }

    /**
     * Creates a new ProductCategories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ProductCategories();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'categories_id' => $model->categories_id, 'products_id' => $model->products_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ProductCategories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $categories_id
     * @param integer $products_id
     * @return mixed
     */
    public function actionUpdate($id, $categories_id, $products_id)
    {
        $model = $this->findModel($id, $categories_id, $products_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'categories_id' => $model->categories_id, 'products_id' => $model->products_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ProductCategories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $categories_id
     * @param integer $products_id
     * @return mixed
     */
    public function actionDelete($id, $categories_id, $products_id)
    {
        $this->findModel($id, $categories_id, $products_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ProductCategories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $categories_id
     * @param integer $products_id
     * @return ProductCategories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $categories_id, $products_id)
    {
        if (($model = ProductCategories::findOne(['id' => $id, 'categories_id' => $categories_id, 'products_id' => $products_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
