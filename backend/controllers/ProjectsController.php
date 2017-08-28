<?php

namespace backend\controllers;

use backend\models\Countries;
use Yii;
use backend\models\Projects;
use app\models\ProjectsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\Categories;
use backend\models\User;
use backend\models\ProjectPictures;
use backend\models\UserProfiles;
use backend\models\Vendors;
use backend\models\Manufacturers;
use backend\models\Builders;

/**
 * ProjectsController implements the CRUD actions for Projects model.
 */
class ProjectsController extends Controller
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
     * Lists all Projects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Projects model.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_vendors_id
     * @param integer $user_vendors_id1
     * @param integer $user_builders_id
     * @return mixed
     */
    public function actionView($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id),
        ]);
    }

    /**
     * Creates a new Projects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Projects();
        $model->date_created = date("Y-m-d H:i:s");
        $prmid=1;
        $prm = Projects::find()->orderBy('id DESC')->one();
        if($prm)
        {
             $prmid=$prm->id+1;
        }
        $model->id = $prmid;
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_vendors_id' => $model->user_vendors_id, 'user_vendors_id1' => $model->user_vendors_id1, 'user_builders_id' => $model->user_builders_id]);
        } else {
            $Countriesmodel= Countries::find()->all();
            $count_row = array();
            foreach($Countriesmodel as $row)
            {
                $count_row[$row->id]=$row->country_name;
            }
            $Categoriesmodel= Categories::find()->where(['parent'=>0, 'sub_parent'=>0])->all();
            $cat_row = array();
            foreach($Categoriesmodel as $row)
            {
                $cat_row[$row->id]=$row->category;
            }
            //
            $Usermodel= User::find()->where(['user_type'=>'architect'])->all();
            $user_row = array();
            foreach($Usermodel as $row)
            {
                $user_row[$row->id]=$row->username;
            }
            //
            $Vendormodel= User::find()->innerJoinWith('vendors')->all();
            //echo "<pre>";print_r($user_row);exit;
            //$Vendormodel= Vendors::find()->all();
            $vendors_row = array();
            foreach($Vendormodel as $row)
            {
                $vendors_row[$row->id]=$row->username;
            }
            //
            $Manufacturersmodel= User::find()->innerJoinWith('manufacturers')->all();
            //$Manufacturersmodel= Manufacturers::find()->all();
            $manufacturers_row = array();
            foreach($Manufacturersmodel as $row)
            {
                $manufacturers_row[$row->id]=$row->username;
            }
            //
            $Buildersmodel= User::find()->innerJoinWith('builders')->all();
            //$Buildersmodel= Builders::find()->all();
            $builders_row = array();
            foreach($Buildersmodel as $row)
            {
                $builders_row[$row->id]=$row->username;
            }
            return $this->render('create', [
                'model'             => $model,
                'cat_row'           => $cat_row,
                'count_row'         => $count_row,
                'user_row'          => $user_row,
                'vendors_row'       => $vendors_row,
                'manufacturers_row' => $manufacturers_row,
                'builders_row'      => $builders_row,
            ]);
        }
    }

    /**
     * Updates an existing Projects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_vendors_id
     * @param integer $user_vendors_id1
     * @param integer $user_builders_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id)
    {
        $model = $this->findModel($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_vendors_id' => $model->user_vendors_id, 'user_vendors_id1' => $model->user_vendors_id1, 'user_builders_id' => $model->user_builders_id]);
        } else {
            $ProjectPicturesmodel   = new ProjectPictures;
            $ProjectPicsmodel       = ProjectPictures::find()->where(['projects_id' => $id])->all();
            $Categoriesmodel= Categories::find()->where(['parent'=>0, 'sub_parent'=>0])->all();
            $cat_row = array();
            foreach($Categoriesmodel as $row)
            {
                $cat_row[$row->id]=$row->category;
            }
            $Countriesmodel= Countries::find()->all();
            $count_row = array();
            foreach($Countriesmodel as $row)
            {
                $count_row[$row->id]=$row->country_name;
            }
            //
            $Usermodel= User::find()->where(['user_type'=>'architect'])->all();
            $user_row = array();
            foreach($Usermodel as $row)
            {
                $user_row[$row->id]=$row->username;
            }
            //
            $Vendormodel= User::find()->innerJoinWith('vendors')->all();
            //echo "<pre>";print_r($Usermodel);exit;
            //$Vendormodel= Vendors::find()->all();
            $vendors_row = array();
            foreach($Vendormodel as $row)
            {
                $vendors_row[$row->id]=$row->username;
            }
            //
            $Manufacturersmodel= User::find()->innerJoinWith('manufacturers')->all();
            //$Manufacturersmodel= Manufacturers::find()->all();
            $manufacturers_row = array();
            foreach($Manufacturersmodel as $row)
            {
                $manufacturers_row[$row->id]=$row->username;
            }
            //
            $Buildersmodel= User::find()->innerJoinWith('builders')->all();
            //$Buildersmodel= Builders::find()->all();
            $builders_row = array();
            foreach($Buildersmodel as $row)
            {
                $builders_row[$row->id]=$row->username;
            }
            return $this->render('update', [
                'model' => $model,
                'cat_row'           => $cat_row,
                'count_row'         => $count_row,
                'user_row'          => $user_row,
                'vendors_row'       => $vendors_row,
                'manufacturers_row' => $manufacturers_row,
                'builders_row'      => $builders_row,
                'ProjectPicsmodel'      => $ProjectPicsmodel,
                'ProjectPicturesmodel'  => $ProjectPicturesmodel,
            ]);
        }
    }

    /**
     * Deletes an existing Projects model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_vendors_id
     * @param integer $user_vendors_id1
     * @param integer $user_builders_id
     * @return mixed
     */
    public function actionDelete($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id)
    {
        $this->findModel($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Projects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @param integer $user_vendors_id
     * @param integer $user_vendors_id1
     * @param integer $user_builders_id
     * @return Projects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id, $user_vendors_id, $user_vendors_id1, $user_builders_id)
    {
        if (($model = Projects::findOne(['id' => $id, 'user_id' => $user_id, 'user_vendors_id' => $user_vendors_id, 'user_vendors_id1' => $user_vendors_id1, 'user_builders_id' => $user_builders_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
