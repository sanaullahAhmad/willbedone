<?php

namespace backend\controllers;

use backend\models\UserCollections;
use backend\models\UserCollectionsPictures;
use Yii;
use yii\web\Controller;
use backend\models\Vendors;
use backend\models\User;
use backend\models\UserProfiles;
use backend\models\UserTeam;
use backend\models\UserCatalogue;
use backend\models\UserInfo;
use backend\models\UserAddresses;
use backend\models\UserPhoneNumbers;
use backend\models\ProductVendors;
use backend\models\LeedAssignments;
use backend\models\Leeds;
use backend\models\Logouploadmodel;
use backend\models\Coveruploadmodel;
use backend\models\Catalogueuploadmodel;
use backend\models\Dealerlistuploadmodel;
use app\models\VendorsSearch;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use frontend\models\SignupForm;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use yii\helpers\Json;

/**
 * VendorsController implements the CRUD actions for Vendors model.
 */
class VendorsController extends Controller
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
                        'actions' => [ 'logout', 'catalogue-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'info-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'collection-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'address-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'phone-number-delete'],
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
                    [
                        'actions' => [ 'logout', 'update-collection'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'collection-image-upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'collection-image-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'upload-regular-vendors'],
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
            /*'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logo-upload' => ['POST'],
                ],
            ],*/
        ];
    }

    /**
     * Lists all Vendors models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new VendorsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Vendors model.
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
     * Creates a new Vendors model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $prmid=1;
        $prm = UserProfiles::find()->orderBy('id DESC')->one();
        if($prm)
        {
            $prmid=$prm->id+1;
        }
        $model = new SignupForm();
        $vendor = new Vendors();
        if ($model->load(Yii::$app->request->post()) && $user =$model->signup()) {
            //update user type as vendor
            Yii::$app->db->createCommand()->update('user', ['user_type' => 'vendor' ], 'id='.$user->attributes['id'])->execute();

            //Add vendor info to user profile table
            Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $prmid, 'user_id' => $user->attributes['id'], 'date_created' => date('Y-m-d H:i:s')])->execute();


            $vendor->user_id = $user->attributes['id'];
            if($vendor->save())
            {
                $newvendor = Yii::$app->db->getLastInsertID();
            }
            return $this->redirect(['update', 'id' => $newvendor, 'user_id' => $user->attributes['id']]);

            //return $this->redirect(['index']);
        }
        else
        {
            return $this->render('signup', [
                'model' => $model,
            ]);
        }
    }
    public function actionUploadRegularVendors()
    {
        if(isset($_POST['submit-button']))
        {
            $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/user-team/';
            if($_FILES["regular_vendors_file"]["tmp_name"] !== '') {
                $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["regular_vendors_file"]["name"]), PATHINFO_EXTENSION);
                if ( move_uploaded_file( $_FILES["regular_vendors_file"]["tmp_name"], $target_file.'/'.$nefilename) ) {
                }
            }
            $inputFile = $target_file.'/'.$nefilename;
            try{
                $inputFileType = \PHPExcel_IOFactory::identify($inputFile);
                $objReader = \PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel = $objReader->load($inputFile);
            } catch (Exception $e) {
                die('Error');
            }

            $sheet = $objPHPExcel->getSheet(0);
            $highestRow = $sheet->getHighestRow();
            $highestColumn = $sheet->getHighestColumn();

            for($row=1; $row <= $highestRow; $row++)
            {
                $rowData = $sheet->rangeToArray('A'.$row.':'.$highestColumn.$row,NULL,TRUE,FALSE);

                if($row>1)
                {
                    //continue;
                    Yii::$app->db->createCommand()->insert('user', ['username' => $rowData[0][3], 'phone' => $rowData[0][4], 'user_type' => 'vendor', 'auth_key' => 'RLt5nga0MR7CMAZKBHxa7FoyIZOKL2SO', 'password_hash' => '$2y$13$3iCj.cwEKX5eNzrP3nt2z.AFurQl9oBqOFBJwvHIotRH4B4uKywRy', 'email' => $rowData[0][8], 'status' => '10', 'created_at' => date('Y-m-d H:i:s')])->execute();
                    $new_user_id = Yii::$app->db->getLastInsertID();
                    Yii::$app->db->createCommand()->insert('vendors', ['user_id' => $new_user_id,  'vendor_type' => 1])->execute();
                    Yii::$app->db->createCommand()->insert('user_profiles', ['id' => $new_user_id,  'user_id' => $new_user_id,  'address' => $rowData[0][7],  'phone' => $rowData[0][4],  'full_name' => $rowData[0][3],  'city' => $rowData[0][2], 'date_created' => date('Y-m-d H:i:s')])->execute();

                    //echo "<pre>";print_r($rowData);
                }
            }
            if (file_exists($target_file.'/'.$nefilename)){
                unlink($target_file.'/'.$nefilename);
            }
            //die('okay');
            //exit;
            \Yii::$app->getSession()->setFlash('success', 'Imported Successfully');
            return $this->redirect('?r=vendors');
        }
        return $this->render('upload-regular-vendors', [
            'model' => '',
        ]);
    }

    /**
     * Updates an existing Vendors model.
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
            $pathcover = dirname(dirname(__DIR__))."/frontend/web/uploads/vendors/".$id.'/';
            if(!file_exists($pathcover))
            {
                mkdir($pathcover, 0777, true);
            }
            $logouploadmodel->logo = UploadedFile::getInstance($logouploadmodel, 'logo');
            if ($logouploadmodel->logo && $logouploadmodel->validate()) {
                $logofile=uniqid(time(), true).   '.'   . $logouploadmodel->logo->extension;
                $logouploadmodel->logo->saveAs($pathcover . $logofile);
                Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $logofile], 'user_id = '.$user_id)->execute();
                // $this->resize_image($pathcover.$logofile, 124, 124, 1);
            }
            //


            $coveruploadmodel->cover = UploadedFile::getInstance($coveruploadmodel, 'cover');
            if ($coveruploadmodel->cover && $coveruploadmodel->validate()) {
                $coverfile=uniqid(time(), true).   '.'   . $coveruploadmodel->cover->extension;
                $coveruploadmodel->cover->saveAs($pathcover . $coverfile);
                Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $coverfile], 'user_id = '.$user_id)->execute();
                //$this->resize_image($pathcover.$coverfile, 1136, 388, 1);
            }
            //

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
                                $prd_cate = UserCatalogue::find()->where(['id'=>$deskey])->one();
                                $catalogue='';
                                if($prd_cate)
                                {
                                    $catalogue   =$prd_cate->catalogue;
                                }
                                if ($catalogue!='' && file_exists($target_file . '/' . $catalogue)) {
                                    unlink($target_file . '/' . $catalogue);
                                }
                            }
                        }
                        //for Catalogue Display image
                        if ($_FILES["catalogue_image"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["catalogue_image"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if (move_uploaded_file($_FILES["catalogue_image"]["tmp_name"][$deskey], $target_file . '/' . $nefilename)) {
                                //resize to use tumbnails
                                $filePath = $target_file . '/' . $nefilename;
                                $this->resize_image($filePath, 494, 336, 1, '494-336');//for vendor profile top big image
                                $this->resize_image($filePath, 436, 384, 1, '436-384');//for vendor profile bottom two images
                                $this->resize_image($filePath, 446, 300, 1, '446-300');//for "Most Viewed Products" in  profile page
                                $this->resize_image($filePath, 332, 250, 1, '332-250');//for "Recommended Products" in  Single Product page
                                $this->resize_image($filePath, 66, 103, 1, '66-103');//for "Related Products" in  Single Product page
                                $this->resize_image($filePath, 296, 168, 1, '296-168');//for "Other Products" in  Single Product page

                                $up_data['catalogue_image'] = $nefilename;
                                //delete old files
                                $prd_cate = UserCatalogue::find()->where(['id'=>$deskey])->one();
                                $catalogue_image='';
                                if($prd_cate)
                                {
                                    $catalogue_image    =$prd_cate->catalogue_image;
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . $catalogue_image)) {
                                    unlink($target_file . '/' . $catalogue_image);
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_66-103.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_66-103.'.pathinfo($catalogue_image, PATHINFO_EXTENSION ) );
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_296-168.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_296-168.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_436-384.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_436-384.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
                                }
                                if ($catalogue_image!='' && file_exists($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_494-336.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
                                    unlink($target_file . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_494-336.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
                                }
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
                        //for Catalogue Display image
                        if ($_FILES["catalogue_image"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["catalogue_image"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if (move_uploaded_file($_FILES["catalogue_image"]["tmp_name"][$deskey], $target_file . '/' . $nefilename)) {
                                //resize to use tumbnails
                                $filePath = $target_file . '/' . $nefilename;
                                $this->resize_image($filePath, 494, 336, 1, '494-336');//for vendor profile top big image
                                $this->resize_image($filePath, 436, 384, 1, '436-384');//for vendor profile bottom two images
                                $this->resize_image($filePath, 446, 300, 1, '446-300');//for "Most Viewed Products" in  profile page
                                $this->resize_image($filePath, 332, 250, 1, '332-250');//for "Recommended Products" in  Single Product page
                                $this->resize_image($filePath, 66, 103, 1, '66-103');//for "Related Products" in  Single Product page
                                $this->resize_image($filePath, 296, 168, 1, '296-168');//for "Other Products" in  Single Product page
                                $up_data['catalogue_image'] = $nefilename;
                            }
                        }
                        Yii::$app->db->createCommand()->insert('user_catalogue', $up_data)->execute();
                    }
                }
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
        }
        if ( $profilemodel->load(Yii::$app->request->post()) && $profilemodel->save(false) ) {

        }
        // update an existing row of data
        if ( $model->load(Yii::$app->request->post() ) && $model->save(false))
        {
            return $this->redirect(['view', 'id' => $id, 'user_id' => $user_id]);
        }
        else {
            $VendorTeammodel        = UserTeam::find()->where(['user_id' => $user_id])->all();
            $VendorCataloguemodel   = UserCatalogue::find()->where(['user_id' => $user_id])->all();
            $VendorInfomodel        = UserInfo::find()->where(['user_id' => $user_id])->all();
            $VendorCollectionmodel  = UserCollections::find()->where(['user_id' => $user_id])->all();
            $VendorAddressmodel     = UserAddresses::find()->where(['user_id' => $user_id])->all();
            $VendorPhoneNumbersmodel= UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
            return $this->render('update', [
                'vendor_id'              => $id,
                'model'                  => $model,
                'profilemodel'           => $profilemodel,
                'logouploadmodel'        => $logouploadmodel,
                'VendorTeammodel'        => $VendorTeammodel,
                'VendorInfomodel'        => $VendorInfomodel,
                'coveruploadmodel'       => $coveruploadmodel,
                'VendorAddressmodel'     => $VendorAddressmodel,
                'catalogueuploadmodel'   => $catalogueuploadmodel,
                'dealerlistuploadmodel'  => $dealerlistuploadmodel,
                'VendorCataloguemodel'   => $VendorCataloguemodel,
                'VendorCollectionmodel'  => $VendorCollectionmodel,
                'VendorPhoneNumbersmodel'=> $VendorPhoneNumbersmodel,
            ]);
        }
    }
    public function actionUpdateCollection($id)
    {
        $UserCollectionsPictures       = new UserCollectionsPictures;
        $VendorCollectionmodel         = UserCollections::find()->where(['id' => $id])->one();
        $VendorCollectionPicturemodel  = UserCollectionsPictures::find()->where(['user_collections_id' => $id])->all();
        return $this->render('update-collection', [
            'UserCollectionsPictures'      => $UserCollectionsPictures,
            'VendorCollectionmodel'        => $VendorCollectionmodel,
            'VendorCollectionPicturemodel' => $VendorCollectionPicturemodel,
        ]);
    }


    public function actionCollectionImageUpload($prod_id)
    {
        $model = new UserCollectionsPictures();
        $imageFile = UploadedFile::getInstance($model, 'file');
        $directory = Yii::getAlias('@frontend/web/uploads/collection-images') . DIRECTORY_SEPARATOR . $prod_id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $thumbName = $uid . '_484-330.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '../../frontend/web/uploads/collection-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $this->resize_image($filePath, 494, 336, 1, '494-336');//for vendor profile top big image
                $this->resize_image($filePath, 436, 384, 1, '436-384');//for vendor profile bottom two images
                Yii::$app->db->createCommand()->insert('user_collections_pictures',
                    [
                        'file' => $fileName,
                        'user_collections_id' => $prod_id,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s')
                    ])->execute();
                $new_col_id = Yii::$app->db->getLastInsertID();
                return Json::encode([
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $imageFile->size,
                            'url' => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl' => '?r=vendors/collection-image-delete&name=' . $fileName.'&prod_id='.$prod_id,
                            'deleteType' => 'POST',
                        ],
                    ],
                ]);
            }
        }
        return '';
    }
    public function actionCollectionImageDelete($name, $prod_id)
    {
        Yii::$app->db->createCommand()->delete('user_collections_pictures', ['file' => $name, 'user_collections_id' => $prod_id] )->execute();

        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/collection-images' . DIRECTORY_SEPARATOR . $prod_id;
        if (file_exists($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $thunb_494_336 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_494-336.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_436_384 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_436-384.".pathinfo($name, PATHINFO_EXTENSION);
        if (file_exists($thunb_494_336)){
            unlink($thunb_494_336);
        }
        if (file_exists($thunb_436_384)){
            unlink($thunb_436_384);
        }
        if(file_exists($directory)) {
            $files = FileHelper::findFiles($directory);
            $output = [];
            foreach ($files as $file) {
                $fileName = basename($file);
                $path = '/uploads/collection-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name' => $fileName,
                    'size' => filesize($file),
                    'url' => $path,
                    'thumbnailUrl' => $path,
                    'deleteUrl' => 'collection-image-delete?name=' . $fileName . '&prod_id=' . $prod_id,
                    'deleteType' => 'POST',
                ];
            }
            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found', 'directory'=>$directory));
        }
    }

    public function actionAddressDelete($user_id, $row_id)
    {
        Yii::$app->db->createCommand()->delete('user_addresses', ['id' => $row_id] )->execute();
        return Json::encode(array('result'=>'Address Deleted Successfuly'));
    }
    public function actionPhoneNumberDelete($user_id, $row_id)
    {
        Yii::$app->db->createCommand()->delete('user_phone_numbers', ['id' => $row_id] )->execute();
        return Json::encode(array('result'=>'Phone Number Deleted Successfuly'));
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
     * Deletes an existing Vendors model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        UserInfo::deleteAll('user_id = '.$user_id);
        UserTeam::deleteAll('user_id = '.$user_id);
        ProductVendors::deleteAll('vendors_id = '.$id);
        UserProfiles::deleteAll('user_id = '.$user_id);
        Leeds::deleteAll('user_id = '.$user_id);
        LeedAssignments::deleteAll('leeds_user_id = '.$user_id);
        $this->findModel($id, $user_id)->delete();
        User::deleteAll('id = '.$user_id);

        //remove files of this Vendor
        $dir = dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/'. $id;
        $this->deleteDirectory($dir);
        //remove files of this user team
        $dir2 = dirname(dirname(__DIR__)).'/frontend/web/uploads/user-team/'. $user_id;
        $this->deleteDirectory($dir2);

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
     * Finds the Vendors model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return Vendors the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = Vendors::findone(['id' => $id, 'user_id' => $user_id])) !== null) {
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
        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/user-team/'  . $user_id;
        if (file_exists($directory . '/' . $name)) {
            unlink($directory . '/' . $name);

            $output = [];
            $path = $directory . '/' . $name;
            $output['files'][] = [
                'name'          => $name,
                'size'          => /*filesize($name)*/1,
                'url'           => $path,
                'thumbnailUrl'  => $path,
                'deleteUrl'     => 'member-delete?name=' . $name . '&user_id=' . $user_id,
                'deleteType'    => 'POST',
            ];
            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found'));
        }
    }
    public function actionCatalogueDelete($name, $catalogue_image, $row_id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('user_catalogue', ['id' => $row_id] )->execute();
        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/user-catalogue/'  . $user_id;

        //delete display images
        if ($catalogue_image!='' && file_exists($directory . '/' . $catalogue_image)) {
            unlink($directory . '/' . $catalogue_image);
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_66-103.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_66-103.'.pathinfo($catalogue_image, PATHINFO_EXTENSION ) );
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_296-168.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_296-168.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_436-384.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_436-384.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
        }
        if ($catalogue_image!='' && file_exists($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_494-336.'.pathinfo($catalogue_image, PATHINFO_EXTENSION))) {
            unlink($directory . '/' . pathinfo($catalogue_image, PATHINFO_FILENAME).'_494-336.'.pathinfo($catalogue_image, PATHINFO_EXTENSION));
        }

        if (file_exists($directory . '/' . $name)) {
            unlink($directory . '/' . $name);

            $output = [];
            $path = $directory . '/' . $name;
            $output['files'][] = [
                'name'          => $name,
                'size'          => /*filesize($name)*/1,
                'url'           => $path,
                'thumbnailUrl'  => $path,
                'deleteUrl'     => 'member-delete?name=' . $name . '&user_id=' . $user_id,
                'deleteType'    => 'POST',
            ];

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
    public function actionCollectionDelete($id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('user_collections', ['id' => $id] )->execute();
        $dir = dirname(dirname(__DIR__)).'/frontend/web/uploads/collection-images/'. $id;
        $this->deleteDirectory($dir);
        return Json::encode(array('result'=>'Collection Deleted Successfuly'));
    }
    public function actionCropImage($id, $user_id, $image,$cx, $cy, $cw, $ch)
    {
        $targ_w =1136; $targ_h = 388;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/' . $id ;
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
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('cover');
        if ($oldfile->getAttribute('cover') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('cover'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('cover'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['cover' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/vendors/'. $id .'/'.$new_name));
    }
    public function actionCropLogo($id, $user_id, $image,$lx, $ly, $lw, $lh)
    {
        $targ_w =124; $targ_h = 124;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/' . $id ;
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
        rename($src,dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/'. $id .'/'.$new_name);

        $oldfile =  UserProfiles::findOne(['user_id' => $user_id]);
        $responsArray['oldfile']=$oldfile->getAttribute('logo');
        if ($oldfile->getAttribute('logo') !='' && file_exists($target_file . '/' . $oldfile->getAttribute('logo'))) {
            unlink($target_file . '/' . $oldfile->getAttribute('logo'));
        }

        Yii::$app->db->createCommand()->update('user_profiles', ['logo' => $new_name], 'user_id = '.$user_id)->execute();
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/vendors/'. $id .'/'.$new_name));
    }
    public function actionLogoCoverUpload ($id, $user_id, $fieldname)
    {
        //print_r($_FILES);
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/vendors/' . $id ;
        if(!file_exists($target_file))
        {
            mkdir($target_file, 0777, true);
        }
        if($_FILES["input_file_name"]["tmp_name"] !== '') {
            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["input_file_name"]["name"]), PATHINFO_EXTENSION);
            if ( move_uploaded_file( $_FILES["input_file_name"]["tmp_name"], $target_file.'/'.$nefilename) ) {
                $responsArray = array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/vendors/'. $id .'/'.$nefilename);
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
