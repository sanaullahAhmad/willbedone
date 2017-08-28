<?php

namespace backend\controllers;

use Yii;
use backend\models\Brands;
use app\models\BrandsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BrandsController implements the CRUD actions for Brands model.
 */
class BrandsController extends Controller
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
     * Lists all Brands models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BrandsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Brands model.
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
     * Creates a new Brands model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Brands();
        $model->date_created=date('Y-m-d H:i:s');
        $model->image='xyz.jpg';
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            $newBrand = Yii::$app->db->getLastInsertID();
            $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/brands/' . $newBrand ;
            if(!file_exists($target_file))
            {
                mkdir($target_file, 0777, true);
            }
            if($_FILES["Brands"]["tmp_name"]['image'] !== '') {
                $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["Brands"]["name"]['image']), PATHINFO_EXTENSION);
                if ( move_uploaded_file( $_FILES["Brands"]["tmp_name"]['image'], $target_file.'/'.$nefilename) ) {
                    $up_data['image']=$nefilename;
                    Yii::$app->db->createCommand()->update('brands', $up_data, 'id = '.$newBrand)->execute();
                }
            }


            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Brands model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            $newBrand = $model->id;
            $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/brands/' . $newBrand ;
            if(!file_exists($target_file))
            {
                mkdir($target_file, 0777, true);
            }
            if($_FILES["Brands"]["tmp_name"]['image'] !== '') {
                $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["Brands"]["name"]['image']), PATHINFO_EXTENSION);
                if ( move_uploaded_file( $_FILES["Brands"]["tmp_name"]['image'], $target_file.'/'.$nefilename) ) {
                    $up_data['image']=$nefilename;
                    Yii::$app->db->createCommand()->update('brands', $up_data, 'id = '.$newBrand)->execute();
                }
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Brands model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        //remove files of this brand
        $dir = dirname(dirname(__DIR__)).'/frontend/web/uploads/brands/'. $id;
        $this->deleteDirectory($dir);

        return $this->redirect(['index']);
    }
    function deleteDirectory($dir) {
        if (!file_exists($dir)) {
            return true;
        }
        if (!is_dir($dir)) {
            return unlink($dir);
        }
        foreach (scandir($dir) as $item) {
            if ($item == '.' || $item == '..') {
                continue;
            }
            if (!$this->deleteDirectory($dir . DIRECTORY_SEPARATOR . $item)) {
                return false;
            }
        }
        return rmdir($dir);
    }
    /**
     * Finds the Brands model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Brands the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Brands::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
