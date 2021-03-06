<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model app\models\Builders */

$this->title = $model->getVendorname($model->user_id);
$this->params['breadcrumbs'][] = ['label' => 'Builders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="builders-view">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id, 'user_id' => $model->user_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id, 'user_id' => $model->user_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
        ],
    ]) ?>

</div>
