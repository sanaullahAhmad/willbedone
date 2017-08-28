<?php

namespace backend\controllers;

use Yii;
use backend\models\ShoppingListItems;
use app\models\ShoppingListItemsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * ShoppingListItemsController implements the CRUD actions for ShoppingListItems model.
 */
class ShoppingListItemsController extends Controller
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
     * Lists all ShoppingListItems models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShoppingListItemsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShoppingListItems model.
     * @param integer $id
     * @param integer $user_shopping_list_id
     * @param integer $user_shopping_list_user_id
     * @param integer $products_id
     * @param integer $products_product_categories_id
     * @return mixed
     */
    public function actionView($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id),
        ]);
    }

    /**
     * Creates a new ShoppingListItems model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShoppingListItems();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_shopping_list_id' => $model->user_shopping_list_id, 'user_shopping_list_user_id' => $model->user_shopping_list_user_id, 'products_id' => $model->products_id, 'products_product_categories_id' => $model->products_product_categories_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShoppingListItems model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_shopping_list_id
     * @param integer $user_shopping_list_user_id
     * @param integer $products_id
     * @param integer $products_product_categories_id
     * @return mixed
     */
    public function actionUpdate($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id)
    {
        $model = $this->findModel($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_shopping_list_id' => $model->user_shopping_list_id, 'user_shopping_list_user_id' => $model->user_shopping_list_user_id, 'products_id' => $model->products_id, 'products_product_categories_id' => $model->products_product_categories_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShoppingListItems model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_shopping_list_id
     * @param integer $user_shopping_list_user_id
     * @param integer $products_id
     * @param integer $products_product_categories_id
     * @return mixed
     */
    public function actionDelete($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id)
    {
        $this->findModel($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ShoppingListItems model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_shopping_list_id
     * @param integer $user_shopping_list_user_id
     * @param integer $products_id
     * @param integer $products_product_categories_id
     * @return ShoppingListItems the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_shopping_list_id, $user_shopping_list_user_id, $products_id, $products_product_categories_id)
    {
        if (($model = ShoppingListItems::findOne(['id' => $id, 'user_shopping_list_id' => $user_shopping_list_id, 'user_shopping_list_user_id' => $user_shopping_list_user_id, 'products_id' => $products_id, 'products_product_categories_id' => $products_product_categories_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
