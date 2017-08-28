<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div id="sidebar-wrapper" class="stretch-full-height">
    <ul class="sidebar-nav admin-nav">
        <li id="dashboard">
            <a href="<?php echo Yii::$app->homeUrl; ?>" class="active-title">
                <span class="nav-icon"><i class="icon-dashboard icon-2x"></i></span>
                <span class="sidebar-menu-item-text">Dashboard</span></a>
        </li>
        <?php
        if (!Yii::$app->user->can('admin')) {
            ?>
            <li class="nav-header" id="layout">
                <a href="javascript:void(0)" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">Products</span>
                    <i class="icon-chevron-down pull-right"></i>
                </a>
                <ul class="nav nav-list collapse submenu" id="layouts">
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/index">Products</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=product-ratings/index">Product Ratings</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=categories/">Categories</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=sub-categories/">Sub Categories</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=sub-sub-categories/">Sub Sub Categories</a></li>
                    <!--<li><a href="<?php /*echo Yii::$app->homeUrl; */?>?r=brands/">Brands</a></li>-->
                </ul>
            </li>
            <li class="nav-header" id="layout">
                <a href="javascript:void(0)" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">Users</span>
                    <i class="icon-chevron-down pull-right"></i>
                </a>
                <ul class="nav nav-list collapse submenu" id="layouts">
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=user/index">Customers</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=vendors/">Vendors</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=manufacturers/index">Manufacturer</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=builders/">Builders</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=architects/">Architects</a></li>
                </ul>
            </li>
            <li class="nav-header" id="layout">
                <a href="javascript:void(0)" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">Projects</span>
                    <i class="icon-chevron-down pull-right"></i>
                </a>
                <ul class="nav nav-list collapse submenu" id="layouts">
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=projects/index">Projects</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=project-assignments/">Projects Assignments</a></li>
                </ul>
            </li>
            <li class="nav-header" id="layout">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=leeds/index" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">Leads</span>
                    <i class="icon-chevron-right pull-right"></i>
                </a>
                <!--<ul class="nav nav-list collapse submenu" id="layouts">
                    <li><a href="<?php /*echo Yii::$app->homeUrl; */?>?r=leeds/index">Leads</a></li>
                    <li><a href="<?php /*echo Yii::$app->homeUrl; */?>?r=leed-assignments/">Lead Assignments</a></li>
                </ul>-->
            </li>
            <li class="nav-header" id="layout">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">User Shopping List</span>
                    <i class="icon-chevron-right pull-right"></i>
                </a>
            </li>

            <li class="nav-header" id="layout">
                <a href="javascript:void(0)" >
                    <span class="nav-icon"><i class="icon-folder-open icon-2x"></i></span>
                    <span class="sidebar-menu-item-text">Others</span>
                    <i class="icon-chevron-down pull-right"></i>
                </a>
                <ul class="nav nav-list collapse submenu" id="layouts">
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=configurations/index">Configurations</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-testimonials/">Testimonials</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=units/index">Units</a></li>
                    <li><a href="<?php echo Yii::$app->homeUrl; ?>?r=videos/index">Videos</a></li>
                </ul>
            </li>

            <?php
        }
        ?>
    </ul>
</div>

