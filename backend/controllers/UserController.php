<?php

namespace backend\controllers;

use Yii;
use backend\models\User;
use backend\models\UserProfiles;
use backend\models\Vendors;
use backend\models\Manufacturers;
use backend\models\Builders;
use backend\models\Leeds;
use backend\models\Projects;
use app\models\UserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use backend\models\Logouploadmodel;
use backend\models\Coveruploadmodel;
use yii\web\UploadedFile;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new User();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
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
        if ($model->load(Yii::$app->request->post()) && $user = $model->signup()) {

            //Add builder info to user profile table
            Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $prmid, 'user_id' => $user->attributes['id'], 'date_created' => date('Y-m-d H:i:s')])->execute();

            //update user type as normal
            Yii::$app->db->createCommand()->update('user', ['user_type' => 'normal' ], 'id='.$user->attributes['id'])->execute();

            return $this->redirect(['update', 'id' => $user->attributes['id']]);
        }
        else
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }


    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $profilemodel = $this->findprofileModel($id);
        $logouploadmodel = new Logouploadmodel();
        $coveruploadmodel = new Coveruploadmodel();
        $logo=false;
        $cover = false;
        if (Yii::$app->request->isPost) {
            $pathlogo = dirname(dirname(__DIR__))."/frontend/web/uploads/customers/".$id.'/';
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

            $pathcover = dirname(dirname(__DIR__))."/frontend/web/uploads/customers/".$id.'/';
            if(!file_exists($pathcover))
            {
                mkdir($pathcover, 0777, true);
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
            //echo "lljsd";exit;
        }
        //
        if($logo)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $logofile], 'user_id = '.$id)->execute();
        }
        if($cover)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $coverfile], 'user_id = '.$id)->execute();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save() ) {
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else {
            //echo "<pre>";print_r($model);exit;
            return $this->render('update', [
                'model'             => $model,
                'profilemodel'      => $profilemodel,
                'logouploadmodel'   => $logouploadmodel,
                'coveruploadmodel'  => $coveruploadmodel,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $userprofile        = UserProfiles::deleteAll('user_id = '.$id);
        $userVendor         = Vendors::deleteAll('user_id = '.$id);
        $userManufacturer   = Manufacturers::deleteAll('user_id = '.$id);
        $userBuilders       = Builders::deleteAll('user_id = '.$id);
        $userBuilders       = Leeds::deleteAll('user_id = '.$id);
        $userBuilders       = Projects::deleteAll('user_id = '.$id);
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
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
