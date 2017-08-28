<?php

namespace backend\controllers;

use Yii;
use backend\models\SubSubCategories;
use backend\models\SubCategories;
use backend\models\Categories;
use backend\models\ProductCategories;
use app\models\SubSubCategoriesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class SubSubCategoriesController extends Controller
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
                        'actions' => ['logout', 'ajax-subcategory-list'],
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
     * Lists all Categories models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SubSubCategoriesSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Categories model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Categories model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SubSubCategories();
        //echo "<pre>"; print_r();exit;

        //for Parent category list
        $Categoriesmodel= Categories::find()->where(['parent'=>'0'])->all();
        $cat_row = array();
        foreach($Categoriesmodel as $row)
        {
            $cat_row[$row->id]=$row->category;
        }
        $SubCategoriesmodel= SubCategories::find()->where('parent!=0 and sub_parent=0')->all();
        $sub_cat_row = array();
        foreach($SubCategoriesmodel as $row)
        {
            $sub_cat_row[$row->id]=$row->category;
        }
        $model->date_created = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'         => $model,
                'cat_row'       => $cat_row,
                'sub_cat_row'   => $sub_cat_row,
            ]);
        }
    }

    public function actionAjaxSubcategoryList($id)
    {
        $Categoriesmodel= Categories::find()->where('parent='.$id.' AND sub_parent = 0')->all();
        $markup ='<label>Select Subcategory</label><select name="SubSubCategories[sub_parent]" class="form-control"><option value="">--Select--</option> ';
        if($Categoriesmodel)
        {
            foreach($Categoriesmodel as $row)
            {
                $markup.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }
        $markup.='</select>';
        return $markup;
    }
    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $Categoriesmodel= Categories::find()->where(['parent'=>'0'])->all();
            $cat_row = array();
            foreach($Categoriesmodel as $row)
            {
                $cat_row[$row->id]=$row->category;
            }
            $SubCategoriesmodel= SubCategories::find()->where('parent!=0 and sub_parent=0')->all();
            $sub_cat_row = array();
            foreach($SubCategoriesmodel as $row)
            {
                $sub_cat_row[$row->id]=$row->category;
            }
            return $this->render('update', [
                'model'         => $model,
                'cat_row'       => $cat_row,
                'sub_cat_row'   => $sub_cat_row,
            ]);
        }
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $userprofile    = ProductCategories::deleteAll('categories_id = '.$id);
        $this->findModel($id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SubSubCategories::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
