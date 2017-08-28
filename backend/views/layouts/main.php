<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Banjaiga',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems = [
            [
                'label' => 'Products',
                'items' => [
                    ['label' => 'Products', 'url' => ['/products/index']],
                    /*'<li class="divider"></li>',
                    ['label' => 'Product Categories', 'url' => ['/product-categories/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Product Pictures', 'url' => ['/product-pictures/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Product Ratings', 'url' => ['/product-ratings/index']],
                    '<li class="divider"></li>',*/
                    ['label' => 'Categories', 'url' => ['/categories/index']],
                ],
            ],
            [
                'label' => 'Customers',
                'items' => [
                    ['label' => 'Customers', 'url' => ['/user/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Vendors', 'url' => ['/vendors/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Manufacturers', 'url' => ['/manufacturers/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Builders', 'url' => ['/builders/index']],
                    /*'<li class="divider"></li>',
                    ['label' => 'Profile Ratings', 'url' => ['/profile-ratings/index']],
                    '<li class="divider"></li>',
                    ['label' => 'User Shopping Lists', 'url' => ['/user-shopping-list/index']],*/
                ],
            ],
            [
                'label' => 'Projects',
                'items' => [
                    ['label' => 'Projects', 'url' => ['/projects/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Project Assignments', 'url' => ['/project-assignments/index']],
                ],
            ],
            [
                'label' => 'Leeds',
                'items' => [
                    ['label' => 'Leeds', 'url' => ['/leeds/index']],
                    '<li class="divider"></li>',
                    ['label' => 'Leed Assignments', 'url' => ['leed-assignments/index']],
                ],
            ],
            ['label' => 'Shopping List Items', 'url' => ['/shopping-list-items/index']],
            ['label' => 'Configurations', 'url' => ['/configurations/index']],

        ];
        $menuItems[] = '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Banjaiga <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
