<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Roles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-roles-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User Roles', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'role_name',
            'description',
            'date_created',
            'status',
            // 'users_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
