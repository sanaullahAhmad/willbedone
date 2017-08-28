<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\ShoppingListItems;
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
/* @var $this yii\web\View */
/* @var $searchModel app\models\UserShoppingListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Shopping Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-shopping-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create User Shopping List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            [
                'attribute' => 'user_id',
                'label' => 'User Name',
                'value' => function ($model) {
                    return $model->getInfo($model->user_id,'username', 'user');
                }
            ],

            'name',

            [
                'label' => 'PhoneNumber',
                'value' => function ($model) {
                    return $model->getInfo($model->user_id,'phone', 'user');
                }
            ],

            'date_created',

            /*'status',*/

            [
                'attribute' => 'status',
                'label'=>'Status',
                'format' => 'html',
                'value' => function ($model) {
                    if($model->status==1)
                    {
                        return "Processed";
                    }
                    else{
                        return "Pending";
                    }
                }
            ],

            /*[
                'attribute' => 'status',
                'label'     =>'Status',
                'format'    => 'html',
                'value'     => function ($model) {
                    $ShoppingListItems          = ShoppingListItems::find()->where(['user_shopping_list_id'=>$model->id])->count();
                    $processedShoppingListItems = ShoppingListItems::find()->where('user_shopping_list_id='.$model->id.' AND assigned_user_id!=0')->count();
                    if($ShoppingListItems==0)
                    {
                        return "Empty List";
                    }
                    elseif($ShoppingListItems!=0 && $ShoppingListItems==$processedShoppingListItems)
                    {
                        return "Processed ";//.$ShoppingListItems.' '.$processedShoppingListItems;
                    }
                    elseif($processedShoppingListItems==0)
                    {
                        return "Pending";
                    }
                    elseif($ShoppingListItems>$processedShoppingListItems)
                    {
                        return "Partially Processed";
                    }
                }
            ],*/

            /*'user_id',*/

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
