<?php

namespace backend\controllers;

use Yii;
use backend\models\Manufacturers;
use app\models\ManufacturersSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\models\SignupForm;
use backend\models\UserProfiles;
use backend\models\User;
use backend\models\UserInfo;
use backend\models\UserAddresses;
use backend\models\UserCollections;
use backend\models\UserPhoneNumbers;
use backend\models\UserCatalogue;
use yii\web\UploadedFile;
use backend\models\Logouploadmodel;
use backend\models\Coveruploadmodel;
use backend\models\Catalogueuploadmodel;
use backend\models\Dealerlistuploadmodel;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * ManufacturersController implements the CRUD actions for Manufacturers model.
 */
class ManufacturersController extends Controller
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
                        'actions' => [ 'logout', 'crop-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'crop-logo'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'logo-cover-upload'],
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
     * Lists all Manufacturers models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ManufacturersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Manufacturers model.
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
     * Creates a new Manufacturers model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new Manufacturers();
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
        $manufacturer = new Manufacturers();
        $userrofile = new UserProfiles();
        if ($model->load(Yii::$app->request->post()) && $user =$model->signup()) {

            //insert userid to manufacturers table to register him as manufacturer too
            $manufacturer->user_id = $user->attributes['id'];
            if($manufacturer->save())
            {
                $newmanufacturer = Yii::$app->db->getLastInsertID();
            }


            //Add manufacturer info to user profile table
            Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $prmid, 'user_id' => $user->attributes['id'], 'date_created' => date('Y-m-d H:i:s')])->execute();
            //update user type as manufacturer
            Yii::$app->db->createCommand()->update('user', ['user_type' => 'manufacturer' ], 'id='.$user->attributes['id'])->execute();


            return $this->redirect(['update', 'id' => $newmanufacturer, 'user_id' => $user->attributes['id']]);
        }
        else
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Manufacturers model.
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
        $catalogueuploadmodel = new Catalogueuploadmodel();
        $dealerlistuploadmodel = new Dealerlistuploadmodel();
        $logo=false;
        $cover = false;
        if (Yii::$app->request->isPost) {
            $pathlogo = dirname(dirname(__DIR__))."/frontend/web/uploads/manufacturers/".$id.'/';
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

            $pathcover = dirname(dirname(__DIR__))."/frontend/web/uploads/manufacturers/".$id.'/';
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

            $catalogueuploadmodel->catalogue = UploadedFile::getInstance($catalogueuploadmodel, 'catalogue');
            if ($catalogueuploadmodel->catalogue && $catalogueuploadmodel->validate()) {
                $cataloguefile=uniqid(time(), true).   '.'   . $catalogueuploadmodel->catalogue->extension;
                $catalogueuploadmodel->catalogue->saveAs($pathcover . $cataloguefile);
                Yii::$app->db->createCommand()->update('user_profiles', ['cataloguefile' => $cataloguefile], 'user_id = '.$user_id)->execute();
            }

            $dealerlistuploadmodel->dealerlist = UploadedFile::getInstance($dealerlistuploadmodel, 'dealerlist');
            if ($dealerlistuploadmodel->dealerlist && $dealerlistuploadmodel->validate()) {
                $dealerlistfile=uniqid(time(), true).   '.'  . $dealerlistuploadmodel->dealerlist->extension;
                $dealerlistuploadmodel->dealerlist->saveAs($pathcover .$dealerlistfile);
                Yii::$app->db->createCommand()->update('user_profiles', ['dealerlistfile' => $dealerlistfile], 'user_id = '.$user_id)->execute();
            }

            //Add User information
            if(isset($_POST['description']))
            {
                foreach($_POST['description'] as $deskey=>$desvalue)
                {
                    $up_data = array('title' => $_POST['title'][$deskey], 'description' => $_POST['description'][$deskey], 'icon' => $_POST['icon'][$deskey], 'user_id' => $user_id);
                    if(is_numeric ($deskey))
                    {
                        Yii::$app->db->createCommand()->update('user_info', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        Yii::$app->db->createCommand()->insert('user_info', $up_data)->execute();
                    }
                }
            }
            //Add Additional Address
            if(isset($_POST['address']))
            {
                foreach($_POST['address'] as $deskey=>$desvalue)
                {
                    $up_data = array('address' => $_POST['address'][$deskey], 'user_id' => $user_id);
                    if(is_numeric ($deskey))
                    {
                        Yii::$app->db->createCommand()->update('user_addresses', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        Yii::$app->db->createCommand()->insert('user_addresses', $up_data)->execute();
                    }
                }
            }
            //Add Additional Phone Numbers
            if(isset($_POST['phone_number']))
            {
                foreach($_POST['phone_number'] as $deskey=>$desvalue)
                {
                    $up_data = array('phone_number' => $_POST['phone_number'][$deskey], 'user_id' => $user_id);
                    if(is_numeric ($deskey))
                    {
                        Yii::$app->db->createCommand()->update('user_phone_numbers', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        Yii::$app->db->createCommand()->insert('user_phone_numbers', $up_data)->execute();
                    }
                }
            }

            //Add User Collections
            if(isset($_POST['collection_description']))
            {
                foreach($_POST['collection_description'] as $deskey=>$desvalue)
                {
                    $up_data = array('title' => $_POST['collection_title'][$deskey], 'description' => $_POST['collection_description'][$deskey], 'user_id' => $user_id);
                    if(is_numeric ($deskey))
                    {
                        Yii::$app->db->createCommand()->update('user_collections', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        Yii::$app->db->createCommand()->insert('user_collections', $up_data)->execute();
                    }
                }
            }

            //Add Additional catalogue
            if(isset($_POST['catalogue_name'])) {
                $target_file = dirname(dirname(__DIR__)) . '/frontend/web/uploads/user-catalogue/' . $user_id;
                if (!file_exists($target_file)) {
                    mkdir($target_file, 0777, true);
                }
                foreach ($_POST['catalogue_name'] as $deskey => $desvalue) {
                    $up_data = array('name' => $_POST['catalogue_name'][$deskey], 'user_id' => $user_id);
                    if (is_numeric($deskey)) {
                        if ($_FILES["catalogue"]["tmp_name"][$deskey] !== '') {
                            $nefilename = uniqid(time(), true) . '.' . pathinfo(basename($_FILES["catalogue"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if (move_uploaded_file($_FILES["catalogue"]["tmp_name"][$deskey], $target_file . '/' . $nefilename)) {
                                $up_data['catalogue'] = $nefilename;
                            }
                        }
                        Yii::$app->db->createCommand()->update('user_catalogue', $up_data, 'id = ' . $deskey)->execute();
                    } else {
                        if ($_FILES["catalogue"]["tmp_name"][$deskey] !== '') {
                            $nefilename = uniqid(time(), true) . '.' . pathinfo(basename($_FILES["catalogue"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if (move_uploaded_file($_FILES["catalogue"]["tmp_name"][$deskey], $target_file . '/' . $nefilename)) {
                                $up_data['catalogue'] = $nefilename;
                            }
                        }
                        Yii::$app->db->createCommand()->insert('user_catalogue', $up_data)->execute();
                    }
                }
            }

        }
        if($logo)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $logofile], 'user_id = '.$user_id)->execute();
        }
        if($cover)
        {
            Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $coverfile], 'user_id = '.$user_id)->execute();
        }
        if ( $profilemodel->load(Yii::$app->request->post()) && $profilemodel->save(false) ) {
            //do nothing
        }
        //
        if ( $model->load(Yii::$app->request->post() ) && $model->save(false))
        {
            return $this->redirect(['view', 'id' => $id, 'user_id' => $user_id]);
        }
        else {

            $VendorInfomodel        = UserInfo::find()->where(['user_id' => $user_id])->all();
            $VendorAddressmodel     = UserAddresses::find()->where(['user_id' => $user_id])->all();
            $VendorPhoneNumbersmodel= UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
            $VendorCataloguemodel   = UserCatalogue::find()->where(['user_id' => $user_id])->all();
            $VendorCollectionmodel  = UserCollections::find()->where(['user_id' => $user_id])->all();
            return $this->render('update', [
                'manufacturer_id'        => $id,
                'model'                  => $model,
                'profilemodel'           => $profilemodel,
                'VendorInfomodel'        => $VendorInfomodel,
                'logouploadmodel'        => $logouploadmodel,
                'coveruploadmodel'       => $coveruploadmodel,
                'VendorAddressmodel'     => $VendorAddressmodel,
                'VendorCataloguemodel'   => $VendorCataloguemodel,
                'VendorCollectionmodel'  => $VendorCollectionmodel,
                'VendorPhoneNumbersmodel'=> $VendorPhoneNumbersmodel,

                'catalogueuploadmodel'   => $catalogueuploadmodel,
                'dealerlistuploadmodel'  => $dealerlistuploadmodel,
            ]);
        }
    }

    /**
     * Deletes an existing Manufacturers model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $userprofile        = UserProfiles::deleteAll('user_id = '.$user_id);
        $this->findModel($id, $user_id)->delete();
        $user         = User::deleteAll('id = '.$user_id);

        return $this->redirect(['index']);
    }

    /**
     * Finds the Manufacturers model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Manufacturers the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Manufacturers::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
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


    public function actionCropImage($id, $user_id, $image,$cx, $cy, $cw, $ch)
    {
        $targ_w =1136; $targ_h = 388;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/manufacturers/' . $id ;
        if(!file_exists($target_file))
        {
            mkdir($target_file, 0777, true);
        }
        $src = $target_file.'/'.$image;
        if(pathinfo($image,PATHINFO_EXTENSION)=='jpg' || pathinfo($image,PATHINFO_EXTENSION)=='jpeg')
        {
            $img_r = imagecreatefromjpeg($src);
        }
        elseif(pathinfo($image,PATHINFO_EXTENSION)=='png')
        {
            $img_r = imagecreatefrompng($src);
        }
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );

        imagecopyresampled($dst_r,$img_r,0,0,$_GET['cx'],$_GET['cy'],
            $targ_w,$targ_h,$_GET['cw'],$_GET['ch']);

        if(pathinfo($image,PATHINFO_EXTENSION)=='jpg' || pathinfo($image,PATHINFO_EXTENSION)=='jpeg')
        {
            imagejpeg($dst_r,$src,$jpeg_quality);
        }
        elseif(pathinfo($image,PATHINFO_EXTENSION)=='png')
        {
            imagepng($dst_r,$src);
        }
        $new_name = uniqid(time(), true).'.'.pathinfo( $image, PATHINFO_EXTENSION);
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/manufacturers/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('cover');
        if ($oldfile->getAttribute('cover') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('cover'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('cover'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/manufacturers/'. $id .'/'.$new_name));
    }
    public function actionCropLogo($id, $user_id, $image,$lx, $ly, $lw, $lh)
    {
        $targ_w =124; $targ_h = 124;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/manufacturers/' . $id ;
        if(!file_exists($target_file))
        {
            mkdir($target_file, 0777, true);
        }
        $src = $target_file.'/'.$image;
        if(pathinfo($image,PATHINFO_EXTENSION)=='jpg' || pathinfo($image,PATHINFO_EXTENSION)=='jpeg')
        {
            $img_r = imagecreatefromjpeg($src);
        }
        elseif(pathinfo($image,PATHINFO_EXTENSION)=='png')
        {
            $img_r = imagecreatefrompng($src);
        }
        $dst_r = ImageCreateTrueColor( $targ_w, $targ_h );
        imagecopyresampled($dst_r,$img_r,0,0,$_GET['lx'],$_GET['ly'],
            $targ_w,$targ_h,$_GET['lw'],$_GET['lh']);
        if(pathinfo($image,PATHINFO_EXTENSION)=='jpg' || pathinfo($image,PATHINFO_EXTENSION)=='jpeg')
        {
            imagejpeg($dst_r,$src,$jpeg_quality);
        }
        elseif(pathinfo($image,PATHINFO_EXTENSION)=='png')
        {
            imagepng($dst_r,$src);
        }
        $new_name = uniqid(time(), true).'.'.pathinfo( $image, PATHINFO_EXTENSION);
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/manufacturers/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('logo');
        if ($oldfile->getAttribute('logo') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('logo'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('logo'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/manufacturers/'. $id .'/'.$new_name));
    }
    public function actionLogoCoverUpload ($id, $user_id, $fieldname)
    {
        //print_r($_FILES);
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/manufacturers/' . $id ;
        if(!file_exists($target_file))
        {
            mkdir($target_file, 0777, true);
        }
        if($_FILES["input_file_name"]["tmp_name"] !== '') {
            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["input_file_name"]["name"]), PATHINFO_EXTENSION);
            if ( move_uploaded_file( $_FILES["input_file_name"]["tmp_name"], $target_file.'/'.$nefilename) ) {
                $responsArray = array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/manufacturers/'. $id .'/'.$nefilename);
                if(file_exists($target_file.'/'.$nefilename))
                {
                    $sizes =getimagesize($target_file.'/'.$nefilename);
                    $responsArray['width']= $sizes[0];
                    $responsArray['height']= $sizes[1];
                    if($fieldname=='logo')
                    {
                        if($sizes[0]<124 || $sizes[1]<124)
                        {
                            $responsArray['crop']='small-image-size-error';
                        }
                        elseif($sizes[0]==124 && $sizes[1]==124)
                        {
                            $responsArray['crop']='no';
                            $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
                            $responsArray['oldfile']=$oldfile->getAttribute($fieldname);
                            if (file_exists($target_file . '/' . $oldfile->getAttribute($fieldname))) {
                                unlink($target_file . '/' . $oldfile->getAttribute($fieldname));
                            }
                            Yii::$app->db->createCommand()->update('user_profiles', [$fieldname => $nefilename], 'user_id = '.$user_id)->execute();
                        }
                        else
                        {
                            $responsArray['crop']='yes';
                        }
                    }
                    elseif($fieldname=='cover')
                    {
                        if($sizes[0]<1136 || $sizes[1]<388)
                        {
                            $responsArray['crop']='small-image-size-error';
                        }
                        elseif($sizes[0]==1136 && $sizes[1]==388)
                        {
                            $responsArray['crop']='no';
                            $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
                            $responsArray['oldfile']=$oldfile->getAttribute($fieldname);
                            if (file_exists($target_file . '/' . $oldfile->getAttribute($fieldname))) {
                                unlink($target_file . '/' . $oldfile->getAttribute($fieldname));
                            }
                            Yii::$app->db->createCommand()->update('user_profiles', [$fieldname => $nefilename], 'user_id = '.$user_id)->execute();
                        }
                        else
                        {
                            $responsArray['crop']='yes';
                        }
                    }

                }
                return Json::encode( $responsArray);
            }
        }
        else{
            return Json::encode(array('result'=>'Error occurecd'));
        }
    }

}
