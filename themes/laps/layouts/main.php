<?php

use yii\helpers\Html;
use frontend\assets\LapsAsset;

/* @var $this \yii\web\View */
/* @var $content string */

$asset = LapsAsset::register($this);
$baseUrl = $asset->baseUrl;
$baseUrl = $baseUrl . "/../../themes/laps";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <img src="<?php echo $baseUrl ?>/img/loading.gif" style="display: none;" id="loading-gif" >
        <?php $this->beginBody() ?>
        <div class="preloader-wrapper" style="display: none;">
            <div class="preloader">
                <img src="<?php echo $baseUrl ?>/img/preloader.png" alt="loading image">
            </div>
        </div>
        <div id="container">
            <div class="navbar navbar-static-top navbar-inverse " role="navigation">
                <div class="navbar-header navbar-inverse text-center">
                    <button type="button" class="navbar-toggle border-left-med no-radius" id="menu-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <button type="button" class="navbar-toggle border-left-med no-radius" id="user-menu" data-toggle="collapse" >
                        <span class="sr-only">Toggle navigation</span>
                        <span class="avatar text-inverse">Welcome <?php echo Yii::$app->user->identity->username; ?>!</span>
                    </button>
                    <!-- logo -->
                    <div class="navbar-brand admin-logo"><a href="<?php echo Yii::$app->homeUrl; ?>"> <img src="<?php echo $baseUrl ?>/img/logo.png" alt="logo" class=".img-responsive"></a></div>
                    <!-- / logo -->
                </div>
                <!-- user -->
                <div class="collapse navbar-collapse navbar-ex1-collapse">

                    <ul class="nav navbar-nav navbar-right navbar-user">
                        <!-- new messages -->
                        <li class="dropdown messages-dropdown">
                            <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown"><i class="icon-envelope-alt"></i><span class="badge">23</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header header-inverse"><i class="icon-envelope"></i>23 New Messages</li>
                                <li class="message-preview">
                                    <a href="#">
                                        <img src="<?php echo $baseUrl ?>/img/tn_user_02.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                        <span class="name pull-left">Maya Smith</span>
                                        <span class="label label-primary pull-right">Just Now</span><br>
                                        <span class="message text-transparent">Hi Ryan, I received a message from quis...</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <img src="<?php echo $baseUrl ?>/img/tn_user_01.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                        <span class="name pull-left">James Doe</span>
                                        <span class="time pull-right text-transparent"><i class="icon-time"></i> 4:34 PM</span><br>
                                        <span class="message text-transparent">Good Afternoon Ryan, Were you able to...</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="message-preview">
                                    <a href="#">
                                        <img src="<?php echo $baseUrl ?>/img/tn_user_04.jpg" alt="User" class="img-circle user-thumbnail-xs">
                                        <span class="name pull-left">Benjamin Taylor</span>
                                        <span class="time pull-right text-transparent"><i class="icon-time"></i> 1:56 PM</span><br>
                                        <span class="message text-transparent">Hey, Can you give me a call when you get a...</span>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-footer text-center">
                                    <a href="#">
                                        See all new messages
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!-- alerts -->
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown">
                                <i class="icon-flag-alt"></i><span class="badge animated-delay flash">12</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header header-inverse"><i class="icon-star"></i>12 Notifications </li>
                                <li class="notification">
                                    <a href="#">
                                        <span class="pull-left"><span class="label label-success"><i class="icon-comment"></i></span>  New Comment</span>
                                        <span class="time pull-right text-transparent">Just Now</span><br>
                                    </a>
                                </li>
                                <li class="notification">
                                    <a href="#">
                                        <span class="pull-left"><span class="label label-success"><i class="icon-comment"></i></span>  New Comment</span>
                                        <span class="time pull-right text-transparent">5 Minutes Ago</span><br>
                                    </a>
                                </li>
                                <li class="notification">
                                    <a href="#">
                                        <span class="pull-left"><span class="label label-primary"><i class="icon-user"></i></span>  12 New Users</span>
                                        <span class="time pull-right text-transparent">23 Minutes ago</span><br>
                                    </a>
                                </li>
                                <li class="notification">
                                    <a href="#">
                                        <span class="pull-left"><span class="label label-danger"><i class="icon-flag"></i></span>  Canceled Transaction</span>
                                        <span class="time pull-right text-transparent">12 Hours Ago</span><br>
                                    </a>
                                </li>
                                <li class="notification">
                                    <a href="#">
                                        <span class="pull-left"><span class="label label-warning"><i class="icon-shopping-cart"></i></span>  Canceled Transaction</span>
                                        <span class="time pull-right text-transparent">Yesterday</span><br>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-footer text-center">
                                    <a href="#">
                                        See all notifications
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown alerts-dropdown">
                            <a href="#" class="dropdown-toggle announcements" data-toggle="dropdown"><i class="icon-bar-chart"></i><span class="badge">56</span></a>
                            <ul class="dropdown-menu">
                                <li class="dropdown-header header-inverse"><i class="icon-bar-chart"></i>6 Pending Tasks </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">November orders </span>
                                        </span>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width: 45%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Invoices paid</span>
                                        </span>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-success"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:65%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Updates</span>
                                        </span>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-warning"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:35%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="task">
                                            <span class="desc">Unread emails</span>
                                        </span>
                                        <div class="progress progress-striped active">
                                            <div class="progress-bar progress-bar-danger"  role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100" style="width:15%">
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li class="divider"></li>
                                <li class="dropdown-footer text-center">
                                    <a href="#">
                                        See all tasks
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="dropdown">

                        </li>
                        <li class="avatar dropdown user-dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo Yii::$app->user->identity->username; ?>!<b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#"><i class="icon-user"></i> Profile</a></li>
                                <li><a href="#"><i class="icon-envelope"></i> Inbox</a></li>
                                <li><a href="#"><i class="icon-gear"></i> Settings</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=site/logout"><i class="icon-power-off"></i> Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div><!-- / nav-collapse -->
            </div>

            <div id="wrapper">
                <!-- Sidebar -->
                <div class="sidebar-back"></div>
                <?php
                $this->beginContent('@app/views/layouts/sidebar-menu.php');
                $this->endContent();
                ?>


                <!-- Keep all page content within the page-content-wrapper -->
                <div id="page-content-wrapper" class="stretch-full-height animated-med-delay fadeInRight">
                    <?= $content ?>
                </div>
            </div>
        </div>



        <?php $this->endBody() ?>
    <div class="modal fade" id="SendInformatioModal" role="dialog">
        <div class="modal-dialog" style="left: 0%;">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Information</h4>
                </div>
                <div class="modal-body">
                    <p>Write Information here.</p>
                    <form id="send_cus_info">
                    <textarea name="sendInfoTextarea" class="form-control"></textarea></form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default send_info_submit" data-dismiss="modal" onclick="send_information();">Send</button>
                </div>
            </div>

        </div>
    </div>
    </body>

</html>
<?php $this->endPage() ?>
<script type="text/javascript">
    function getBrowserSize(){
        var w, h;
        if(typeof window.innerWidth != 'undefined')
        {
            w = window.innerWidth; //other browsers
            h = window.innerHeight;
        }
        else if(typeof document.documentElement != 'undefined' && typeof      document.documentElement.clientWidth != 'undefined' && document.documentElement.clientWidth != 0)
        {
            w =  document.documentElement.clientWidth; //IE
            h = document.documentElement.clientHeight;
        }
        else{
            w = document.body.clientWidth; //IE
            h = document.body.clientHeight;
        }
        return {'width':w, 'height': h};
    }
    $(document).ready(function () {
        if(parseInt(getBrowserSize().width) < 768){
            $('.admin-logo').hide("hide");
        }

        $('#menu-toggle').click( function () {
            $('.admin-logo').toggle("show");
        });
    });
</script>
