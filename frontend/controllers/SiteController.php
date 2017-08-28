<?php
namespace frontend\controllers;

/*use yii\filters\VerbFilter;
use yii\filters\AccessControl;*/
use backend\models\Videos;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use backend\models\User;
use backend\models\Leed;
use backend\models\Leeds;
use yii\web\UploadedFile;
use yii\helpers\FileHelper;
use backend\models\Vendors;
use backend\models\UserTeam;
use backend\models\Products;
use backend\models\UserInfo;
use common\models\LoginForm;
use backend\models\Projects;
use backend\models\Countries;
use backend\models\Categories;
use backend\models\Architects;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use backend\models\UserProfiles;
use backend\models\UserCatalogue;
use backend\models\ProductRatings;
use backend\models\UserAddresses;
use yii\web\NotFoundHttpException;
use backend\models\ProductVendors;
use backend\models\ProductManufacturer;
use backend\models\ArchitecturalCategories;
use backend\models\Manufacturers;
use backend\models\ProjectPictures;
use yii\base\InvalidParamException;
use backend\models\UserCollections;
use backend\models\LeedAssignments;
use backend\models\ProductPictures;
use backend\models\ProductCatalogue;
use backend\models\UserPhoneNumbers;
use backend\models\UserTestimonials;
use yii\web\BadRequestHttpException;
use backend\models\UserShoppingList;
use backend\models\ShoppingListItems;
use backend\models\ShoppingListItemsInfo;
use backend\models\ProductCategories;
use frontend\models\ResetPasswordForm;
use backend\models\ArchitectTrustedVendors;
use frontend\models\PasswordResetRequestForm;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [

        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {
        //Caculating Products and getting its pictures.
        $featureVendors     = array();
        $count              =0;
        $homepagevendors    = Vendors::homepagevendors();
        if($homepagevendors) {
            foreach ($homepagevendors as $row) {
                $featureVendors[$count]['vendors_id'] = $row['id'];
                $featureVendors[$count]['user_id'] = $row['user_id'];
                $homepagevendorsprofile    = Vendors::homepagevendorsprofile($row['user_id']);
                if($homepagevendorsprofile) {
                    $featureVendors[$count]['profile_logo'] =  $homepagevendorsprofile['logo'];
                }
                $homepagevendorsproducts    = Vendors::homepagevendorsproducts($row['id']);
                if($homepagevendorsproducts) {
                    $featureVendors[$count]['products'] = array('products_id'=>$homepagevendorsproducts['products_id'],'products_pictures'=>array());
                    $homepageVendorsProductsPictures    = Vendors::homepagevendorsproductspictures($homepagevendorsproducts['products_id']);
                    if($homepageVendorsProductsPictures) {
                        $count2=0;
                        foreach ($homepageVendorsProductsPictures as $prd_pic) {
                            $featureVendors[$count]['products']['products_pictures'][$count2] = $prd_pic['file'];
                            $count2++;
                        }
                    }
                }
                $count++;
            }
        }

        //Caculating Architects and getting its pictures.
        $featureArchetics     = array();
        $count                = 0;
        $homepagearchitects     = Architects::homepagearchetics();
        if($homepagearchitects) {
            foreach ($homepagearchitects as $row) {
                $featureArchetics[$count]['archetics_id'] = $row['id'];
                $featureArchetics[$count]['user_id'] = $row['user_id'];
                $homepagevendorsprofile    = Architects::homepagearcheticprofile($row['user_id']);
                if($homepagevendorsprofile) {
                    $featureArchetics[$count]['profile_logo']       =  $homepagevendorsprofile['logo'];
                    $featureArchetics[$count]['profile_fullname']   =  $homepagevendorsprofile['full_name'];
                    $featureArchetics[$count]['profile_city']       =  $homepagevendorsprofile['city'];
                    $featureArchetics[$count]['profile_country']    =  $homepagevendorsprofile['country'];
                }
                $homepagearchetictsprojects    = Architects::homepagearchetictsprojects($row['user_id']);
                if($homepagearchetictsprojects) {
                    $featureArchetics[$count]['projects'] = array('projects_id'=>$homepagearchetictsprojects['id'],'projects_pictures'=>array());
                    $homepagearchitectsprojectspictures    = Architects::homepagearchitectsprojectspictures($homepagearchetictsprojects['id']);
                    if($homepagearchitectsprojectspictures) {
                        $count2=0;
                        foreach ($homepagearchitectsprojectspictures as $prj_pic) {
                            $featureArchetics[$count]['projects']['projects_pictures'][$count2] = $prj_pic['file'];
                            $count2++;
                        }
                    }
                }
                $count++;
            }
        }
        $recommendedProducts     = Products::find()->where('is_recommended =1')->with(['productPictures'])->all();

        //echo "<pre>";print_r($featureArchetics);exit;
        $this->layout   ='main-slider';
        return $this->render('index', [
            'featureVendors'     => $featureVendors,
            'featureArchetics'   => $featureArchetics,
            'recommendedProducts'=> $recommendedProducts,
        ]);
    }
    public function actionHowItWorks()
    {
        return $this->render('how-it-works');
    }
    public function actionHireArchitect()
    {
        $this->layout       ='main-ws';
        return $this->render('hire-architect');
    }
    public function actionHireArchitectContact()
    {
        $okMessage = 'Thank you, We will get back to you soon!';
        $lead_obj                = new Leeds();
        if (isset($_POST['user_phone']) && isset($_POST['user_fullname']) && isset($_POST['user_email'])) {
            $user_email =  User::find()->where(['email'=>$_POST['user_email']])->one();
            $user_phone =  User::find()->where(['email'=>$_POST['user_phone']])->one();
            if($user_email)
            {
                $user_id = $user_email->id;
            }
            elseif ($user_phone)
            {
                $user_id = $user_phone->id;
            }
            else{
                $user_data = array(
                    'username'     => explode('@',$_POST['user_email'])[0].rand(200,2000),
                    'phone'        => $_POST['user_phone'],
                    'email'        => $_POST['user_email'],
                    'user_type'    => 'normal',
                    'auth_key'     => 'RLt5nga0MR7CMAZKBHxa7FoyIZOKL2SO',
                    'password_hash'=> '$2y$13$3iCj.cwEKX5eNzrP3nt2z.AFurQl9oBqOFBJwvHIotRH4B4uKywRy',
                    'status'       => '10',
                    'created_at'   => strtotime(date('Y-m-d H:i:s')),
                    'updated_at'   => strtotime(date('Y-m-d H:i:s')),
                );
                Yii::$app->db->createCommand()->insert('user',  $user_data)->execute();

                $user_id=1;
                $user_prm = User::find()->orderBy('id DESC')->one();
                if($user_prm)
                {
                    $user_id=$user_prm->id;
                }
                $prmid=1;
                $prm = UserProfiles::find()->orderBy('id DESC')->one();
                if($prm)
                {
                    $prmid=$prm->id+1;
                }
                Yii::$app->db->createCommand()->insert('user_profiles', [
                    'id'            => $prmid,
                    'user_id'       => $user_id,
                    'full_name'     => $_POST['user_fullname'],
                    'city'          => $_POST['location'],
                    'profile_type'  => 'Type 1',
                    'status'        => '10',
                    'city'          => $_POST['location'],
                    'date_created'  => date('Y-m-d H:i:s')
                ])->execute();
            }
        }
        $leeadid=1;
        $led = Leeds::find()->orderBy('id DESC')->one();
        if($led)
        {
            $leeadid=$led->id+1;
        }
        $lead_data = array(
            'location'                 => $_POST['location'],
            'size'                     => $_POST['plot_area'],
            'building_size'            => $_POST['building_size'],
            'service_required'         => $_POST['service_required'],
            'finish_type'              => $_POST['finishing_type'],
            'construction_priority'    => $_POST['start_time'],
            'construction_type'        => $_POST['hire_type'],
            'lead_type'                => 'Hire Architect',
            'project_type'             => 'Hire Architect',
            'interior_design_required' => $_POST['interior_design'],
            'user_id'                  => $user_id,
            'id'                       => $leeadid,
            'status'                   => '1',
            'date_created'             => date('Y-m-d H:i:s'),
        );
        Yii::$app->db->createCommand()->insert('leeds',  $lead_data)->execute();

        $responseArray = array('type' => 'success', 'message' => $okMessage, 'timestamp' => strtotime(date('Y-m-d H:i:s')));

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $encoded = json_encode($responseArray);
            return $encoded;
        }
        else {
            return $responseArray['message'];
        }
    }

    /* need contractor function goes here*/
    public function actionNeedContractor()
    {
        $this->layout       ='main-ws';
        return $this->render('need-contractor');
    }
    public function actionNeedContractorContact()
    {
        $okMessage = 'Thank you, We will get back to you soon!';
        $lead_obj                = new Leeds();
        if (isset($_POST['user_phone']) && isset($_POST['user_fullname']) && isset($_POST['user_email'])) {
            $user_email =  User::find()->where(['email'=>$_POST['user_email']])->one();
            $user_phone =  User::find()->where(['email'=>$_POST['user_phone']])->one();
            if($user_email)
            {
                $user_id = $user_email->id;
            }
            elseif ($user_phone)
            {
                $user_id = $user_phone->id;
            }
            else{
                $user_data = array(
                    'username'     => explode('@',$_POST['user_email'])[0].rand(200,2000),
                    'phone'        => $_POST['user_phone'],
                    'email'        => $_POST['user_email'],
                    'user_type'    => 'normal',
                    'auth_key'     => 'RLt5nga0MR7CMAZKBHxa7FoyIZOKL2SO',
                    'password_hash'=> '$2y$13$3iCj.cwEKX5eNzrP3nt2z.AFurQl9oBqOFBJwvHIotRH4B4uKywRy',
                    'status'       => '10',
                    'created_at'   => time(),
                    'updated_at'   => time(),
                );
                Yii::$app->db->createCommand()->insert('user',  $user_data)->execute();

                $user_id=1;
                $user_prm = User::find()->orderBy('id DESC')->one();
                if($user_prm)
                {
                    $user_id=$user_prm->id;
                }
                $prmid=1;
                $prm = UserProfiles::find()->orderBy('id DESC')->one();
                if($prm)
                {
                    $prmid=$prm->id+1;
                }
                Yii::$app->db->createCommand()->insert('user_profiles', [
                    'id'            => $prmid,
                    'user_id'       => $user_id,
                    'full_name'     => $_POST['user_fullname'],
                    'city'          => $_POST['location'],
                    'profile_type'  => 'Type 1',
                    'status'        => '10',
                    'city'          => $_POST['location'],
                    'date_created'  => date('Y-m-d H:i:s')
                ])->execute();
            }
        }
        $leeadid=1;
        $led = Leeds::find()->orderBy('id DESC')->one();
        if($led)
        {
            $leeadid=$led->id+1;
        }
        $lead_data = array(
            'location'                 => $_POST['location'],
            'size'                     => $_POST['plot_area'],
            'building_size'            => $_POST['building_size'],
            'service_required'         => $_POST['services_hiring'],
            'finish_type'              => $_POST['finishing_type'],
            'construction_priority'    => $_POST['start_time'],
            'construction_type'        => $_POST['hire_type'],
            'lead_type'                => 'Need Contractor',
            'project_type'             => $_POST['project_type'],
            'interior_design_required' => $_POST['drawings'],
            'user_id'                  => $user_id,
            'id'                       => $leeadid,
            'status'                   => '1',
            'date_created'             => strtotime(date('Y-m-d H:i:s')),
        );
        Yii::$app->db->createCommand()->insert('leeds',  $lead_data)->execute();

        $responseArray = array('type' => 'success', 'message' => $okMessage);

        if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
            $encoded = json_encode($responseArray);
            return $encoded;
        }
        else {
            return $responseArray['message'];
        }
    }

    public function actionVendorsContact()
    {
        echo "VendorsContact here";
    }
    public function beforeAction($action) {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }
    public function actionVendorProfile($id, $user_id)
    {
        $vendormodel             = $this->findvendorModel($id, $user_id);
        $model                   = $this->findUserModel($user_id);
        $profilemodel            = $this->findprofileModel($user_id);
        $VendorTeammodel         = UserTeam::find()->where(['user_id' => $user_id])->all();
        $VendorCataloguemodel    = UserCatalogue::find()->where(['user_id' => $user_id])->all();
        $VendorInfomodel         = UserInfo::find()->where(['user_id' => $user_id])->all();
        $VendorAddressmodel      = UserAddresses::find()->where(['user_id' => $user_id])->all();
        $VendorPhoneNumbersmodel = UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
        $UserTestimonialsmodel   = UserTestimonials::find()->where(['user_id' => $user_id])->with('userFrom')->all();
        $UserVideosmodel         = Videos::find()->where(['related_to' => 'vendors', 'related_id'=>$id])->all();
        $VendorProductmodel      = Products::find()->innerJoinWith('productVendors')->where(['vendors_id' => $id])->with(['productPictures','productCatalogue','productBrand'])->all();
        $eray = "0";
        if($VendorProductmodel)
        {
            foreach ($VendorProductmodel as $row)
            {
                $eray .=",".$row->manufacturers_id;
            }
        }
        $Vendormanufacturer     = User::find()->innerJoinWith('manufacturers')->where('user_id IN('.$eray.')')->with('userProfiles')->all();
        $VendorCollectionmodel   = UserCollections::find()->where(['user_id' => $user_id])->with('userCollectionsPictures')->all();

        //echo "<pre>";print_r($Vendormanufacturer);exit;

        return $this->render('vendorprofile', [
            'vendor_id'              => $id,
            'vendormodel'            => $vendormodel,
            'model'                  => $model,
            'profilemodel'           => $profilemodel,
            'VendorTeammodel'        => $VendorTeammodel,
            'VendorInfomodel'        => $VendorInfomodel,
            'UserVideosmodel'        => $UserVideosmodel,
            'VendorProductmodel'     => $VendorProductmodel,
            'Vendormanufacturer'     => $Vendormanufacturer,
            'VendorAddressmodel'     => $VendorAddressmodel,
            'VendorCataloguemodel'   => $VendorCataloguemodel,
            'UserTestimonialsmodel'  => $UserTestimonialsmodel,
            'VendorCollectionmodel'  => $VendorCollectionmodel,
            'VendorPhoneNumbersmodel'=> $VendorPhoneNumbersmodel,
        ]);
    }


    public function actionVendorDashboard($id, $user_id)
    {
        $model                 = $this->findUserModel($user_id);
        $profilemodel          = $this->findprofileModel($user_id);
        $ArchitectTeammodel    = UserTeam::find()->where(['user_id' => $user_id])->all();
        $ArchitectInfomodel    = UserInfo::find()->where(['user_id' => $user_id])->all();
        $Countries             = Countries::find()->all();
        $Categories            = Categories::find()->where(['parent'=>0, 'sub_parent'=>0])->all();
        $ProjectPicturesmodel  = new ProjectPictures;
        $LeedAssignments       = LeedAssignments::find()->where(['leeds_user_id' => $user_id])->with('leeds')->all();
        $VendorProductmodel      = Products::find()->innerJoinWith('productVendors')->where(['vendors_id' => $id])->with('productPictures')->all();


        $VendorTeammodel         = UserTeam::find()->where(['user_id' => $user_id])->all();
        $VendorInfomodel         = UserInfo::find()->where(['user_id' => $user_id])->all();

        $VendorAddressmodel      = UserAddresses::find()->where(['user_id' => $user_id])->all();
        $VendorPhoneNumbersmodel = UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
        $ShoppingListItems= ShoppingListItems::find()->where(['user_shopping_list_user_id'=> Yii::$app->user->identity->id])->with(['user','products'])->all();

        return $this->render('vendordashboard', [
            'vendor_id'                 => $id,
            'model'                     => $model,
            'Countries'                 => $Countries,
            'Categories'                => $Categories,
            'profilemodel'              => $profilemodel,
            'LeedAssignments'           => $LeedAssignments,
            'ArchitectTeammodel'        => $ArchitectTeammodel,
            'ArchitectInfomodel'        => $ArchitectInfomodel,
            'ProjectPicturesmodel'      => $ProjectPicturesmodel,
            'VendorProductmodel'        => $VendorProductmodel,
            'VendorTeammodel'           => $VendorTeammodel,
            'VendorInfomodel'           => $VendorInfomodel,
            'VendorAddressmodel'        => $VendorAddressmodel,
            'VendorPhoneNumbersmodel'   => $VendorPhoneNumbersmodel,
            'ShoppingListItems'         => $ShoppingListItems,
        ]);
    }

    public function actionCategory($id)
    {
        if (($model = Categories::findone([ 'id' => $id])) !== null) {
            $model= $model;
        } else {
            throw new NotFoundHttpException('The requested Category not exist.');
        }
        $SubCategories         = Categories::find()->where(['parent'=>$id])->all();

        //Caculating product with current category and getting its manufacturers
        $ProductCategories     = ProductCategories::find()->where(['categories_id'=>$id])->all();
        $PC_id_arr             ="0";
        $PC_product_id_arr     ="0";
        if($ProductCategories) {
            foreach ($ProductCategories as $row) {
                $PC_id_arr .= ',' . $row->id;
                $PC_product_id_arr .= ',' . $row->products_id;
            }
        }
        $ProductManuf           = Products::find()->where('product_categories_id IN('.$PC_id_arr.')')->with(['productPictures','productManufacturerprofile'])->all();
        $ProductVendors         = ProductVendors::find()->where('products_id IN('.$PC_product_id_arr.')')->all();
        $PV_vendor_id_arr='0';
        if($ProductVendors) {
            foreach ($ProductVendors as $row) {
                $PV_vendor_id_arr .= ',' . $row->vendors_id;
            }
        }
        $catVendors         = Vendors::find()->where('id IN('.$PV_vendor_id_arr.')')->with('userProfiles')->all();

        $P_manuf_id_arr ="0";
        /*if($ProductManuf) {
            foreach ($ProductManuf as $row) {
                $P_manuf_id_arr.= ',' . $row->manufacturers_id;
            }
        }
        $manufacturers           = UserProfiles::find()->where('user_id IN('.$P_manuf_id_arr.')')->all();*/
        //echo "<pre>";print_r($catVendors);exit;

        return $this->render('category', [
            'model'            => $model,
            'Cat_products'     => $ProductManuf,
            'SubCategories'    => $SubCategories,
            'catVendors'       => $catVendors,
        ]);
    }
    public function actionManufacturerProfile($id, $user_id)
    {
        $model                         = $this->findUserModel($user_id);
        $vendormodel                   = $this->findmanufacturerModel($id, $user_id);
        $profilemodel                  = $this->findprofileModel($user_id);
        $ManufacturerCataloguemodel    = UserCatalogue::find()->where(['user_id' => $user_id])->all();
        $ManufacturerInfomodel         = UserInfo::find()->where(['user_id' => $user_id])->all();
        $ManufacturerAddressmodel      = UserAddresses::find()->where(['user_id' => $user_id])->all();
        $ManufacturerPhoneNumbersmodel = UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
        $UserTestimonialsmodel         = UserTestimonials::find()->where(['user_id' => $user_id])->with('userFrom')->all();
        $ManufacturerProductmodel      = Products::find()->where(['manufacturers_id' => $user_id])->with(['productPictures','productCatalogue'])->all();
        $ManufacturerCollectionmodel   = UserCollections::find()->where(['user_id' => $user_id])->with('userCollectionsPictures')->all();
        $UserVideosmodel               = Videos::find()->where(['related_to' => 'manufacturers', 'related_id'=>$id])->all();

        //echo "<pre>";print_r($ManufacturerProductmodel);exit;

        return $this->render('manufacturerprofile', [
            'model'                        => $model,
            'profilemodel'                 => $profilemodel,
            'manufacturer_id'              => $id,
            'ManufacturerInfomodel'        => $ManufacturerInfomodel,
            'UserTestimonialsmodel'        => $UserTestimonialsmodel,
            'ManufacturerAddressmodel'     => $ManufacturerAddressmodel,
            'ManufacturerProductmodel'     => $ManufacturerProductmodel,
            'ManufacturerCataloguemodel'   => $ManufacturerCataloguemodel,
            'ManufacturerCollectionmodel'  => $ManufacturerCollectionmodel,
            'ManufacturerPhoneNumbersmodel'=> $ManufacturerPhoneNumbersmodel,
            'UserVideosmodel'              => $UserVideosmodel,
        ]);
    }
    public function actionUpdateQuantity($changing, $shopping_list_items_id){
        $new_quantity=1;
        $shoping_list = ShoppingListItems::find()->where(['id'=>$shopping_list_items_id])->one();
        if($changing=='up')
        {
            $new_quantity = $shoping_list->quantity+1;
        }
        else{
            if($shoping_list->quantity>1)
            {
                $new_quantity = $shoping_list->quantity-1;
            }
        }
        $shoping_list->quantity=$new_quantity;
        $shoping_list->save();
        return Json::encode(array('result'=>'updated', 'new_quantity'=>$new_quantity));
    }
    public function actionChangeShopingList($shopping_list_id){
        $model= UserShoppingList::find()->where('id!='>$shopping_list_id.' AND user_id='.Yii::$app->user->identity->id)->all();
        foreach ($model as $list)
        {
            $list->is_current=0;
            $list->save();
        }
        $shoping_list = UserShoppingList::find()->where(['id'=>$shopping_list_id, 'user_id'=>Yii::$app->user->identity->id])->one();
        $shoping_list->is_current=1;
        $shoping_list->save();
        return Json::encode(array('result'=>'Current List Changed'));
    }
    public function actionRemoveShoppingListItems($shopping_list_items_id){
        $shoping_list = ShoppingListItems::find()->where(['id'=>$shopping_list_items_id])->one();
        $shoping_list->delete();
        return Json::encode(array('result'=>'Deleted'));
    }
    public function actionCustomerDashboard($user_id)
    {
        $model                  = $this->findUserModel($user_id);
        $profilemodel           = $this->findprofileModel($user_id);
        $Countries              = Countries::find()->all();
        $Categories             = Categories::find()->where(['parent'=>0, 'sub_parent'=>0])->all();
        $LeedAssignments        = Leeds::find()->where(['user_id' => $user_id])->all();

        return $this->render('customerdashboard', [
            'model'                 => $model,
            'profilemodel'          => $profilemodel,
            'LeedAssignments'       => $LeedAssignments,
            'Countries'             => $Countries,
            'Categories'            => $Categories,
        ]);
    }
    public function actionProjectImageUpload($prod_id=null)
    {
        $prj = Projects::find()->where('id='.$prod_id)->one();
        if($prj)
        {
        }
        else{
            $insert_array = array(  'id'                => $prod_id,
                                    'status'            => '00',
                                    'user_id'           => Yii::$app->user->identity->id,
                                    'date_created' => date('Y-m-d H:i:s'));
            if(Yii::$app->user->identity->user_type=='vendor')
            {
                $vendormodel=Vendors::findOne(['user_id' => Yii::$app->user->identity->id]);
                $insert_array['user_vendors_id']=$vendormodel->id;
            }
            else{
                $architectmodel=Architects::findOne(['user_id' => Yii::$app->user->identity->id]);
                $insert_array['user_vendors_id1']=$architectmodel->id;
            }
            Yii::$app->db->createCommand()->insert('projects',$insert_array)->execute();
        }
        $model = new ProjectPictures();
        $imageFile = UploadedFile::getInstance($model, 'file');
        $directory = Yii::getAlias('@frontend/web/uploads/projects-images') . DIRECTORY_SEPARATOR . $prod_id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '../../frontend/web/uploads/projects-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $this->resize_image($filePath, 494, 336, 1, '494-336');//for vendor profile top big image
                $this->resize_image($filePath, 436, 384, 1, '436-384');//for vendor profile bottom two images
                Yii::$app->db->createCommand()->insert('project_pictures',
                    [
                        'file' => $fileName,
                        'projects_id' => $prod_id,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s')
                    ])->execute();
                $insert_id = Yii::$app->db->getLastInsertID();
                return Json::encode([
                    'files' => [
                        [
                            'name'          => $fileName,
                            'id'            => $insert_id,
                            'size'          => $imageFile->size,
                            'url'           => $path,
                            'thumbnailUrl'  => $path,
                            'deleteUrl'     => '?r=site/project-image-delete&name=' . $fileName.'&prod_id='.$prod_id,
                            'deleteType'    => 'POST',
                        ],
                    ],
                ]);
            }
        }
        return '';
    }

    public function resize_image($file, $w, $h, $crop=FALSE,$thumb=FALSE) {
        list($width, $height) = getimagesize($file);
        $r = $width / $height;
        if ($crop ) {
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
    }
    public function actionProjectImageDelete($name, $prod_id)
    {
        Yii::$app->db->createCommand()->delete('project_pictures', ['file' => $name, 'projects_id' => $prod_id] )->execute();
        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/projects-images' . DIRECTORY_SEPARATOR . $prod_id;
        $thunb_494_336 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_494-336.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_436_384 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_436-384.".pathinfo($name, PATHINFO_EXTENSION);

        if (file_exists($thunb_494_336)){
            unlink($thunb_494_336);
        }
        if (file_exists($thunb_436_384)){
            unlink($thunb_436_384);
        }
        if (file_exists($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        if(file_exists($directory)) {
            $files  = FileHelper::findFiles($directory);
            $output = [];
            foreach ($files as $file) {
                $fileName = basename($file);
                $path = '/uploads/projects-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name'          => $fileName,
                    'size'          => filesize($file),
                    'url'           => $path,
                    'thumbnailUrl'  => $path,
                    'deleteUrl'     => 'project-image-delete?name=' . $fileName . '&prod_id=' . $prod_id,
                    'deleteType'    => 'POST',
                ];
            }
            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found', 'directory'=>$directory));
        }
    }
    public function actionDeleteProject()
    {
        $result_array = array();
        Yii::$app->db->createCommand()->delete('project_pictures', ['projects_id'=>$_POST['project_id']] )->execute();
        Yii::$app->db->createCommand()->delete('projects', ['id'=>$_POST['project_id']] )->execute();
        $result_array['result'] = 'Deleted Successfully';
        $dir = dirname(dirname(__DIR__)).'/frontend/web/uploads/projects-images/'. $_POST['project_id'];
        $this->deleteDirectory($dir);
        return Json::encode($result_array);
    }
    public function actionCreateNewProject()
    {
        $result_array = array();
        $prjid=1;
        $prj = Projects::find()->orderBy('id DESC')->one();
        if($prj)
        {
            $prjid=$prj->id+1;
        }
        $result_array['result'] = 'New project id created Successfully';
        $result_array['project_id'] = $prjid;
        return Json::encode($result_array);
    }

    public function deleteDirectory($dir) {
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
    public function actionEditProject()
    {
        $result_array= array();
        $prj = Projects::find()->where(['id'=>$_POST['project_id']])->one();
        $result_array['result']='project not found';
        if($prj)
        {
            unset($result_array['result']);
            $result_array['result']         ='project found';
            $result_array['title']          =$prj->title;
            $result_array['category']       =$prj->category;
            $result_array['keywords']       =$prj->keywords;
            $result_array['starting_year']  =$prj->starting_year;
            $result_array['ending_year']    =$prj->ending_year;
            $result_array['country']        =$prj->country;
            $result_array['city']           =$prj->city;

            $prj_img                        = ProjectPictures::find()->where(['projects_id'=>$_POST['project_id']])->all();
            $result_array['proj_img']       ='images not found';
            if($prj_img) {
                unset($result_array['proj_img']);
                $count =0;
                foreach($prj_img as $img)
                {
                    $filepath = dirname(dirname(__DIR__)).'/frontend/web/uploads/projects-images/'.$_POST['project_id'].'/'.$img->file;
                    if($img->file !="" && file_exists($filepath)){ $image_size =  number_format( filesize($filepath)/1024, 2 ); }else { $image_size = '';}
                    //$result_array['proj_img'][$img->id]=$img->file;
                    $result_array['proj_img'][$count]['ID']         =$img->id;
                    $result_array['proj_img'][$count]['image_size'] =$image_size;
                    $result_array['proj_img'][$count]['file']       =$img->file;
                    $result_array['proj_img'][$count]['description']=$img->description;
                    $count++;
                }
            }

        }
        return Json::encode($result_array);
    }
    public function actionListadd()
    {
        $product_mockup='';
        $cnt=0;
        $list_item_quantity='no';
        $message='';
        if(Yii::$app->user->isGuest || Yii::$app->user->identity->user_type!='normal')
        {
            return Json::encode(array('result'=>'error', 'message'=>'Login as Customer first'));
        }
        else
        {
            $prj = UserShoppingList::find()->where(['user_id' => Yii::$app->user->identity->id, 'is_current'=>1])->one();
            if ($prj) {
                $usl_id = $prj->id;
            } else {
                $usl_id = 1;       $prm = UserShoppingList::find()->orderBy('id DESC')->one();if ($prm) {$usl_id = $prm->id + 1;}
                $model                  = new UserShoppingList();
                $model->id              = $usl_id;
                $model->name            = 'My Shopping List';
                $model->status          = '0';
                $model->user_id         = Yii::$app->user->identity->id;
                $model->date_created    = date('Y-m-d H:i:s');
                $model->is_current      = '1';
                $model->save();
                unset($model);
            }

            //check if all items are are assigned than do not allow to add more items in this list, as it will change its status back to partially processed
            $ShoppingListItems          = ShoppingListItems::find()->where(['user_shopping_list_id' => $usl_id])->count();
            $processedShoppingListItems = ShoppingListItems::find()->where('user_shopping_list_id='. $usl_id.' AND assigned_user_id!=0')->count();
            if($ShoppingListItems!=0 && $prj->status==1/* && $ShoppingListItems==$processedShoppingListItems*/) {
                return Json::encode(array('result'=>'error', 'message'=>"This list is Already processed. You can't add more itms in it"));
            }
            else
            {
                $result ="success";
                //insert porduct into shoping list item
                $model = ShoppingListItems::find()->where(['products_id' => $_POST['product_id'], 'user_shopping_list_id' => $usl_id, 'user_shopping_list_user_id' => Yii::$app->user->identity->id, 'products_product_categories_id' => $_POST['product_categories_id']])->one();
                if ($model) {
                    $model->quantity    = $model->quantity + 1;
                    $sli_id             = $model->id;
                    $model->status      = '0';
                    $model->is_processed= '0';
                    $model->save();
                    $list_item_quantity = 'yes';
                } else {
                    $sli_id = 1;
                    $prm = ShoppingListItems::find()->orderBy('id DESC')->one();
                    if ($prm) {
                        $sli_id = $prm->id + 1;
                    }
                    $model                                  = new ShoppingListItems();
                    $model->id                              = $sli_id;
                    $model->products_id                     = $_POST['product_id'];
                    $model->date_created                    = date('Y-m-d H:i:s');
                    $model->user_shopping_list_id           = $usl_id;
                    $model->user_shopping_list_user_id      = Yii::$app->user->identity->id;
                    $model->products_product_categories_id  = $_POST['product_categories_id'];
                    $model->save();
                    unset($model);
                }
                $cnt            = ShoppingListItems::find()->where(['user_shopping_list_id' => $usl_id])->count();
                $data           = array("sli_id" => $sli_id, "cnt" => $cnt + 1);
                $product_mockup = $this->renderPartial('add_product_shoping', $data, false, true);
            }
            return Json::encode(array('result' => $result, 'message'=>$message, 'usl_id' => $usl_id, 'sli_id' => $sli_id, 'cnt' => $cnt+1, 'product_mockup' => $product_mockup, 'list_item_quantity'=>$list_item_quantity));
        }
    }
    public function actionAddNewList()
    {
        if(Yii::$app->user->identity->user_type!='normal')
        {
            return Json::encode(array('result'=>'error', 'message'=>'Login as Customer first'));
        }
        else
        {
            $usl_id = 1;       $prm = UserShoppingList::find()->orderBy('id DESC')->one();if ($prm) {$usl_id = $prm->id + 1;}
            $newmodel= UserShoppingList::find()->where('id!='>$usl_id.' AND user_id='.Yii::$app->user->identity->id)->all();
            foreach ($newmodel as $list)
            {
                $list->is_current=0;
                $list->save();
            }
            //
            $model                  = new UserShoppingList();
            $model->id              = $usl_id;
            $model->name            = 'My Shopping List '.rand(20,2000);
            $model->status          = '0';
            $model->user_id         = Yii::$app->user->identity->id;
            $model->date_created    = date('Y-m-d H:i:s');
            $model->is_current      = '1';
            $model->save();
            unset($model);
            //
            return Json::encode(array('result' => 'success', 'usl_id' => $usl_id));
        }
    }
    public function actionSaveListTitleAjax()
    {
        $newmodel= UserShoppingList::find()->where(['id'=>$_POST['current_list_id']])->all();
        foreach ($newmodel as $list)
        {
            $list->name=$_POST['changed_title'];
            $list->save();
        }
        unset($newmodel);
        return Json::encode(array('result' => 'success', 'title' => $_POST['changed_title']));
    }
    public function actionSaveShoppingListAjax()
    {
        $newmodel= ShoppingListItems::find()->where(['id'=>$_POST['list_id']])->all();
        foreach ($newmodel as $list)
        {
            $username       =Products::getinfo('id', $list->user_shopping_list_user_id,'user', 'username' );
            $product_name   =Products::getinfo('id', $list->products_id,'products', 'name' );
            $listname       =Products::getinfo('id', $list->user_shopping_list_id,'user_shopping_list', 'name' );
            $link           =$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].str_replace('frontend','backend',Yii::$app->request->getBaseUrl(true)).'?r=user-shopping-list%2Fupdate&id='.$list->user_shopping_list_id.'&user_id='.$list->user_shopping_list_user_id.'';

            $body='';
            $subject = "";
            $list_feedback = "";
            if(isset($_POST['list_feedback']))//feedback
            {
                $list->if_declined_feedback=$_POST['list_feedback'];
                $body .= "Hi there,<br><p>'".$username."' have givin Declined Feadback";
                $subject = "Quotation Decline Feadback";
                $list_feedback = $_POST['list_feedback'];
            }
            else{
                $list->status=$_POST['status'];


                if($_POST['status']==3){
                    $body .= "Hi there,<br><p>'".$username."' have Saved Quotation";
                    $subject = "Saved Quotation";
                }
                elseif($_POST['status']==4)
                {
                    $body .= "Hi there,<br><p>'".$username."' have requested visit showroom ";
                    $subject = "Visit Showroom Requested";
                }
                elseif($_POST['status']==5)
                {
                    $body .= "Hi there,<br><p>'".$username."' have declined ";
                    $subject = "Quotation declined";
                }
                elseif($_POST['status']==6)
                {
                    $body .= "Hi there,<br><p>'".$username."' have placed order ";
                    $subject = "Placed order on Quotation";
                }
            }
            $body .=" on '".$product_name."' product, in '".$listname."' list. Kindly click on the link below to proceed.</p><br><p>".$list_feedback."</p><a href='" . $link . "'>Give Information</a><br>Regards! <br> Support team<br><p>If the request was not made on your behalf then kindly ignore this email.</p>";
            //mail('shoppingcart.banjaiga@gmail.com', 'notification','waiting for qoute');
            \Yii::$app->mailer->compose()
                ->setFrom([\Yii::$app->params['supportEmail'] => 'Banjaiga'])
                ->setTo('shoppingcart.banjaiga@gmail.com')
                ->setSubject($subject)
                ->setHtmlBody($body)
                ->send();
            $list->save();
        }
        unset($newmodel);
        return Json::encode(array('result' => 'success'));
    }
    public function actionUpdateQuoteStatusAjax()
    {
        $newmodel= ShoppingListItems::find()->where(['id'=>$_POST['item_id']])->all();
        foreach ($newmodel as $list)
        {
            $list->status=$_POST['status'];
            $list->save();

            $username       =Products::getinfo('id', $list->user_shopping_list_user_id,'user', 'username' );
            $product_name   =Products::getinfo('id', $list->products_id,'products', 'name' );
            $listname       =Products::getinfo('id', $list->user_shopping_list_id,'user_shopping_list', 'name' );
            $link           =$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].str_replace('frontend','backend',Yii::$app->request->getBaseUrl(true)).'?r=user-shopping-list%2Fupdate&id='.$list->user_shopping_list_id.'&user_id='.$list->user_shopping_list_user_id.'';

            $body='';
            if($_POST['status']==7){
                $body .= "Hi there,<br><p>'".$username."' have requested for getting information";
            }
            elseif($_POST['status']==2)
            {
                $body .= "Hi there,<br><p>'".$username."' have requested for Quotation ";
            }

            $body .=" on '".$product_name."' product in '".$listname."' list. Kindly click on the link below to proceed.</p><br><a href='" . $link . "'>Give Information</a><br>Regards! <br> Support team<br><p>If the request was not made on your behalf then kindly ignore this email.</p>";
            //mail('shoppingcart.banjaiga@gmail.com', 'notification','waiting for qoute');
            \Yii::$app->mailer->compose()
                ->setFrom([\Yii::$app->params['supportEmail'] => 'Banjaiga'])
                ->setTo('shoppingcart.banjaiga@gmail.com')
                ->setSubject('Shopping List Information Requested.')
                ->setHtmlBody($body)
                ->send();
        }
        unset($newmodel);
        return Json::encode(array('result' => 'success', 'status' => $_POST['status'], 'body' => $body));
    }
    public function actionSubmitMakeaRequestFormAjax()
    {
        $list= ShoppingListItemsInfo::find()->where(['shopping_list_item_id'=>$_POST['shopping_list_item_id']])->one();
        if ($list !== null) {
            //
        } else {
            $list= new ShoppingListItemsInfo();
        }
        $list->date_created             =date('Y-m-d H:i:s');
        $list->shopping_list_item_id    =$_POST['shopping_list_item_id'];
        $list->status                   ='1';
        if(isset($_POST['is_send_price_qoute']))
        {
            $list->is_send_price_qoute  =1;
        }
        if(isset($_POST['is_general_request']))
        {
            $list->is_general_request  =1;
        }
        if(isset($_POST['is_send_catalogue']))
        {
            $list->is_send_catalogue  =1;
        }
        if(isset($_POST['is_send_more_info']))
        {
            $list->is_send_more_info  =1;
        }
        if(isset($_POST['is_nearest_dealer']))
        {
            $list->is_nearest_dealer  =1;
        }
        if(isset($_POST['is_send_spec_sheet']))
        {
            $list->is_send_spec_sheet  =1;
        }
        if(isset($_POST['who_are_you']))
        {
            $list->who_are_you  =$_POST['who_are_you'];
        }

        $list->message                   =$_POST['message'];
        $list->save();
        return Json::encode(array('result' => 'success', 'status' => '1'));
    }
    public function actionClearListAjax()
    {
        $current_sl= UserShoppingList::find()->where(['user_id'=>Yii::$app->user->identity->id, 'is_current'=>'1'])->one();
        $newmodel= ShoppingListItems::find()->where(['user_shopping_list_user_id'=> Yii::$app->user->identity->id, 'user_shopping_list_id'=>$current_sl->id])->all();
        foreach ($newmodel as $list)
        {
            $list->delete();
        }
        unset($newmodel);
        return Json::encode(array('result' => 'success'));
    }
    public function actionAddReview()
    {
        $rating_id = 1;    $prm   = ProductRatings::find()->orderBy('id DESC')->one();if ($prm) {$rating_id = $prm->id + 1;}
        $model                    =  new ProductRatings();
        $model->id                =  $rating_id;
        $model->rating            =  $_POST['rating'];
        $model->status            =  '0';
        $model->buy_again         =  $_POST['buy_again'];
        $model->date_added        =  date('Y-m-d H:i:s');
        $model->products_id       =  $_POST['products_id'];
        $model->seller_comu       =  $_POST['seller_comu'];
        $model->product_quality   =  $_POST['product_quality'];
        $model->ratingphonenumebr =  $_POST['ratingphonenumebr'];
        $model->save();
        unset($model);
        return Json::encode(array('result' => 'success', 'rating_id' => $rating_id));
    }

    public function actionArchitectProfile($id, $user_id)
    {
        $architectmodel          = $this->findarchitectModel($id, $user_id);
        $model                   = $this->findUserModel($user_id);
        $profilemodel            = $this->findprofileModel($user_id);
        $VendorTeammodel         = UserTeam::find()->where(['user_id' => $user_id])->all();
        $VendorInfomodel         = UserInfo::find()->where(['user_id' => $user_id])->all();
        $Categories              = Categories::find()->where(['parent'=>0, 'sub_parent'=>0])->all();

        $VendorAddressmodel      = UserAddresses::find()->where(['user_id' => $user_id])->all();
        $VendorPhoneNumbersmodel = UserPhoneNumbers::find()->where(['user_id' => $user_id])->all();
        $VendorProductmodel      = Products::find()->innerJoinWith('productVendors')->where(['vendors_id' => $id])->with('productPictures')->all();

        $userProjects            = Projects::find()->where(['user_id'=>$user_id, 'status'=>1])->with('projectPictures')->all();
        $ProjectPicturesmodel    = new ProjectPictures;
        $UserTestimonialsmodel   = UserTestimonials::find()->where(['user_id' => $user_id])->with('userFrom')->all();

        //for Architect trusted Vendors
        $TrustedVendorsmodel     = User::find()->innerJoinWith('vendors')->with('userProfiles')->all();
        $ArchitectTrustedVendors = ArchitectTrustedVendors::find()->where(['architects_id' => $id])->all();
        $vend_selection          = array();
        foreach($ArchitectTrustedVendors as $row)
        {
            $vend_selection[]=$row->vendors_id;
        }
        //

        return $this->render('architectprofile', [
            'vendor_id'              => $id,
            'model'                  => $model,
            'Categories'             => $Categories,
            'userProjects'           => $userProjects,
            'profilemodel'           => $profilemodel,
            'vend_selection'         => $vend_selection,
            'TrustedVendorsmodel'    => $TrustedVendorsmodel,
            'VendorTeammodel'        => $VendorTeammodel,
            'VendorInfomodel'        => $VendorInfomodel,
            'VendorProductmodel'     => $VendorProductmodel,
            'VendorAddressmodel'     => $VendorAddressmodel,
            'ProjectPicturesmodel'   => $ProjectPicturesmodel,
            'UserTestimonialsmodel'  => $UserTestimonialsmodel,
            'VendorPhoneNumbersmodel'=> $VendorPhoneNumbersmodel,
        ]);
    }
    public function actionArchitectDashboard($id, $user_id)
    {
        if(isset($_POST['new_project_id']))
        {
            $vendormodel=Vendors::findOne(['user_id' => Yii::$app->user->identity->id]);
            Yii::$app->db->createCommand()->update('projects',
                [
                    'title'             => $_POST['title'],
                    'city'           => $_POST['city'],
                    'keywords'          => $_POST['keywords'],
                    'category'          => $_POST['category'],
                    'starting_year'     => $_POST['starting_year'],
                    'ending_year'       => $_POST['ending_year'],
                    'country'           => $_POST['country'],
                    'status'            => 1,
                ], 'id = '.$_POST['new_project_id'])->execute();
            if(isset($_POST['description']))
            {
                foreach($_POST['description'] as $key=>$value)
                {
                    Yii::$app->db->createCommand()->update('project_pictures',
                        [
                            'description'             => $value,
                        ], 'id = '.$key)->execute();
                }
            }
        }
        $architectmodel        = $this->findarchitectModel($id, $user_id);
        $model                 = $this->findUserModel($user_id);
        $profilemodel          = $this->findprofileModel($user_id);
        $ArchitectTeammodel    = UserTeam::find()->where(['user_id' => $user_id])->all();
        $ArchitectInfomodel    = UserInfo::find()->where(['user_id' => $user_id])->all();
        $Countries             = Countries::find()->all();
        $Categories            = ArchitecturalCategories::find()->all();
        $userProjects          = Projects::find()->where(['user_id'=>$user_id, 'status'=>1])->with('projectPictures')->all();
        $ProjectPicturesmodel  = new ProjectPictures;
        $LeedAssignments       = LeedAssignments::find()->where(['leeds_user_id' => $user_id])->with('leeds')->all();

        return $this->render('architectdashboard', [
            'architect_id'          => $id,
            'model'                 => $model,
            'Countries'             => $Countries,
            'Categories'            => $Categories,
            'profilemodel'          => $profilemodel,
            'userProjects'          => $userProjects,
            'LeedAssignments'       => $LeedAssignments,
            'ArchitectTeammodel'    => $ArchitectTeammodel,
            'ArchitectInfomodel'    => $ArchitectInfomodel,
            'ProjectPicturesmodel'  => $ProjectPicturesmodel,
        ]);
    }
    public function actionProduct($id)
    {
        $model                  = Products::find()->where(['id' => $id])->one();
        $ProductPictures        = ProductPictures::find()->where(['products_id' => $id])->all();

        if($model){
            $product_vendors_id =$model->product_vendors_id;
            $product_categ_id   =$model->product_categories_id;
        }else{
            $product_vendors_id =0;
            $product_categ_id   =0;
        }
        $productVendors         = ProductVendors::find()->where(['id' => $product_vendors_id])->all();

        // first get all categories with pr_cat_id as Model produc
        $relatedCateg           = ProductCategories::find()->where(['id' => $product_categ_id])->all();
        $categ_array ="0";
        if($relatedCateg)
        {
            foreach($relatedCateg as $categ)
            {
                $categ_array.=",".$categ->categories_id;
            }
        }
        //now find all categories with that primary id
        $foundCateg           = ProductCategories::find()->where("categories_id IN(".$categ_array.")")->all();
        //
        $prod_array ="0";
        if($foundCateg)
        {
            foreach($foundCateg as $categ)
            {
                $prod_array.=",".$categ->products_id;
            }
        }
        $relatedProducts           = Products::find()->where("id IN(".$prod_array.") AND id!=".$id)->limit(8)->all();


        $product_vendors_ids=0;if($productVendors){foreach ($productVendors as $vend){$product_vendors_ids.=','.$vend->vendors_id;}}
        $productVendorsDetail   = Vendors::find()->where('id IN(' .$product_vendors_ids.')')->all();

        $productVendorsDetail_userids=0;if($productVendorsDetail){foreach ($productVendorsDetail as $vend){$productVendorsDetail_userids.=','.$vend->user_id;}}
        $user_info              = User::find()->where('id IN(' .$model->manufacturers_id.')')->one();
        $vendorProfile          = UserProfiles::find()->where('user_id IN(' .$productVendorsDetail_userids.')')->all();
        $manufacturerProfile    = UserProfiles::find()->where(['user_id' =>$model->manufacturers_id])->one();
        $productCategories      = ProductCategories::find()->where(['id' => $model->product_categories_id])->all();
        $cat_array              = "0";
        if($productCategories)
        {
            foreach($productCategories as $cat)
            {
                $cat_array      .= ",".$cat->categories_id;
            }
        }
        // for parent Category parent and sub_parent should be zero
        $productCatDetail        = Categories::find()->where('id IN ('.$cat_array.') AND parent=0 AND sub_parent=0 ')->one();
        $RecomendedProducts      = Products::find()->where(['is_recommended' => '1'])->all();
        $ProductCataloguemodel   = ProductCatalogue::find()->where(['product_id' => $id])->all();
        $ratingCount             = ProductRatings::find()->where(['products_id' => $id, 'status'=>'1'])->count();
        $ratingSum               = ProductRatings::find()->where(['products_id' => $id])->sum('seller_comu + product_quality + buy_again');


        return $this->render('single-product', [
            'model'                 => $model,
            'vendorInfo'            => $user_info,
            'ratingSum'             => $ratingSum/3,
            'ratingCount'           => $ratingCount,
            'vendorProfile'         => $vendorProfile,
            'relatedProducts'       => $relatedProducts,
            'ProductPictures'       => $ProductPictures,
            'productCatDetail'      => $productCatDetail,
            'RecomendedProducts'    => $RecomendedProducts,
            'manufacturerProfile'   => $manufacturerProfile,
            'ProductCataloguemodel' => $ProductCataloguemodel,
        ]);
    }
    protected function findUserModel($user_id)
    {
        if (($model = User::findone([ 'id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested user does not exist.');
        }
    }

    protected function findprofileModel($id)
    {
        if (($model = UserProfiles::findOne(['user_id' => $id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested user does not exist.');
        }
    }
    protected function findvendorModel($id, $user_id)
    {
        if ( ($model = Vendors::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested Vendor does not exist.');
        }
    }

    protected function findmanufacturerModel($id, $user_id)
    {
        if ( ($model = Manufacturers::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested Vendor does not exist.');
        }
    }
    protected function findarchitectModel($id, $user_id)
    {
        if ( ($model = Architects::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested Architect does not exist.');
        }
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            //echo"<pre>";print_r(Yii::$app->user);exit;
            if(Yii::$app->user->identity->user_type=='vendor' && ($vendormodel=Vendors::findOne(['user_id' => Yii::$app->user->identity->id])) !== null)
            {
                return $this->redirect(['vendor-dashboard', 'id' => $vendormodel->id, 'user_id' => Yii::$app->user->identity->id]);
            }
            elseif(Yii::$app->user->identity->user_type=='architect' && ($architectmodel=Architects::findOne(['user_id' => Yii::$app->user->identity->id])) !== null)
            {
                return $this->redirect(['architect-dashboard', 'id' => $architectmodel->id, 'user_id' => Yii::$app->user->identity->id]);
            }
            elseif(Yii::$app->user->identity->user_type=='normal' )
            {
                return $this->redirect(['customer-dashboard', 'user_id' => Yii::$app->user->identity->id]);
            }
            else{
                return $this->goBack();
            }
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }
        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }
        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');
            return $this->goHome();
        }
        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
