<?php

namespace backend\controllers;

use backend\models\Architects;
use backend\models\Manufacturers;
use backend\models\Products;
use backend\models\Vendors;
use Yii;
use backend\models\Videos;
use backend\models\SearchVideos;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * VideosController implements the CRUD actions for Videos model.
 */
class VideosController extends Controller
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
     * Lists all Videos models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SearchVideos();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Videos model.
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
     * Creates a new Videos model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Videos();
        $model->date_added=date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
    public function actionAjaxRelatedWithList($related_to)
    {
        $markup ='<label>Select Related with</label><select name="Videos[related_id]" id="videos-related_id" class="form-control"><option value="">--Select--</option> ';

        if($related_to=='products')
        {
            $Categoriesmodel= Products::find()->all();
            if($Categoriesmodel)
            {
                foreach($Categoriesmodel as $row)
                {
                    $markup.='<option value="'.$row->id.'">'.$row->name.'</option>';
                }
            }
        }
        else{
            if($related_to=='manufacturers')
            {
                $Categoriesmodel= Manufacturers::find()->all();
            }
            if($related_to=='architects')
            {
                $Categoriesmodel= Architects::find()->all();
            }
            if($related_to=='vendors')
            {
                $Categoriesmodel= Vendors::find()->all();
            }
            if($Categoriesmodel)
            {
                foreach($Categoriesmodel as $row)
                {
                    $markup.='<option value="'.$row->id.'">'. Products::getinfo('user_id', $row->user_id, 'user_profiles', 'full_name').'</option>';
                }
            }
        }

        $markup.='</select>';
        return $markup;
    }
    /**
     * Updates an existing Videos model.
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
            if ($model->related_to == 'products') {
                $related_with = \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'name');
            } else {
                $user_id = \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'user_id');
                $related_with =  \backend\models\Products::getinfo('user_id', $user_id, 'user_profiles', 'full_name');

            }
            return $this->render('update', [
                'model'         => $model,
                'related_with'  => $related_with,
                'related_id'    => $model->related_id,
            ]);
        }
    }

    /**
     * Deletes an existing Videos model.
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
     * Finds the Videos model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Videos the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Videos::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
