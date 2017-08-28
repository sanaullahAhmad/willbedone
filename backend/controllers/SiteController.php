<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use backend\models\User;
use backend\models\Leeds;
use backend\models\Vendors;
use backend\models\Products;
use backend\models\Architects;
use backend\models\Categories;
use backend\models\Manufacturers;
use backend\models\UserShoppingList;
use backend\models\ShoppingListItems;
use yii\helpers\Url;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\BackendLoginForm;

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
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions'   => ['login', 'error'],
                        'allow'     => true,
                    ],
                    [
                        'actions'   => ['logout', 'index'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                    [
                        'actions'   => ['logout', 'view'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                    [
                        'actions'   => ['logout', 'create'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                    [
                        'actions'   => ['logout', 'update'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                    [
                        'actions'   => ['logout', 'delete'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                    [
                        'actions'   => ['logout'],
                        'allow'     => true,
                        'roles'     => ['@'],
                    ],
                ],
            ],
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
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $leeds_count                = Leeds::find()->count();
        $vendors_count              = Vendors::find()->count();
        $products_count             = Products::find()->count();
        $architects_count           = Architects::find()->count();
        $categories_count           = Categories::find()->count();
        $normal_users_count         = User::find()->where(['user_type'=>'normal'])->count();
        $manufacturers_count        = Manufacturers::find()->count();
        $shopping_list_count        = UserShoppingList::find()->count();
        $proc_shopping_list_count   = UserShoppingList::find()->where('status=1')->count();
        $unproc_shopping_list_count = UserShoppingList::find()->where('status=0')->count();
        $pending_qoutes_count       = ShoppingListItems::find()->where('is_processed=0')->count();
        $regular_vendors_count      = Vendors::find()->where(['vendor_type'=>'1'])->count();
        $pending_info_req_count     = ShoppingListItems::find()->where('is_processed=0 AND (status=7 OR status=8)')->count();
        $closed_info_leads_count    = ShoppingListItems::find()->where('status=8')->count();
        $total_info_request_count   = ShoppingListItems::find()->where('status=7 OR status=8')->count();
        $total_quote_request_count  = ShoppingListItems::find()->where('status=2 OR status=3')->count();
        $closed_quotes_leads_count  = ShoppingListItems::find()->where('is_processed=1')->count();
        return $this->render('index', [
            'leeds_count'               => $leeds_count,
            'vendors_count'             => $vendors_count,
            'products_count'            => $products_count,
            'categories_count'          => $categories_count,
            'architects_count'          => $architects_count,
            'normal_users_count'        => $normal_users_count,
            'shopping_list_count'       => $shopping_list_count,
            'manufacturers_count'       => $manufacturers_count,
            'pending_qoutes_count'      => $pending_qoutes_count,
            'regular_vendors_count'     => $regular_vendors_count,
            'pending_info_req_count'    => $pending_info_req_count,
            'closed_info_leads_count'   => $closed_info_leads_count,
            'total_info_request_count'  => $total_info_request_count,
            'closed_quotes_leads_count' => $closed_quotes_leads_count,
            'total_quote_request_count' => $total_quote_request_count,
            'proc_shopping_list_count'  => $proc_shopping_list_count,
            'unproc_shopping_list_count'=> $unproc_shopping_list_count,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        $this->layout = 'main-layout';
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new BackendLoginForm();
        //$this->layout = false;
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
}
