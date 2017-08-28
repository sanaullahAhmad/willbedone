<?php
namespace backend\controllers;
use backend\models\ProductCatalogue;
use backend\models\ShoppingListItemsInfo;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use backend\models\User;
use backend\models\Products;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use backend\models\UserShoppingList;
use backend\models\ShoppingListItems;
use app\models\UserShoppingListSearch;
/**
 * UserShoppingListController implements the CRUD actions for UserShoppingList model.
 */
class UserShoppingListController extends Controller
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
                        'actions' => ['logout', 'delete-shopping-list-items'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'see-info'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'mark-processed-shopping-list-items'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'mark-showroom-visited-shopping-list-items'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['logout', 'send-information'],
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
     * Lists all UserShoppingList models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserShoppingListSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    /**
     * Displays a single UserShoppingList model.
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
     * Creates a new UserShoppingList model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model               = new UserShoppingList();
        $usl_id=1;$prm       = UserShoppingList::find()->orderBy('id DESC')->one();if($prm) {$usl_id=$prm->id+1;}
        $model->id           = $usl_id;
        $model->date_created = date('Y-m-d H:i:s');
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            $Users             = User::find()->where(['user_type'=>'Normal'])->all();
            $users_row  = array();
            foreach($Users as $row)
            {
                $users_row[$row->id] = $row->username;
            }
            return $this->render('create', [
                'model'             => $model,
                'users_row'         => $users_row,
            ]);
        }
    }
    /**
     * Updates an existing UserShoppingList model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionSeeInfo($id)
    {
        $model= ShoppingListItemsInfo::find()->where(['shopping_list_item_id'=>$id])->one();
        if ($model !== null) {
            //
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
        //echo "<pre>";print_r($model);exit;
        return $this->render('see-info', [
            'model'             => $model,
        ]);
    }

    public function actionUpdate($id, $user_id)
    {
        //echo "<pre>";print_r($_POST);exit;
        $model = $this->findModel($id, $user_id);
        if(isset($_POST['assigned_user_id']))
        {
            //echo "sucess";exit;
            foreach($_POST['assigned_user_id'] as $deskey=>$desvalue)
            {
                //echo $deskey.'  '.$desvalue.'<br>';
                if(is_numeric($deskey))
                {
                    $up_data = array('assigned_user_id' => $_POST['assigned_user_id'][$deskey], 'price_offered' => $_POST['price_offered'][$deskey]);
                    Yii::$app->db->createCommand()->update('shopping_list_items', $up_data, 'id = '.$_POST['shopping_list_items_id'][$deskey])->execute();
                }
                else{
                    $prd = Products::find()->where(['id'=>$_POST['products_id'][$deskey]])->one();
                    $up_data = array(
                        'date_created'                   => date('Y-m-d H:i:s'),
                        'user_shopping_list_id'          => $id,
                        'user_shopping_list_user_id'     => $user_id,
                        'assigned_user_id'               => $_POST['assigned_user_id'][$deskey],
                        'products_id'                    => $_POST['products_id'][$deskey],
                        'products_product_categories_id' => $prd->product_categories_id,
                        'price_offered'                  => $_POST['price_offered'][$deskey],
                        'quantity'                       => $_POST['quantity'][$deskey],
                    );
                    Yii::$app->db->createCommand()->insert('shopping_list_items', $up_data)->execute();
                }
            }
            //exit;
            //update DateUpdated of Usershoping list to use it in shoping list time limit in frontend
            Yii::$app->db->createCommand()->update('user_shopping_list', ['date_updated'=>date('Y-m-d H:i:s')], 'id = '.$id)->execute();
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            return $this->redirect(['view', 'id' => $model->id, 'user_id' => $model->user_id]);
        } else {
            $Vendors    = User::find()->where(['user_type'=>'vendor'])->all();
            $products   = Products::find()->all();
            $Users      = User::find()->where(['user_type'=>'Normal'])->all();
            $users_row  = array();
            foreach($Users as $row)
            {
                $users_row[$row->id]=$row->username;
            }
            $ShoppingListItems = ShoppingListItems::find()->where(['user_shopping_list_id'=>$id])->all();
            return $this->render('update', [
                'model'             => $model,
                'users_row'         => $users_row,
                'Vendors'           => $Vendors,
                'products'          => $products,
                'ShoppingListItems' => $ShoppingListItems,
            ]);
        }
    }
    public function actionDeleteShoppingListItems($row_id, $user_id)
    {
        Yii::$app->db->createCommand()->delete('shopping_list_items', ['id' => $row_id] )->execute();
        return Json::encode(array('result'=>'Deleted Successfully'));
    }
    public function actionMarkProcessedShoppingListItems($row_id, $user_id)
    {
        $message='';
        Yii::$app->db->createCommand()->update('shopping_list_items', ['is_processed' => 1/*, 'status' => 2*/, 'date_proccessed' => date('Y-m-d H:i:s')], ['id' => $row_id] )->execute();
        $shoplistitem = ShoppingListItems::find()->where(['id' => $row_id])->one();
        if($shoplistitem->status==2)
        {
            //Yii::$app->db->createCommand()->update('shopping_list_items', ['status' => 2], ['id' => $row_id] )->execute();
            $message ='Quotation';
        }
        elseif($shoplistitem->status==7)
        {
            $message ='Information';
        }

        $username       =Products::getinfo('id', $shoplistitem->user_shopping_list_user_id,'user', 'username' );
        $email          =Products::getinfo('id', $shoplistitem->user_shopping_list_user_id,'user', 'email' );
        $product_name   =Products::getinfo('id', $shoplistitem->products_id,'products', 'name' );
        $listname       =Products::getinfo('id', $shoplistitem->user_shopping_list_id,'user_shopping_list', 'name' );
        $link           =$_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'].str_replace('backend','frontend',Yii::$app->request->getBaseUrl(true));


        $body = "Hi ".$username.",<br><p>Admin  have Processed your ".$message." on '".$product_name."' product in '".$listname."' list here. </p><br><p><a href='" . $link . "'>Click here to check</a></p></p><br>Regards! <br> Support team<br><p>If the request was not made on your behalf then kindly ignore this email.</p>";
        \Yii::$app->mailer->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => 'Banjaiga'])
            ->setTo($email)
            ->setSubject('Admin have proceesed your '.$message)
            ->setHtmlBody($body)
            ->send();
        return Json::encode(array('result'=>'Processed Successfully', 'email'=>$email, 'body'=>$body));
    }
    public function actionMarkShowroomVisitedShoppingListItems($row_id, $user_id)
    {
        Yii::$app->db->createCommand()->update('shopping_list_items', ['status' => 9], ['id' => $row_id] )->execute();
        return Json::encode(array('result'=>'Mark visited Successfully'));
    }
    public function actionSendInformation($row_id)
    {
        $shoplistitem = ShoppingListItems::find()->where(['id' => $row_id])->one();
        Yii::$app->db->createCommand()->update('shopping_list_items', ['status' => 8], ['id' => $row_id] )->execute();

        $username       =Products::getinfo('id', $shoplistitem->user_shopping_list_user_id,'user', 'username' );
        $email       =Products::getinfo('id', $shoplistitem->user_shopping_list_user_id,'user', 'email' );
        $product_name   =Products::getinfo('id', $shoplistitem->products_id,'products', 'name' );
        $listname       =Products::getinfo('id', $shoplistitem->user_shopping_list_id,'user_shopping_list', 'name' );


        $body = "Hi ".$username.",<br><p>Admin  have sent you information on '".$product_name."' product in '".$listname."' list here. </p><br><p>".$_POST['sendInfoTextarea']."</p></p><br>Regards! <br> Support team<br><p>If the request was not made on your behalf then kindly ignore this email.</p>";
        \Yii::$app->mailer->compose()
            ->setFrom([\Yii::$app->params['supportEmail'] => 'Banjaiga'])
            ->setTo($email)
            ->setSubject('Shopping List Information Sent.')
            ->setHtmlBody($body)
            ->send();

        return Json::encode(array('result'=>'Information sent Successfully'));
    }

    /**
     * Deletes an existing UserShoppingList model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $user_id
     * @return mixed
     */
    public function actionDelete($id, $user_id)
    {
        $this->findModel($id, $user_id)->delete();
        return $this->redirect(['index']);
    }

    /**
     * Finds the UserShoppingList model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $user_id
     * @return UserShoppingList the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $user_id)
    {
        if (($model = UserShoppingList::findOne(['id' => $id, 'user_id' => $user_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
