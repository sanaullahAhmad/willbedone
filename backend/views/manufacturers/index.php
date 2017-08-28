<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ManufacturersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Manufacturers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="manufacturers-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('Create Manufacturers', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',
            'user_id',*/
            [
                'label' => 'User Name',
                'value' => function ($model) {
                    $id =  $model->getsingleUsers();
                    return $model->getVendorname($id);
                }
            ],
            [
                'label' => 'Email',
                'value' => function ($model) {
                    $id =  $model->getsingleUsers();
                    return $model->getVendoremail($id);
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    $id =  $model->getsingleUsers();
                    return $model->getVendorphone($id);
                }
            ],
            [
                'label'=>'Veiw Porfile',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/manufacturer-profile&id='.$model->id.'&user_id='.$model->user_id, "http").'">Profile</a>';
                },
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
