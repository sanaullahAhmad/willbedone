<?php

namespace backend\controllers;

use backend\models\Brands;
use backend\models\Units;
use Yii;
use backend\models\Products;
use backend\models\ProductPictures;
use backend\models\Categories;
use backend\models\SubCategories;
use backend\models\ProductCategories;
use backend\models\ProductCatalogue;
use backend\models\User;
use backend\models\ProductVendors;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
/*use backend\models\Logouploadmodel;*/
use yii\helpers\FileHelper;
use yii\web\UploadedFile;
use yii\helpers\Json;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
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
                        'actions' => ['logout', 'image-upload'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'image-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'ajax-subcategory-list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'ajax-sub-subcategory-list'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'catalogue-delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'update-image'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => [ 'logout', 'crop-image'],
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
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @param integer $product_categories_id
     * @return mixed
     */
    public function actionView($id, $product_categories_id)
    {
        //$this->layout = 'main-layout';
        return $this->render('view', [
            'model' => $this->findModel($id, $product_categories_id),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $products = Yii::$app->request->post();
        //echo "<pre>";print_r($products['Products']['product_categories_id']);exit;
        $model = new Products();
        $model->date_created= date("Y-m-d H:i:s");
        if($products)
        {
            $model->name= $products['Products']['name'];
            $model->sku= $products['Products']['sku'];
            $model->status= $products['Products']['status'];
        }
        //assign a new id by getting highest id
        $PRMid=1;
        $PRM = ProductCategories::find()->orderBy('id DESC')->one();
        if($PRM)
        {
            $PRMid=$PRM->id+1;
        }
        $model->product_categories_id = $PRMid;
        $model->product_vendors_id = $PRMid;
        if ($products && $model->save()) {/*$model->load(Yii::$app->request->post()) && */
            $newProduct = Yii::$app->db->getLastInsertID();
            //populate product_categories table with categories selected
            foreach($products['Products']['product_categories_id'] as $mykey=>$myvalue)
            {
                $pro_cat_obj                = new ProductCategories();
                $pro_cat_obj->categories_id = $myvalue;
                $pro_cat_obj->products_id   = $newProduct;
                $pro_cat_obj->id            = $PRMid;
                $pro_cat_obj->save();
                unset($pro_cat_obj);
            }
            if(isset($_POST['subcategory']))
            {
                $pro_cat_obj                = new ProductCategories();
                $pro_cat_obj->categories_id = $_POST['subcategory'];
                $pro_cat_obj->products_id   = $newProduct;
                $pro_cat_obj->id            = $PRMid;
                $pro_cat_obj->save();
                unset($pro_cat_obj);
            }
            //populate product_vendors table with vendors selected
            //print_r($products['Products']['product_vendors_id']);exit;
            if($products['Products']['product_vendors_id']!=null)
            {
                foreach ($products['Products']['product_vendors_id'] as $mykey => $myvalue) {
                    $pro_cat_obj = new ProductVendors();
                    $pro_cat_obj->vendors_id = $myvalue;
                    $pro_cat_obj->products_id = $newProduct;
                    $pro_cat_obj->id = $PRMid;
                    $pro_cat_obj->save();
                    unset($pro_cat_obj);
                }
            }
            return $this->redirect(['update', 'id' => $model->id, 'product_categories_id' => $PRMid]);
        } else {
            $Categoriesmodel= Categories::find()->where(['parent'=>'0'])->all();
            $Units                   = Units::find()->all();
            $cat_row = array();
            foreach($Categoriesmodel as $row)
            {
                $cat_row[$row->id]=$row->category;
            }
            //for Vendor selection
            $Vendormodel= User::find()->innerJoinWith('vendors')->all();
            $vend_row = array();
            foreach($Vendormodel as $row)
            {
                $vend_row[$row->relatedRecords['vendors']['0']->id]=$row->username;
            }
            return $this->render('create', [
                'model'     => $model,
                'cat_row'   => $cat_row,
                'vend_row'  => $vend_row,
                'Units'     => $Units,
            ]);
        }
    }
    public function actionAjaxSubcategoryList($id)
    {
        $Categoriesmodel= Categories::find()->where('parent='.$id.' AND sub_parent = 0')->all();
        $markup ='<label>Select Subcategory</label><select name="subcategory" class="form-control" onchange="
                $.get( &#39;index.php?r=products/ajax-sub-subcategory-list&id=&#39;+$(this).val(), function( data ) {
                  $( &#39;#sub-subcategory-list&#39; ).html( data );
                });
            ">
            <option value="">--Select--</option> ';
        if($Categoriesmodel)
        {
            foreach($Categoriesmodel as $row)
            {
                $markup.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }
        $markup.='</select>';
        return $markup;
    }
    public function actionAjaxSubSubcategoryList($id)
    {
        $Categoriesmodel= Categories::find()->where('sub_parent='.$id)->all();
        $markup ='<label>Select Sub Sub Category</label><select name="sub-subcategory" class="form-control" >
        <option value="">--Select--</option> ';
        if($Categoriesmodel)
        {
            foreach($Categoriesmodel as $row)
            {
                $markup.='<option value="'.$row->id.'">'.$row->category.'</option>';
            }
        }
        $markup.='</select>';
        return $markup;
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $product_categories_id
     * @return mixed
     */

    public function actionUpdate($id, $product_categories_id)
    {
        $model = $this->findModel($id, $product_categories_id);
        $products = Yii::$app->request->post();
        if($products)
        {
            $model->sku             = $products['Products']['sku'];
            $model->name            = $products['Products']['name'];
            $model->style           = $products['Products']['style'];
            $model->status          = $products['Products']['status'];
            $model->unit_id         = $products['Products']['unit_id'];
            $model->sizweight       = $products['Products']['sizweight'];
            $model->material        = $products['Products']['material'];
            $model->description     = $products['Products']['description'];
            $model->availability    = $products['Products']['availability'];
            $model->actual_price    = $products['Products']['actual_price'];
            $model->starting_from   = $products['Products']['starting_from'];
            $model->banjaiga_price  = $products['Products']['banjaiga_price'];
            $model->long_description= $products['Products']['long_description'];
            $model->manufacturers_id= $products['Products']['manufacturers_id'];
            if(isset($_POST['is_recommended']))
            {
                $model->is_recommended= '1';
            }
            else
            {
                $model->is_recommended= '0';
            }
            if(isset($_POST['is_multiple']))
            {
                $model->is_multiple= '1';
            }
            else
            {
                $model->is_multiple= '0';
            }
            //
            if(isset($_POST['new_brand_id']))
            {
                $brands_obj              = new Brands();
                $brands_obj->name        = $_POST['new_brand_id'];
                $brands_obj->image       = 'xyz.jpg';
                $brands_obj->date_created= date('Y-m-d H:i:s');
                $brands_obj->save();
                $directory = Yii::getAlias('@frontend/web/uploads/brands/')  . Yii::$app->db->getLastInsertID() . DIRECTORY_SEPARATOR;
                if (!is_dir($directory)) {
                    FileHelper::createDirectory($directory);
                    copy(dirname(dirname(__DIR__))."/themes/banjaiga/img/bath-tube.jpg",$directory."xyz.jpg");
                }
                unset($brands_obj);
                $model->brand_id        = Yii::$app->db->getLastInsertID();
            }
            else{
                //$model->brand_id        = $products['Products']['brand_id'];
            }
        }
        //echo "<pre>";print_r($model);exit;
        if ($products  && $model->save()) {
            //delete all previous records
            ProductCategories::deleteAll('id = '.$product_categories_id);
            //echo $product_categories_id;exit;
            //populate product_categories table with categories selected
            foreach($_POST['Products']['product_categories_id'] as $mykey=>$myvalue)
            {
                $pro_cat_obj                = new ProductCategories();
                $pro_cat_obj->categories_id = $myvalue;
                $pro_cat_obj->products_id   = $id;
                $pro_cat_obj->id            = $product_categories_id;
                $pro_cat_obj->save();
                unset($pro_cat_obj);
            }
            if(isset($_POST['subcategory']))
            {
                $pro_cat_obj                = new ProductCategories();
                $pro_cat_obj->categories_id = $_POST['subcategory'];
                $pro_cat_obj->products_id   = $id;
                $pro_cat_obj->id            = $product_categories_id;
                $pro_cat_obj->save();
                unset($pro_cat_obj);
            }
            if(isset($_POST['sub-subcategory']))
            {
                $pro_cat_obj                = new ProductCategories();
                $pro_cat_obj->categories_id = $_POST['sub-subcategory'];
                $pro_cat_obj->products_id   = $id;
                $pro_cat_obj->id            = $product_categories_id;
                $pro_cat_obj->save();
                unset($pro_cat_obj);
            }
            //delete all previous records
            ProductVendors::deleteAll('id = '.$model->product_vendors_id);
            //populate product_vendors table with vendors selected
            if(isset($_POST['product_vendors_id'])) {
                foreach ($_POST['product_vendors_id'] as $mykey => $myvalue) {
                $pro_vend_obj               = new ProductVendors();
                $pro_vend_obj->vendors_id   = $myvalue;
                $pro_vend_obj->products_id  = $id;
                $pro_vend_obj->id           = $model->product_vendors_id;
                $pro_vend_obj->save();
                unset($pro_vend_obj);
                }
            }
            //set featured image
            if(isset($_POST['featured']))
            {
                Yii::$app->db->createCommand()->update('products', ['featured_image' => $_POST['featured']], 'id = '.$model->id)->execute();
            }
            //Add Additional catalogue
            if(isset($_POST['catalogue_name'])) {
                $target_file = dirname(dirname(__DIR__)) . '/frontend/web/uploads/product-catalogue/' . $id;
                if (!file_exists($target_file)) {
                    mkdir($target_file, 0777, true);
                }
                foreach ($_POST['catalogue_name'] as $deskey => $desvalue) {
                    $up_data = array('name' => $_POST['catalogue_name'][$deskey], 'product_id' => $id);
                    if (is_numeric($deskey)) {
                        //for Catalogue PDF file
                        if ($_FILES["catalogue"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["catalogue"]["name"][$deskey]), PATHINFO_EXTENSION);
                            if (move_uploaded_file($_FILES["catalogue"]["tmp_name"][$deskey], $target_file . '/' . $nefilename)) {
                                $up_data['catalogue'] = $nefilename;
                                $prd_cate = ProductCatalogue::find()->where(['id'=>$deskey])->one();
                                $catalogue='';
                                if($prd_cate)
                                {
                                    $catalogue          =$prd_cate->catalogue;
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
                                $prd_cate = ProductCatalogue::find()->where(['id'=>$deskey])->one();
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
                        Yii::$app->db->createCommand()->update('product_catalogue', $up_data, 'id = ' . $deskey)->execute();
                    } else {
                        //for Catalogue PDF file
                        if ($_FILES["catalogue"]["tmp_name"][$deskey] !== '') {
                            $nefilename= uniqid(time(), true).'.'.pathinfo( basename( $_FILES["catalogue"]["name"][$deskey]), PATHINFO_EXTENSION);
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
                        Yii::$app->db->createCommand()->insert('product_catalogue', $up_data)->execute();
                    }
                }
            }
            return $this->redirect(['view', 'id' => $model->id, 'product_categories_id' => $model->product_categories_id]);
        } else {
            $ProductPicturesmodel   = new ProductPictures;
            $ProductPicsmodel       = ProductPictures::find()->where(['products_id' => $id])->all();

            //for Categories selection
            $Categoriesmodel        = Categories::find()->where(['parent' => '0'])->orderBy([
                'category' => SORT_DESC,
            ])->all();
            $ProductCategoriesModel = ProductCategories::find()->where(['id' => $product_categories_id])->all();
            $cat_row = array();
            foreach($Categoriesmodel as $row)
            {
                $cat_row[$row->id]  =$row->category;
            }
            $cat_selection = array();
            foreach($ProductCategoriesModel as $row)
            {
                $cat_selection[]    =$row->categories_id;
            }

            //for sub category selection
            $SubCategoriesmodel= Categories::find()->where('parent!=0 AND sub_parent = 0')->orderBy([
                'parent' => SORT_DESC,
                'category' => SORT_DESC,
            ])->all();
            //for sub sub category selection
            $SubSubCategoriesmodel= Categories::find()->where('parent!=0 AND sub_parent != 0')->orderBy([
                'parent' => SORT_DESC,
                'category' => SORT_DESC,
            ])->all();


            //for Vendor selection
            $Vendormodel             = User::find()->innerJoinWith('vendors')->all();
            $ProductsVendorModel     = ProductVendors::find()->where(['id' => $model->product_vendors_id])->all();
            $ProductCataloguemodel   = ProductCatalogue::find()->where(['product_id' => $id])->all();
            $vend_row                = array();
            $vend_selection          = array();
            foreach($Vendormodel as $row)
            {
                $vend_row[$row->relatedRecords['vendors']['0']->id]=$row->username;
            }
            foreach($ProductsVendorModel as $row)
            {
                $vend_selection[]=$row->vendors_id;
            }
            //
            $ProductsBrandModel= Brands::find()->all();
            $brand_row = array();
            foreach($ProductsBrandModel as $row)
            {
                $brand_row[$row->id]=$row->name;
            }
            //
            $Manufacturersmodel     = User::find()->innerJoinWith('manufacturers')->with('userProfiles')->all();
            $manufacturer_row       = array();
            foreach($Manufacturersmodel as $row)
            {
                $manufacturer_row[$row->id]=$row->username;
            }

            $Units             = Units::find()->all();
            $unit_row = array();
            foreach($Units as $row)
            {
                $unit_row[$row->id]=$row->name;
            }
            return $this->render('update', [
                'model'                 => $model,
                'cat_row'               => $cat_row,
                'vend_row'              => $vend_row,
                'Units'                 => $unit_row,
                'brand_row'             => $brand_row,
                'cat_selection'         => $cat_selection,
                'vend_selection'        => $vend_selection,
                'manufacturer_row'      => $manufacturer_row,
                'ProductPicsmodel'      => $ProductPicsmodel,
                'SubCategoriesmodel'    => $SubCategoriesmodel,
                'ProductPicturesmodel'  => $ProductPicturesmodel,
                'SubSubCategoriesmodel' => $SubSubCategoriesmodel,
                'ProductCataloguemodel' => $ProductCataloguemodel,
            ]);
        }
    }
    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $product_categories_id
     * @return mixed
     */
    public function actionDelete($id, $product_categories_id)
    {
        ProductVendors::deleteAll('products_id = '.$id);
        ProductPictures::deleteAll('products_id = '.$id);
        ProductCategories::deleteAll('id = '.$product_categories_id);
        $this->findModel($id, $product_categories_id)->delete();
        //remove files of this products
        $dir = dirname(dirname(__DIR__)).'/frontend/web/uploads/products-images/'. $id;
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


    public function actionUpdateImage($id, $width, $height)
    {
        if (($model = ProductPictures::find()->where(['id' => $id])->one()) !== null) {
            $model= $model;
        } else {
            throw new NotFoundHttpException('The requested Image does not exist.');
        }
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/products-images/' . $model->products_id .'/'.$model->file;
        $orignal_width=200;
        $orignal_height = 200;
        if (file_exists($target_file))
        {
            $sizes =getimagesize($target_file);
            $orignal_width = $sizes[0];
            $orignal_height = $sizes[1];
        }
        return $this->render('update-image', [
            'model'          => $model,
            'orignal_width'  => $orignal_width,
            'orignal_height' => $orignal_height,
        ]);
    }

    public function actionCropImage($id, $product_id, $image,$cx, $cy, $cw, $ch, $width, $height)
    {
        $targ_w =$width;//1136;
        $targ_h = $height;//388;
        $jpeg_quality = 90;
        $target_file = dirname(dirname(__DIR__)).'/frontend/web/uploads/products-images/' . $product_id ;
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


        $final_src = $target_file.'/'.pathinfo($image,PATHINFO_FILENAME).'_'.$width.'-'.$height.'.'.pathinfo($image,PATHINFO_EXTENSION);
        if(pathinfo($image,PATHINFO_EXTENSION)=='jpg' || pathinfo($image,PATHINFO_EXTENSION)=='jpeg')
        {
            imagejpeg($dst_r,$final_src,$jpeg_quality);
        }
        elseif(pathinfo($image,PATHINFO_EXTENSION)=='png')
        {
            imagepng($dst_r,$final_src);
        }
        return Json::encode(array('result'=>'Image cropped Successfuly','src'=>'../../frontend/web/uploads/products-images/'. $product_id .'/'.$image));
    }

    public function actionCatalogueDelete($name, $catalogue_image, $row_id, $product_id)
    {
        Yii::$app->db->createCommand()->delete('product_catalogue', ['id' => $row_id] )->execute();
        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/product-catalogue/'  . $product_id;

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
        if ($name!='' && file_exists($directory . '/' . $name)) {
            unlink($directory . '/' . $name);

            $output = [];
            $path = $directory . '/' . $name;
            $output['files'][] = [
                'name'          => $name,
                'size'          => /*filesize($name)*/1,
                'url'           => $path,
                'thumbnailUrl'  => $path,
                'deleteUrl'     => 'member-delete?name=' . $name . '&user_id=' . $product_id,
                'deleteType'    => 'POST',
            ];

            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found'));
        }
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $product_categories_id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $product_categories_id)
    {
        if (($model = Products::findOne(['id' => $id, 'product_categories_id' => $product_categories_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionImageUpload($prod_id)
    {
        $model = new ProductPictures();
        $imageFile = UploadedFile::getInstance($model, 'file');
        $directory = Yii::getAlias('@frontend/web/uploads/products-images') . DIRECTORY_SEPARATOR . $prod_id . DIRECTORY_SEPARATOR;
        if (!is_dir($directory)) {
            FileHelper::createDirectory($directory);
        }

        if ($imageFile) {
            $uid = uniqid(time(), true);
            $fileName = $uid . '.' . $imageFile->extension;
            $filePath = $directory . $fileName;
            if ($imageFile->saveAs($filePath)) {
                $path = '../../frontend/web/uploads/products-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $this->resize_image($filePath, 494, 336, 1, '494-336');//for vendor profile top big image
                $this->resize_image($filePath, 436, 384, 1, '436-384');//for vendor profile bottom two images
                $this->resize_image($filePath, 446, 300, 1, '446-300');//for "Most Viewed Products" in  profile page
                $this->resize_image($filePath, 332, 250, 1, '332-250');//for "Recommended Products" in  Single Product page
                $this->resize_image($filePath, 66, 103, 1, '66-103');//for "Related Products" in  Single Product page
                $this->resize_image($filePath, 296, 168, 1, '296-168');//for "Other Products" in  Single Product page
                Yii::$app->db->createCommand()->insert('product_pictures',
                    [
                        'file' => $fileName,
                        'products_id' => $prod_id,
                        'status' => 1,
                        'date_created' => date('Y-m-d H:i:s')
                    ])->execute();

                return Json::encode([
                    'files' => [
                        [
                            'name' => $fileName,
                            'size' => $imageFile->size,
                            'url' => $path,
                            'thumbnailUrl' => $path,
                            'deleteUrl' => '?r=products/image-delete&name=' . $fileName.'&prod_id='.$prod_id,
                            'deleteType' => 'POST',
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

    public function actionImageDelete($name, $prod_id)
    {
        Yii::$app->db->createCommand()->delete('product_pictures', ['file' => $name] )->execute();
        $directory = dirname(dirname(__DIR__)).'/frontend/web/uploads/products-images' . DIRECTORY_SEPARATOR . $prod_id;
        if (file_exists($directory . DIRECTORY_SEPARATOR . $name)) {
            unlink($directory . DIRECTORY_SEPARATOR . $name);
        }
        $thunb_494_336 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_494-336.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_436_384 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_436-384.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_446_300 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_446-300.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_417_312 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_417-312.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_332_250 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_332-250.".pathinfo($name, PATHINFO_EXTENSION);
        $thunb_296_168 = $directory . DIRECTORY_SEPARATOR . pathinfo($name, PATHINFO_FILENAME)."_296-168.".pathinfo($name, PATHINFO_EXTENSION);

        if (file_exists($thunb_494_336)){
            unlink($thunb_494_336);
        }
        if (file_exists($thunb_436_384)){
            unlink($thunb_436_384);
        }
        if (file_exists($thunb_436_384)){
            unlink($thunb_446_300);
        }
        if (file_exists($thunb_417_312)){
            unlink($thunb_417_312);
        }
        if (file_exists($thunb_332_250)){
            unlink($thunb_332_250);
        }
        if (file_exists($thunb_296_168)){
            unlink($thunb_296_168);
        }
        if(file_exists($directory)) {
            $files = FileHelper::findFiles($directory);
            $output = [];
            foreach ($files as $file) {
                $fileName = basename($file);
                $path = '/uploads/products-images/' . $prod_id . DIRECTORY_SEPARATOR . $fileName;
                $output['files'][] = [
                    'name' => $fileName,
                    'size' => filesize($file),
                    'url' => $path,
                    'thumbnailUrl' => $path,
                    'deleteUrl' => 'image-delete?name=' . $fileName . '&prod_id=' . $prod_id,
                    'deleteType' => 'POST',
                ];
            }
            return Json::encode($output);
        }
        else{
            return Json::encode(array('result'=>'file not found', 'directory'=>$directory));
        }
    }

}
