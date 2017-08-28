<?php
use dosamigos\fileupload\FileUploadUI;
use backend\models\Projects;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
$this->title = 'Welcome | Vendor';?>
<!--<div class="container">
    <div class="main-profile-round-img"> <img src="<?php /*echo $themeUrl */?>/img/profile-logo.jpg"> <img src="<?php /*echo $themeUrl */?>/img/star-icon.png" class="star-icon"> </div>
    <div class="main-profile-cotent">
        <h2>Crete Sol</h2>
        <p>Construction and material industry <br>
            Islamabad, Pakistan</p>
        <img src="<?php /*echo $themeUrl */?>/img/stars-icon.png"> </div>
</div>-->
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <ul class="summary-list pull-left nav nav-pills">
                <li class="active"><a  href="#my_projects" data-toggle="pill">My Projects</a></li>
                <li><a href="#my_qoutes" data-toggle="pill">My Qoutes</a></li>
                <li><a href="#my_shopping_list" data-toggle="pill">My Shopping Lists</a></li>
                <li><a href="#my_favorites" data-toggle="pill">My favorites</a></li>
            </ul>
        </div>
    </div>
    <div class="tab-content">
        <div id="my_projects" class="tab-pane fade in active">
    <?php
    $count=1;
    if($LeedAssignments) {
        foreach ($LeedAssignments as $row) {
            ?>
            <div class="row row-my-project <?php if($count ==1){?> row-top-bottom-mrg<?php }?>">
                <div class="col-md-3">
                    <div class="buyer-project-img"> <img src="<?php echo $themeUrl ?>/img/banjaiga-demi.jpg" width="100%"> </div>
                </div>
                <div class="col-md-9">
                    <h2 class="my-project-detail-heading"><?php echo $row->project_type?> <span>Awaiting Match</span></h2>
                    <div class="row">
                        <div class="col-md-5">
                            <table width="100%" border="0" class="my-project-table-detail">
                                <tr>
                                    <td width="46%" height="25"><b>Post Date    </b></td>
                                    <td width="54%"><?php echo str_replace(" ", "&nbsp;", date("d M y", strtotime($row->date_created)));?></td>
                                </tr>
                                <tr>
                                    <td height="25"><b>Location </b></td>
                                    <td> <?php echo $row->location?></td>
                                </tr>
                                <tr>
                                    <td height="35"><b>Finish Type</b></td>
                                    <td><?php echo $row->finish_type?> </td>
                                </tr>
                                <tr>
                                    <td height="25"><b>Building Size</b></td>
                                    <td> <?php echo $row->building_size?></td>
                                </tr>
                                <tr>
                                    <td height="25"><b>Service</b></td>
                                    <td><?php echo $row->service_required?></td>
                                </tr>
                                <tr>
                                    <td><b>Style</b></td>
                                    <td> Contemporary</td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-md-7 edit-delete-btn"> <a href="#" class="edit-table-btn">Edit Project</a> <a href="#" class="delete-table-btn">Delete</a> </div>
                    </div>
                </div>
            </div>
        <?php
            $count++;
        }
    }
    else
    {
    ?>
        <div class="row row-my-project row-top-bottom-mrg">
            <h2 class="my-project-detail-heading">No Leads.</h2>
        </div>
    <?php
    }?>
        </div>
        <div id="my_qoutes" class="tab-pane fade">
            <h1>My Qoutes</h1>
        </div>
        <div id="my_shopping_list" class="tab-pane fade">
            <h1>My Shopping Lists</h1>
        </div>
        <div id="my_favorites" class="tab-pane fade">
            <h1>My favorites</h1>
        </div>
    </div>
</div>