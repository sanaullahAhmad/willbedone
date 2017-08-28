<?php

namespace backend\controllers;

use Yii;
use backend\models\UserTestimonials;
use backend\models\User;
use app\models\UserTestimonialsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserTestimonialsController implements the CRUD actions for UserTestimonials model.
 */
class UserTestimonialsController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserTestimonials models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserTestimonialsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserTestimonials model.
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
     * Creates a new UserTestimonials model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserTestimonials();
        $model->date_created=date('Y-m-d H:i:s');
        //
        $Usermodel= User::find()->where(['user_type'=>'normal'])->all();
        $user_row = array();
        foreach($Usermodel as $row)
        {
            $user_row[$row->id]=$row->username;
        }
        //
        //
        $vendormodel= User::find()->where("user_type IN ('vendor','architect','manufacturer')")->all();
        $vendor_row = array();
        foreach($vendormodel as $row)
        {
            $vendor_row[$row->id]=$row->username;
        }
        //
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model'     => $model,
                'user_row'  => $user_row,
                'vendor_row' => $vendor_row,
            ]);
        }
    }

    /**
     * Updates an existing UserTestimonials model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->date_created=date('Y-m-d H:i:s');
        //
        $Usermodel= User::find()->where(['user_type'=>'normal'])->all();
        $user_row = array();
        foreach($Usermodel as $row)
        {
            $user_row[$row->id]=$row->username;
        }
        //
        $vendormodel= User::find()->where("user_type IN ('vendor','architect','manufacturer')")->all();
        $vendor_row = array();
        foreach($vendormodel as $row)
        {
            $vendor_row[$row->id]=$row->username;
        }
        //
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'user_row' => $user_row,
                'vendor_row' => $vendor_row,
            ]);
        }
    }

    /**
     * Deletes an existing UserTestimonials model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserTestimonials model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserTestimonials the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserTestimonials::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
