<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ShoppingListItems */

$this->title = 'Create Shopping List Items';
$this->params['breadcrumbs'][] = ['label' => 'Shopping List Items', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopping-list-items-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
