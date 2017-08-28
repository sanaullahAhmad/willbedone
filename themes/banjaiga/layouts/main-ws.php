<?php
use yii\helpers\Html;
use frontend\assets\BanjaigaAsset;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
/* @var $this \yii\web\View */
/* @var $content string */
$asset = BanjaigaAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="shortcut icon" type="image/png" href="<?php echo $themeUrl; ?>/img/favicon.png"/>
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
        <?php $this->head() ?>
        <script>
            (function (i, s, o, g, r, a, m) {
                i['GoogleAnalyticsObject'] = r;
                i[r] = i[r] || function () {
                        (i[r].q = i[r].q || []).push(arguments)
                    }, i[r].l = 1 * new Date();
                a = s.createElement(o),
                    m = s.getElementsByTagName(o)[0];
                a.async = 1;
                a.src = g;
                m.parentNode.insertBefore(a, m)
            })(window, document, 'script', 'https://www.google-analytics.com/analytics.js', 'ga');
            ga('create', 'UA-83702651-1', 'auto');
            ga('send', 'pageview');
        </script>
    </head>
    <body class="blue-background" oncontextmenu="return false;">
        <?php $this->beginBody() ?>
        <?php
        $this->beginContent('@app/views/layouts/header.php');
        $this->endContent();
        ?>

        <?= $content ?>

        <?php
        $this->beginContent('@app/views/layouts/footer.php');
        $this->endContent();
        ?>

        <?php $this->endBody();?>
    </body>
</html>
<?php
$this->beginContent('@app/views/layouts/scripts.php');
$this->endContent();
?>
<?php $this->endPage() ?>
