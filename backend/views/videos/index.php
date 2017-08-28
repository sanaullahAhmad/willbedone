<?php
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProjectsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Videos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="projects-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Video', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            /*'id',*/
            'title',
            'related_to',

            // 'ending_year',
             //'country',
            [
                'label' => 'Related With',
                'value' => function ($model) {
                    if ($model->related_to == 'products') {
                        return \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'name');
                    } else {
                        $user_id = \backend\models\Products::getinfo('id', $model->related_id, $model->related_to, 'user_id');
                        return \backend\models\Products::getinfo('user_id', $user_id, 'user_profiles', 'full_name');

                    }
                }
            ],
            // 'website',
            // 'status',
            // 'date_created',
            // 'post_date',
            // 'user_id',
            // 'user_vendors_id',
            // 'user_vendors_id1',
            // 'user_builders_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
