<?php
$this->title = "Dashboard";
?>
<div class="row add-padding">
    <div class="pull-left">
        <h1>Welcome <?php echo ucfirst(Yii::$app->user->identity->username); ?>!</h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo Yii::$app->request->hostInfo . Yii::$app->homeUrl; ?>?r=site/index" class="text-transparent">Dashboard</a></li>
            <li class="active"><a href="javascript:void(0)" class="text-transparent">Daily</a></li>
        </ol>
    </div>
</div>
<!--Page Content-->
<!-- Stats top row-->
<div class="row no-padding">
    <!--row 1, col 1-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel"  onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=products'" style="cursor: pointer">
            <div class="panel-body brand-info-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-file"></i></div></div>
                </div>
                <span id="new_products" class="big-text"></span>
                <input type="hidden" id="new_products_value" value="<?php echo $products_count ?>">
                <div class="stat text-transparent">
                    <h5>Products</h5>
                </div>
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-info"><strong>10<?php //echo $last_week_products ?></strong></span>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                    <span class="daily-stats-compare">10<?php //echo $product_percentage ?>%</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 1-->
    <!--row 1, col 2-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel"  onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=categories'" style="cursor: pointer">
            <div class="panel-body brand-primary-light-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-copy"></i></div></div>
                </div>
                <span id="pending_sops" class="big-text"></span>
                <input type="hidden" id="pending_sop_value" value="<?php echo $categories_count ?>">
                <div class="stat text-transparent">
                    <h5>Categories </h5>
                </div>
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent ">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-primary"><strong>10<?php //echo $last_week_pending_sops ?></strong></span>
                    </div>
                </div>
                <div class="pull-right">
                    <span class="icon-arrow-up text-transparent daily-stats-compare"></span>
                    <span class="daily-stats-compare">10<?php //echo $pendong_sop_percentage ?>%</span>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div><!--/ row 1, col 2-->
    <!--row 1, col 3-->
    <div class="col-md-3 col-sm-6 daily-stats">
        <div class="panel"  onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=vendors'" style="cursor: pointer">
            <div class="panel-body brand-info-bg text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-th-list"></i></div></div>
                </div>
                <span id="regular_vendors" class="big-text"></span>
                <input type="hidden" id="regular_vendors_value" value="<?php echo $regular_vendors_count ?>">
                <div class="stat text-transparent">
                    <h5>Regular Vendors </h5>
                </div>
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent ">Gold Vendors</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-info"><strong><?php echo $vendors_count-$regular_vendors_count; ?></strong></span>
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
        <div class="panel"  onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=architects'" style="cursor: pointer">
            <div class="panel-body brand-primary-light-bg  text-inverse">
                <div class="pull-left">
                    <div class="badge-circle daily-stat-left"><div class="big-text"><i class="icon-shopping-cart"></i></div></div>
                </div>
                <span id="new_reports" class="big-text"></span>
                <input type="hidden" id="new_reports_value" value="<?php echo $architects_count ?>">
                <div class="stat text-transparent">
                    <h5>Architects </h5>
                </div>
            </div>
            <div class="panel-footer white-bg">
                <div class="pull-left">
                    <h6 class=" text-transparent">Last Week</h6>
                    <div class="daily-stats-compare number">
                        <span class="text-primary"><strong>10<?php //echo $report_last_week ?></strong></span>
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
        <div class="panel panel-gray"  onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=leeds'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Leads</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:void(0)"  ><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="javascript:void(0)"  class="close-panel" ><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseOne" class="panel-body panel-collapse collapse in">
                <span id="new_leads" class="big-text"></span>
                <input type="hidden" id="new_leads_value" value="<?php echo $leeds_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=leeds"><small>Add New</small></a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=leeds"><i class="icon-circle-arrow-right icon-2x"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/basic panel-->

    <!--default panel-->
    <div class="col-md-3">
        <div class="panel panel-gray" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Shopping Lists</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  ><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" ><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseTwo" class="panel-body panel-collapse collapse in">
                <span id="new_shopping_list" class="big-text"></span>
                <input type="hidden" id="new_shopping_list_value" value="<?php echo $shopping_list_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>Search Now</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/default panel-->

    <!--primary panel-->
    <div class="col-md-3">
        <div class="panel panel-gray" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Clients</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;" data-toggle="collapse"  data-target="#collapseThree"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseThree" class="panel-body panel-collapse collapse in">
                <span id="new_normal_users" class="big-text"></span>
                <input type="hidden" id="new_normal_users_value" value="<?php echo $normal_users_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/primary panel-->

    <!--success panel-->
    <div class="col-md-3">
        <div class="panel panel-gray" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i> Pending Quotes:</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseFour"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseFour" class="panel-body panel-collapse collapse in">
                <span id="new_pending_qoutes" class="big-text"></span>
                <input type="hidden" id="new_pending_qoutes_value" value="<?php echo $pending_qoutes_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>Create New</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/success panel-->

