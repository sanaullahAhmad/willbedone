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
class LapsAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [

        '../../themes/laps/dist/css/bootstrap.css',
        '../../themes/laps/css/theme-base.css',
        '../../themes/laps/css/boostrap-overrides.css',
        '../../themes/laps/css/theme.css',
        '../../themes/laps/assets/css/sidebar.css',
        '../../themes/laps/assets/css/font-awesome.css',
        '../../themes/laps/assets/css/ezmark.css',
        '../../themes/laps/assets/plugins/morris.js-0.4.3/morris.css',
        '../../themes/laps/assets/css/animate-custom.css',
        '../../themes/laps/assets/plugins/calendar/zabuto_calendar.css',
        '../../themes/laps/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.css',
        '../../themes/laps/assets/css/pushy.css',
        '../../themes/laps/assets/css/panel.css',
        '../../themes/laps/assets/select/select2.css',
        '../../themes/laps/assets/css/custom.css',
        '../../themes/laps/assets/css/jquery.Jcrop.css',
        '../../themes/laps/colorPicker/colpick/css/colpick.css',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.css',
        'https://fonts.googleapis.com/css?family=Roboto:400,400italic,500italic,700,700italic,900,500,300italic,300',
        'https://fonts.googleapis.com/css?family=Raleway:400,500,600,700,300,800',
    ];
    public $js = [

        '../../themes/laps/assets/js/modernizr-2.6.2.min.js',
        '../../themes/laps/dist/js/bootstrap.js',
        '../../themes/laps/assets/js/jquery-ui-1.10.4.custom.min.js',
        '../../themes/laps/assets/js/pushy.js',
        '../../themes/laps/assets/plugins/calendar/zabuto_calendar.js',
        '../../themes/laps/assets/js/jquery.sparkline.js',
        '../../themes/laps/assets/js/jquery.ezmark.js',
        '../../themes/laps/assets/select/select2.js',
        '../../themes/laps/assets/plugins/canvas/canvasjs.min.js',
        '../../themes/laps/colorPicker/colpick/js/colpick.js',
        '../../themes/laps/colorPicker/colpick/js/colpick-implem.js',
        '../../themes/laps/assets/js/sidebar-navbar.js',
        '../../themes/laps/assets/js/script.js',
        'http://maps.googleapis.com/maps/api/js?sensor=false',
        '../../themes/laps/assets/js/gmap3.js',
        '../../themes/laps/assets/js/gmap.custom-index-map.js',
        '../../themes/laps/assets/plugins/fontawesome-markers-master/fontawesome-markers.js',
        '../../themes/laps/assets/plugins/jquery-easy-pie-chart/examples/excanvas.js',
        '../../themes/laps/assets/plugins/jquery-easy-pie-chart/jquery.easy-pie-chart.js',
        '../../themes/laps/assets/plugins/flot/jquery.flot.js',
        '../../themes/laps/assets/plugins/flot/jquery.flot.resize.js',
        '../../themes/laps/assets/js/custom_laps.js',
        '../../themes/laps/assets/js/moment-c.js',
        '../../themes/laps/assets/js/jquery.Jcrop.js',
        'https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.42/js/bootstrap-datetimepicker.min.js'
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
