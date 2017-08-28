<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use backend\models\User;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArchitectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Architects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="architects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <p>
        <?= Html::a('Create Architect', ['create'], ['class' => 'btn btn-success']) ?>
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
                    return $model->getArchitectname($model->user_id);
                }
            ],
            [
                'label' => 'Email',
                'value' => function ($model) {
                    return $model->getArchitectemail($model->user_id);
                }
            ],
            [
                'label' => 'Phone',
                'value' => function ($model) {
                    return $model->getArchitectphone($model->user_id);
                }
            ],
            [
                'label'=>'Veiw Porfile',
                'format' => 'raw',
                'value'=>function ($model) {
                    return '<a target="_blank" href="'.Url::to(str_replace("backend","frontend",Yii::$app->request->getBaseUrl(true)).'?r=site/architect-profile&id='.$model->id.'&user_id='.$model->user_id, "http").'">Profile</a>';
                },
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