</div><!--/ row 1-->
<!--Row 2-->
<div class="row">
    <!--info panel-->
    <div class="col-md-3">
        <div class="panel panel-primary" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Pending info req</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseFive"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseFive" class="panel-body panel-collapse collapse in">
                <span id="new_pending_info_req" class="big-text"><?php echo $pending_info_req_count ?></span>
                <input type="hidden" id="new_pending_info_req_value" value="<?php echo $pending_info_req_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/info panel-->

    <!--warning panel-->
    <div class="col-md-3">
        <div class="panel panel-warning" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Closed Quotes-Leads</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseSix"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseSix" class="panel-body panel-collapse collapse in">
                <span id="new_closed_quotes_leads" class="big-text"><?php echo $closed_quotes_leads_count ?></span>
                <input type="hidden" id="new_closed_quotes_leads_value" value="<?php echo $closed_quotes_leads_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/warning panel-->

    <!--danger panel-->
    <div class="col-md-3">
        <div class="panel panel-danger" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Closed Info Leads</h4></div>
                <div class="tools pull-right">

                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseSeven"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseSeven" class="panel-body panel-collapse collapse in">
                <span id="new_closed_info_leads" class="big-text"><?php echo $closed_info_leads_count ?></span>
                <input type="hidden" id="new_closed_info_leads_value" value="">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"></a><i class="icon-circle-arrow-right"></i></div>
            </div>
        </div><!--/panel-->
    </div><!--/danger panel-->

    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Total Quote requests</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
                <span id="new_total_quote_request" class="big-text"><?php echo $total_quote_request_count ?></span>
                <input type="hidden" id="new_total_quote_request_value" value="<?php echo $total_quote_request_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->

    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Total Info requests</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
                <span id="new_total_info_request" class="big-text"><?php echo $total_info_request_count ?></span>
                <input type="hidden" id="new_total_info_request_value" value="<?php echo $total_info_request_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->

    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Proces Shop Lists</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
                <span id="new_processed_shopping_list" class="big-text"><?php echo $proc_shopping_list_count ?></span>
                <input type="hidden" id="new_processed_shopping_list_value" value="<?php echo $proc_shopping_list_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->

    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=user-shopping-list'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>UnProces Shop Lists</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
                <span id="new_unprocessed_shopping_list" class="big-text"><?php echo $unproc_shopping_list_count ?></span>
                <input type="hidden" id="new_unprocessed_shopping_list_value" value="<?php echo $unproc_shopping_list_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><small>View All</small> </a>
                <div class="pull-right"><a href="<?php echo Yii::$app->homeUrl; ?>?r=user-shopping-list"><i class="icon-circle-arrow-right"></i></a></div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->
    <!--gray panel-->
    <div class="col-md-3">
        <div class="panel panel-info" onclick="window.location.href='<?php echo Yii::$app->request->getBaseUrl(true)?>/?r=manufacturers'" style="cursor: pointer">
            <div class="panel-heading">
                <div class="pull-left"><h4><i class="icon-th-large"></i>Manufacturers</h4></div>
                <div class="tools pull-right">
                    <a href="javascript:;"  data-toggle="collapse"  data-target="#collapseEight"><i class="icon-chevron-down text-transparent"></i></a>
                    <a href="#"  class="close-panel" data-dismiss="panel" aria-hidden="true"><i class="icon-remove text-transparent"></i></a>
                </div>
                <div class="clearfix"></div>
            </div>
            <div id="collapseEight" class="panel-body panel-collapse collapse in">
                <span id="new_manufacturers" class="big-text"><?php echo $manufacturers_count ?></span>
                <input type="hidden" id="new_manufacturers_value" value="<?php echo $manufacturers_count ?>">
            </div>
            <div class="panel-footer">
                <a href="<?php echo Yii::$app->homeUrl; ?>?r=manufacturers"><small>View All</small> </a>
                <div class="pull-right">
                    <a href="<?php echo Yii::$app->homeUrl; ?>?r=manufacturers">
                        <i class="icon-circle-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div><!--/panel-->
    </div><!--/gray panel-->
</div><!--/ row 2-->