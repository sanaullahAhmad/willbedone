<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


/* @var $this yii\web\View */
/* @var $model backend\models\UserShoppingList */

$this->title = 'Create User Shopping List';
$this->params['breadcrumbs'][] = ['label' => 'User Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-shopping-list-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?= $this->render('_form', [
        'model'     => $model,
        'users_row' => $users_row,
    ]) ?>

</div>
