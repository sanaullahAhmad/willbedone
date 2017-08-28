<?php
$this->title = "Dashboard";
?>


<div class="row add-padding">
    <div class="pull-left">
        <h1>Welcome <?php echo ucfirst(Yii::$app->user->identity->username); ?>!</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->request->hostInfo . Yii::$app->homeUrl; ?>?r=user/dashboard" class="text-transparent">Dashboard</a></li>
            <li class="active"><a href="javascript:void(0)" class="text-transparent">Daily</a></li>
        </ol>
    </div>
</div>
<!--Page Content-->
<!-- Stats top row-->
<div class="row no-padding">
    <!--row 1, col 1-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel">
            <div class="panel-body brand-info-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-file"></i></div></div>							
                </div>
                <span id="new_products" class="big-text"></span>
                <input type="hidden" id="new_products_value" value="<?= $products ?>">
                <div class="stat text-transparent">
                    <h5>New Products</h5>
                </div> 
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-info"><strong><?= $last_week_products ?></strong></span>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="icon-arrow-up text-transparent daily-stats-compare"></span> 
                    <span class="daily-stats-compare"><?= $product_percentage ?>%</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 1-->
    <!--row 1, col 2-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel">
            <div class="panel-body brand-primary-light-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-copy"></i></div></div>							
                </div>
                <span id="pending_sops" class="big-text"></span>
                <input type="hidden" id="pending_sop_value" value="<?= $pending_sops ?>">
                <div class="stat text-transparent">
                    <h5>Pending SOPs </h5>
                </div> 
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent ">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-primary"><strong><?= $last_week_pending_sops ?></strong></span>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                    <span class="daily-stats-compare"><?= $pendong_sop_percentage ?>%</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 2-->
    <!--row 1, col 3-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel">
            <div class="panel-body brand-info-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-th-list"></i></div></div>							
                </div>
                <span id="new-subscribers" class="big-text"></span>
                <div class="stat text-transparent">
                    <h5>Infusion Requests </h5>
                </div> 
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent ">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-info"><strong>40</strong></span>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="icon-arrow-up text-transparent daily-stats-compare"></span> 
                    <span class="daily-stats-compare">12%</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 3-->
    <!--row 1, col 4-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel">
            <div class="panel-body brand-primary-light-bg  text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-shopping-cart"></i></div></div>							
                </div>
                <span id="new_reports" class="big-text"></span>
                <input type="hidden" id="new_reports_value" value="<?= $reports ?>">
                <div class="stat text-transparent">
                    <h5>Reports </h5>
                </div> 
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-primary"><strong><?= $report_last_week ?></strong></span>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 4-->
</div><!--/ row-->
<!--/ Stats top row-->



<div class="row">
    <!--basic panel-->
    <div class="col-md-3">
        <div class="panel panel-gray">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Processing Requests</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:void(0)"  ><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="javascript:void(0)"  class="close-panel" ><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseOne" class="panel-body panel-collapse collapse in">

            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/newclinicaltrialproduct"><small>Add New</small></a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/newclinicaltrialproduct"><i class="icon-circle-arrow-right icon-2x"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/basic panel-->

    <!--default panel-->
    <div class="col-md-3">
        <div class="panel panel-gray">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Search Products</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  ><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" ><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseTwo" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=search/index"><small>Search Now</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=search/index"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/default panel-->

    <!--primary panel-->
    <div class="col-md-3">
        <div class="panel panel-gray">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Pending SOPs</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;" data-toggle="collapse"  data-target="#collapseThree"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseThree" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingsop"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingsop"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/primary panel-->

    <!--success panel-->
    <div class="col-md-3">
        <div class="panel panel-gray">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Infusion Requests</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseFour"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseFour" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/newinfusionrequest"><small>Create New</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/newinfusionrequest"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/success panel-->

</div><!--/ row 1-->
<!--Row 2-->
<div class="row">
    <!--info panel-->
    <div class="col-md-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Pending Review </h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseFive"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseFive" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingreview"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingreview"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/info panel-->

    <!--warning panel-->
    <div class="col-md-3">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Pending Approval</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseSix"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseSix" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingapprovals"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/allpendingapprovals"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/warning panel-->

    <!--danger panel-->
    <div class="col-md-3">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Rejected Products</h4></div>
                <div class="tools pull-right">

                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseSeven"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseSeven" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=products/rejectedproducts"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=products/rejectedproducts"></a><i class="icon-circle-arrow-right"></i></div>
            </div>
        </div><!--/panel-->
    </div><!--/danger panel-->

    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Reports</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=reports/index"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=reports/index"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->

</div><!--/ row 2-->