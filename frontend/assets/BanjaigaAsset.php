<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */
namespace frontend\assets;
use yii\web\AssetBundle;
/**
 * @author Amir Khalid <amir.khalid@discretelogix.com>
 * @since 2.0
 */
class BanjaigaAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        '../../themes/banjaiga/css/bootstrap.min.css',
        '../../themes/banjaiga/css/custom.css',
        '../../themes/banjaiga/css/font-awesome.css',
        '../../themes/banjaiga/css/check-list.css',
        '../../themes/banjaiga/css/bootstrap-select.min.css',
        'https://fonts.googleapis.com/css?family=Advent+Pro:100,200,300,400,500,600,700|PT+Sans:400,400i,700,700i&amp;subset=cyrillic,cyrillic-ext,greek,latin-ext',

    ];
    public $js = [

        /*'../../themes/banjaiga/js/jquery.min.js',*/
        '../../themes/banjaiga/js/bootstrap.min.js',
        '../../themes/banjaiga/js/bootstrap-select.min.js',
        '../../themes/banjaiga/js/validator.js',
        '../../themes/banjaiga/js/contact.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
