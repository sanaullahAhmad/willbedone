<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\Architects;
use backend\models\User;
use backend\models\UserProfiles;
use backend\models\UserTeam;
use backend\models\UserInfo;
use backend\models\UserAddresses;
use backend\models\UserPhoneNumbers;
use backend\models\ArchitectTrustedVendors;
use backend\models\Logouploadmodel;
use backend\models\Coveruploadmodel;
use backend\models\Catalogueuploadmodel;
use backend\models\Dealerlistuploadmodel;
use app\models\ArchitectsSearch;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * ArchitectsController implements the CRUD actions for Architects model.
 */
class ArchitectsController extends Controller
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
                        'actions' => [ 'logout', 'media'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'member-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'info-delete'],
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
     * Lists all Architects models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArchitectsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Architects model.
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
     * Creates a new Architects model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        /*$model = new Architects();

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
        $architect = new Architects();
        if ($model->load(Yii::$app->request->post()) && $user =$model->signup()) {
            //update user type as architect
            Yii::$app->db->createCommand()->update('user', ['user_type' => 'architect' ], 'id='.$user->attributes['id'])->execute();

            //Add architect info to user profile table
            Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $prmid, 'user_id' => $user->attributes['id'], 'date_created' => date('Y-m-d H:i:s')])->execute();


            $architect->user_id = $user->attributes['id'];
            if($architect->save())
            {
                $newarchitect = Yii::$app->db->getLastInsertID();
            }
            return $this->redirect(['update', 'id' => $newarchitect, 'user_id' => $user->attributes['id']]);

            //return $this->redirect(['index']);
        }
        else
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Architects model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionUpdate($id, $user_id)
    {
        $model                  = $this->findUserModel($user_id);
        $profilemodel           = $this->findprofileModel($user_id);
        $logouploadmodel        = new Logouploadmodel();
        $coveruploadmodel       = new Coveruploadmodel();
        $catalogueuploadmodel   = new Catalogueuploadmodel();
        $dealerlistuploadmodel  = new Dealerlistuploadmodel();
        if (Yii::$app->request->isPost) {
            $pathcover = dirname(dirname(__DIR__))."/frontend/web/uploads/architects/".$id.'/';
            if(!file_exists($pathcover))
            {
                mkdir($pathcover, 0777, true);
            }
            $logouploadmodel->logo = UploadedFile::getInstance($logouploadmodel, 'logo');
            if ($logouploadmodel->logo && $logouploadmodel->validate()) {
                $newfilename = uniqid(time(), true);
                $logouploadmodel->logo->saveAs($pathcover .$newfilename . '.' . $logouploadmodel->logo->extension);
                $logofile=$newfilename . '.' . $logouploadmodel->logo->extension;
                Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $logofile], 'user_id = '.$user_id)->execute();
            }


            $coveruploadmodel->cover = UploadedFile::getInstance($coveruploadmodel, 'cover');
            if ($coveruploadmodel->cover && $coveruploadmodel->validate()) {
                $newfilename = uniqid(time(), true);
                $coveruploadmodel->cover->saveAs($pathcover . $newfilename . '.' . $coveruploadmodel->cover->extension);
                $coverfile=$newfilename . '.' . $coveruploadmodel->cover->extension;
                Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $coverfile], 'user_id = '.$user_id)->execute();
            }


            $catalogueuploadmodel->catalogue = UploadedFile::getInstance($catalogueuploadmodel, 'catalogue');
            if ($catalogueuploadmodel->catalogue && $catalogueuploadmodel->validate()) {
                $newfilename = uniqid(time(), true);
                $catalogueuploadmodel->catalogue->saveAs($pathcover . $newfilename . '.' . $catalogueuploadmodel->catalogue->extension);
                $cataloguefile=$newfilename . '.' . $catalogueuploadmodel->catalogue->extension;
                Yii::$app->db->createCommand()->update('user_profiles', ['cataloguefile' => $cataloguefile], 'user_id = '.$user_id)->execute();
            }

            $dealerlistuploadmodel->dealerlist = UploadedFile::getInstance($dealerlistuploadmodel, 'dealerlist');
            if ($dealerlistuploadmodel->dealerlist && $dealerlistuploadmodel->validate()) {
                $newfilename = uniqid(time(), true);
                $dealerlistuploadmodel->dealerlist->saveAs($pathcover . $newfilename . '.' . $dealerlistuploadmodel->dealerlist->extension);
                $dealerlistfile=$newfilename . '.' . $dealerlistuploadmodel->dealerlist->extension;
                Yii::$app->db->createCommand()->update('user_profiles', ['dealerlistfile' => $dealerlistfile], 'user_id = '.$user_id)->execute();
            }
            //Add members information
            if(isset($_POST['designation']))
            {
                $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/user-team/' . $user_id ;
                if(!file_exists($target_file))
                {
                    mkdir($target_file, 0777, true);
                }
                foreach($_POST['designation'] as $deskey=>$desvalue)
                {
                    $up_data = array('name' => $_POST['name'][$deskey], 'designation' => $_POST['designation'][$deskey], 'user_id' => $user_id);
                    if(is_numeric ($deskey))
                    {
                        if($_FILES["picture"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["picture"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if ( move_uploaded_file( $_FILES["picture"]["tmp_name"][$deskey], $target_file.'/'.$nefilename) ) {
                                $up_data['picture']=$nefilename;
                                $this->resize_image($target_file.'/'.$nefilename, 124, 124, 1);//resize to set team image req

                            }
                        }
                        Yii::$app->db->createCommand()->update('user_team', $up_data, 'id = '.$deskey)->execute();
                    }
                    else{
                        if($_FILES["picture"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["picture"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if ( move_uploaded_file( $_FILES["picture"]["tmp_name"][$deskey], $target_file.'/'.$nefilename ) ) {
                                $up_data['picture']=$nefilename;
                                $this->resize_image($target_file.'/'.$nefilename, 124, 124, 1);//resize to set team image req

                            }
                        }
                        Yii::$app->db->createCommand()->insert('user_team', $up_data)->execute();
                    }
                }
            }
            //Add User information
            if(isset($_POST['description']))
            {
                foreach($_POST['description'] as $deskey=>$desvalue)
                {
                    $up_data = array('title' => $_POST['title'][$deskey], 'description' => $_POST['description'][$deskey],'icon' => $_POST['icon'][$deskey], 'user_id' => $user_id);
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


            //delete all previous records
            ArchitectTrustedVendors::deleteAll('architects_id = '.$id);
            //populate product_vendors table with vendors selected
            if(isset($_POST['architect_vendors_id'])) {
                $a_PRMid=1;$PRM = ArchitectTrustedVendors::find()->orderBy('id DESC')->one();if($PRM){$a_PRMid=$PRM->id+1;}
                foreach ($_POST['architect_vendors_id'] as $mykey => $myvalue)
                {
                    $pro_vend_obj               = new ArchitectTrustedVendors();
                    $pro_vend_obj->vendors_id   = $myvalue;
                    $pro_vend_obj->architects_id= $id;
                    $pro_vend_obj->id           = $a_PRMid;
                    $pro_vend_obj->save();
                    unset($pro_vend_obj);
                    $a_PRMid++;
                }
            }
        }
        if ( $profilemodel->load(Yii::$app->request->post()) && $profilemodel->save(false) ) {

        }
        if ( $model->load(Yii::$app->request->post() ) && $model->save(false))
        {
            return $this->redirect(['view', 'id' => $id, 'user_id' => $user_id]);
        }
        else {
            $ArchitectTeammodel     = UserTeam::find()->where(['user_id' => $user_id])->all();
            $ArchitectInfomodel     = UserInfo::find()->where(['user_id' => $user_id])->all();
            $VendorAddressmodel     = UserAddresses::find()->where(['user_id' => $user_id])->all();
            $VendorPhoneNumbersmodel= UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();

            //for Vendor selection
            $Vendormodel             = User::find()->innerJoinWith('vendors')->all();
            $ArchitectTrustedVendors = ArchitectTrustedVendors::find()->where(['architects_id' => $id])->all();
            $vend_row                = array();
            $vend_selection          = array();
            foreach($Vendormodel as $row)
            {
                $vend_row[$row->relatedRecords['vendors']['0']->id]=$row->username;
            }
            foreach($ArchitectTrustedVendors as $row)
            {
                $vend_selection[]=$row->vendors_id;
            }
            //

            return $this->render('update', [
                'architect_id'           => $id,
                'model'                  => $model,
                'vend_row'               => $vend_row,
                'profilemodel'           => $profilemodel,
                'vend_selection'         => $vend_selection,
                'logouploadmodel'        => $logouploadmodel,
                'coveruploadmodel'       => $coveruploadmodel,
                'ArchitectTeammodel'     => $ArchitectTeammodel,
                'ArchitectInfomodel'     => $ArchitectInfomodel,
                'VendorAddressmodel'     => $VendorAddressmodel,
                'catalogueuploadmodel'   => $catalogueuploadmodel,
                'dealerlistuploadmodel'  => $dealerlistuploadmodel,
                'VendorPhoneNumbersmodel'=> $VendorPhoneNumbersmodel,
            ]);
        }
    }


    public function resize_image($file, $w, $h, $crop=FALSE,$thumb=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop ) {
            /*if ($height>=$h && $width>=$w) {
                if ($width > $height) {
                    if(ceil($width-($width*abs($r-$w/$h)))<=$width)
                    {
                        $width = ceil($width-($width*abs($r-$w/$h)));
                    }
                } else {
                    if(ceil($height-($height*abs($r-$w/$h)))<=$height)
                    {
                        $height = ceil($height-($height*abs($r-$w/$h)));
                    }
                }
            }
        */
            $newwidth = $w;
            $newheight = $h;
        } else {
            if ($w/$h > $r) {
                $newwidth = $h*$r;
                $newheight = $h;
            } else {
                $newheight = $w/$r;
                $newwidth = $w;
            }
        }
        if(pathinfo($file, PATHINFO_EXTENSION)=='jpg' || pathinfo($file, PATHINFO_EXTENSION)=='jpeg')
        {
            $src = imagecreatefromjpeg($file);
            $dst = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            $newfile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME)."_".$thumb.".".pathinfo($file, PATHINFO_EXTENSION);
            if($thumb)
            {
                imagejpeg($dst,$newfile );
            }
            else{
                imagejpeg($dst, $file);
            }
        }
        elseif(pathinfo($file, PATHINFO_EXTENSION)=='png'){
            $src = imagecreatefrompng($file);
            $dst = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);
            $newfile = pathinfo($file, PATHINFO_DIRNAME).'/'.pathinfo($file, PATHINFO_FILENAME)."_".$thumb.".".pathinfo($file, PATHINFO_EXTENSION);
            if($thumb)
            {
                imagepng($dst,$newfile );
            }
            else{
                imagepng($dst, $file);
            }
        }


        //return $dst;
    }

    /**
     * Deletes an existing Architects model.
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
     * Finds the Architects model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Architects the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Architects::findone(['id' => $id, 'user_id' => $user_id])) !== null) {
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
    public function actionMemberDelete($name, $row_id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('user_team', ['id' => $row_id] )->execute();

        $directory = dirname(dirname(dirname(__DIR__))).'frontend/web/uploads/user-team' . DIRECTORY_SEPARATOR . $user_id;
        if (file_exists($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        if(file_exists($directory)) {
            $files = FileHelper::findFiles($directory);
            $output = [];
            foreach ($files as $file) {
                $fileName = basename($file);
                $path = '/uploads/user-team/' . $user_id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name' => $fileName,
                    'size' => filesize($file),
                    'url' => $path,
                    'thumbnailUrl' => $path,
                    'deleteUrl' => 'member-delete?name=' . $fileName . '&user_id=' . $user_id,
                    'deleteType' => 'POST',
                ];
            }
            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found'));
        }
    }
    public function actionInfoDelete($id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('user_info', ['id' => $id] )->execute();
            return Json::encode(array('result'=>'Info Deleted Successfuly'));

    }

    public function actionCropImage($id, $user_id, $image,$cx, $cy, $cw, $ch)
    {
        $targ_w =1136; $targ_h = 388;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/architects/' . $id ;
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
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/architects/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('cover');
        if ($oldfile->getAttribute('cover') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('cover'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('cover'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/architects/'. $id .'/'.$new_name));
    }
    public function actionCropLogo($id, $user_id, $image,$lx, $ly, $lw, $lh)
    {
        $targ_w =124; $targ_h = 124;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/architects/' . $id ;
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
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/architects/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('logo');
        if ($oldfile->getAttribute('logo') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('logo'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('logo'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/architects/'. $id .'/'.$new_name));
    }
    public function actionLogoCoverUpload ($id, $user_id, $fieldname)
    {
        //print_r($_FILES);
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/architects/' . $id ;
        if(!file_exists($target_file))
        {
            mkdir($target_file, 0777, true);
        }
        if($_FILES["input_file_name"]["tmp_name"] !== '') {
            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["input_file_name"]["name"]), PATHINFO_EXTENSION);
            if ( move_uploaded_file( $_FILES["input_file_name"]["tmp_name"], $target_file.'/'.$nefilename) ) {
                $responsArray = array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/architects/'. $id .'/'.$nefilename);
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
