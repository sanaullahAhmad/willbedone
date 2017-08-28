<?php

namespace backend\controllers;

use Yii;
use backend\models\Builders;
use app\models\BuildersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use backend\models\User;
use frontend\models\SignupForm;
use backend\models\UserProfiles;
use backend\models\Logouploadmodel;
use backend\models\Coveruploadmodel;
use yii\web\UploadedFile;

/**
 * BuildersController implements the CRUD actions for Builders model.
 */
class BuildersController extends Controller
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
     * Lists all Builders models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BuildersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Builders model.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionView($id, $user_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $user_id),
        ]);
    }

    /**
     * Creates a new Builders model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate()
    {
        /*$model = new Vendors();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }*/
        $prmid=1;
        $prm = UserProfiles::find()->orderBy('id DESC')->one();
        if($prm)
        {
            $prmid=$prm->id+1;
        }
        $model = new SignupForm();
        $builderprofile = new Builders();
        $userrofile = new UserProfiles();
        if ($model->load(Yii::$app->request->post()) && $user =$model->signup()) {
            //insert userid to vendors table to register him as vendor too
            $builderprofile->user_id = $user->attributes['id'];
            if($builderprofile->save())
            {
                $newbuilder = Yii::$app->db->getLastInsertID();
            }
            //Add builder info to user profile table
            Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $prmid, 'user_id' => $user->attributes['id'], 'date_created' => date('Y-m-d H:i:s')])->execute();
            //update user type as builder
            Yii::$app->db->createCommand()->update('user', ['user_type' => 'builder' ], 'id='.$user->attributes['id'])->execute();

            return $this->redirect(['update', 'id' => $newbuilder, 'user_id' => $user->attributes['id']]);
        }
        else
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Builders model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        /*$model = $this->findModel($id, $user_id);
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }*/
        $model = $this->findUserModel($user_id);
        $profilemodel = $this->findprofileModel($user_id);
        $logouploadmodel = new Logouploadmodel();
        $coveruploadmodel = new Coveruploadmodel();
        $logo=false;
        $cover = false;
        if (Yii::$app->request->isPost) {
            $pathlogo = dirname(dirname(__DIR__))."/frontend/web/uploads/builders/".$id.'/';
            if(!file_exists($pathlogo))
            {
                mkdir($pathlogo, 0777, true);
            }
            $logouploadmodel->logo = UploadedFile::getInstance($logouploadmodel, 'logo');
            if ($logouploadmodel->logo && $logouploadmodel->validate()) {
                $logouploadmodel->logo->saveAs($pathlogo . $logouploadmodel->logo->baseName . '.' . $logouploadmodel->logo->extension);
                //set logo field in userprofile
                $logo = true;
                $logofile=$logouploadmodel->logo->baseName . '.' . $logouploadmodel->logo->extension;
            }
            //

            $pathcover = dirname(dirname(__DIR__))."/frontend/web/uploads/builders/".$id.'/';
            if(!file_exists($pathcover))
            {
                mkdir($pathlogo, 0777, true);
            }
            $coveruploadmodel->cover = UploadedFile::getInstance($coveruploadmodel, 'cover');
            if ($coveruploadmodel->cover && $coveruploadmodel->validate()) {
                $coveruploadmodel->cover->saveAs($pathcover . $coveruploadmodel->cover->baseName . '.' . $coveruploadmodel->cover->extension);
                //set cover field in userprofile
                $cover= true;
                $coverfile=$coveruploadmodel->cover->baseName . '.' . $coveruploadmodel->cover->extension;
            }

        }
        if ( $profilemodel->load(Yii::$app->request->post()) && $profilemodel->save(false) ) {
            //do nothing
        }
        // update an existing row of data
        if($logo)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $logofile], 'user_id = '.$user_id)->execute();
        }
        if($cover)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $coverfile], 'user_id = '.$user_id)->execute();
        }
        //
        if ( $model->load(Yii::$app->request->post() ) && $model->save(false))
        {
            //echo "succeess<pre>";print_r(Yii::$app->request->post());exit;
            return $this->redirect(['view', 'id' => $id, 'user_id' => $user_id]);
        }
        else {
            return $this->render('update', [
                'model' => $model,
                'profilemodel' => $profilemodel,
                'logouploadmodel' => $logouploadmodel,
                'coveruploadmodel' => $coveruploadmodel,
                'builder_id' => $id,
            ]);
        }
    }

    /**
     * Deletes an existing Builders model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $userprofile  = UserProfiles::deleteAll('user_id = '.$user_id);
        $this->findModel($id, $user_id)->delete();
        $user         = User::deleteAll('id = '.$user_id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Builders model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Builders the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Builders::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    protected function findUserModel($user_id)
    {
        if (($model = User::findone([ 'id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findprofileModel($id)
    {
        if (($model = UserProfiles::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
