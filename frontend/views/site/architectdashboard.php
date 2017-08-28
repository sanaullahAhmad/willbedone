<?php
use dosamigos\fileupload\FileUploadUI;
use backend\models\Projects;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
$this->title = 'Welcome | Architect';?>
<div class="banner-vendors">
<img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/architects/<?php echo $architect_id;?>/<?php echo $profilemodel->getAttribute('cover');?>" width="100%">

</div>
<div class="container">
   <div class="main-profile-round-img">
       <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/architects/<?php echo $architect_id;?>/<?php echo $profilemodel->getAttribute('logo');?>">
       <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="star-icon">
   </div>
   <div class="main-profile-cotent">
       <h2>
           <?php if($model->getAttribute('username') !=''){?>
               <?php echo $model->getAttribute('username');?>
           <?php }else{?>
               Crete Sol
           <?php }?>
       </h2>
       <p><?php echo substr($profilemodel->getAttribute('about'),0, 35);?> <br/>
           <?php echo $profilemodel->getAttribute('city');?>, <?php echo $profilemodel->getAttribute('country');?></p>
         <img src="<?php echo $themeUrl;?>/img/stars.png">
   </div>
</div>
<div class="container">
     <div class="main-body-section">
          <div class="row">
            <div class="col-md-12">
                <ul class="summary-list pull-left nav nav-pills">
                    <li class="active" ><a href="#summry"   data-toggle="pill">SUMMARY</a></li>
                    <li><a href="#profile" data-toggle="pill">PROFILE</a></li>
                    <li><a href="#dashboard" data-toggle="pill">  LEADS DASHBOARD </a></li>
                    <li><a href="#projects" data-toggle="pill">     PROJECTS </a></li>
                    <li><a href="#referals" data-toggle="pill">   REFFERALS    </a></li>
                </ul>
                <p class="pull-right rs-left">
                    <a href="#" class="btn btn-default btn-standard">Request Change</a>
                </p>
            </div>
          </div>
         <div class="tab-content">
             <div id="summry" class="tab-pane fade in active">
                  <div class="row row-top-bottom-mrg">
                      <div class="col-md-3">
                          <div class="summary-card-box">
                            <div class="summary-card-background">
                                <div class="summary-card-round-img">
                                    <img src="<?php echo $themeUrl;?>/img/eyes-icon.png">
                                </div>
                            </div>
                            <h1 class="summary-card-main-hadding">23,056</h1>
                            <p class="total-view">total Profile Views</p>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="summary-card-box">
                            <div class="summary-card-background">
                                <div class="summary-card-round-img">
                                    <img src="<?php echo $themeUrl;?>/img/hand-icon.png">
                                </div>
                            </div>
                            <h1 class="summary-card-main-hadding">23,056</h1>
                            <p class="total-view">total Profile Views</p>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="summary-card-box">
                            <div class="summary-card-background">
                                <div class="summary-card-round-img">
                                    <img src="<?php echo $themeUrl;?>/img/download-icon.png">
                                </div>
                            </div>
                            <h1 class="summary-card-main-hadding">23,056</h1>
                            <p class="total-view">total Profile Views</p>
                          </div>
                      </div>
                      <div class="col-md-3">
                          <div class="summary-card-box">
                            <div class="summary-card-background">
                                <div class="summary-card-round-img">
                                    <img src="<?php echo $themeUrl;?>/img/pad-icon.png">
                                </div>
                            </div>
                            <h1 class="summary-card-main-hadding">23,056</h1>
                            <p class="total-view">total Profile Views</p>
                          </div>
                      </div>
                  </div>
                  <div class="product-sale">
                    <img src="<?php echo $themeUrl;?>/img/product-sale.jpg" width="100%">
                  </div>
                  <div class="row">
                    <div class="col-md-5 product-detail-view">
                        <h3>Details</h3>
                        <ul>
                            <li>Main Profile Interations   <span>  5674</span></li>
                            <li>Clicks on Address <span>  1500</span></li>
                            <li>Clicks on Quotes  <span>   34550 </span></li>
                            <li>Number of Quotes   <span>   456</span></li>
                        </ul>
                    </div>
                  <div class="col-md-2"></div>
                  <div class="col-md-5 product-detail-view">
                  <h3 class="detail-heading-offset"></h3>
                  <ul>
                      <li> PDF Downloading  <span>  435</span></li>
                      <li>Products Interactions <span>  9566</span></li>
                      <li>Average Time Per User<span>     00h 10m 20s </span></li>
                      <li>Total Time<span>     09h 40m 70s</span></li>
                  </ul>
                  </div>

                  </div>
                  <div class="row multi-product-row">
          <div class="col-md-12">
          <h1 class="multi-product-main-heading">Top Selling Products</h1>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view">
            	<h3>Buds 2 table lamp</h3>
                <p>Foscarini  </p>
                <img src="<?php echo $themeUrl;?>/img/multi-pr1.jpg">
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view">
            	<h3>Chelsea Sofa </h3>
                <p>Molteni & C </p>
                <img src="<?php echo $themeUrl;?>/img/multi-pr2.jpg">
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view">
            	<h3>Creed Small Armchair</h3>
                <p>Minotti  </p>
                <img src="<?php echo $themeUrl;?>/img/multi-pr3.jpg">
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view">
            	<h3>Stylish Kitchen Hobs</h3>
                <p>Crete Sol  </p>
                <img src="<?php echo $themeUrl;?>/img/multi-pr4.jpg">
            </div>
          </div>
          </div>
             </div>
             <div id="profile" class="tab-pane fade ">
                 <div class="row row-top-bottom-mrg">
                     <div class="col-md-9" style="padding-left: 0px;">
                         <div class="about-detail">
                             <h2 class="main-inner-heading">About <?php echo $model->getAttribute('username');?></h2>
                             <p id="companyDetails"><?php echo $profilemodel->getAttribute('about');?></p>
                         </div>
                         <div class="row row-about-products">
                             <div class="col-md-12">
                                 <h2 class="main-inner-heading">Projects by <?php echo $model->getAttribute('username');?></h2>
                             </div>

                             <?php
                             if($userProjects) {
                                 $pro_count=0;
                                 foreach ($userProjects as $row) {
                                     ?>
                                     <?php if($pro_count%3==0 && $pro_count!=0){ echo "<div style='clear:both'></div>";} ?>
                                     <div class="col-md-4 <?php if($pro_count> 2){ echo "see-all-collections";} ?>">
                                         <div class="multi-product-view multi-product-view-referrer col-md-12">
                                             <h3><?= $row->title ?></h3>
                                             <p><?= $row->city.', '.\backend\models\Products::getinfo('id', $row->country, 'countries', 'country_name'); ?> &nbsp;</p>
                                             <div class="multi-product-img">
                                                 <div class="row">
                                                     <?php $count =1;
                                                     $thumb ="_494-336.";
                                                     foreach($row->relatedRecords['projectPictures'] as $related){
                                                         if($count!=1){ $thumb ="_436-384.";}
                                                         ?>
                                                         <div class="<?php if($count==1){?>col-md-12 m-bottom-23<?php }if($count==2){?>col-md-6 right-padding-10<?php } else{?>col-md-6 left-padding-10 m-bottom-23 <?php }?>">
                                                             <a  data-fancybox="gallery_<?= $row->id;?>" href="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/projects-images/<?php echo $row->id;?>/<?= $related->file?>">
                                                                 <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/projects-images/<?php echo $row->id;?>/<?= pathinfo($related->file, PATHINFO_FILENAME).$thumb.pathinfo($related->file, PATHINFO_EXTENSION)?>" width="100%">
                                                             </a>
                                                         </div>
                                                         <?php
                                                         $count++;
                                                         if($count==4)
                                                         { break;}
                                                     }?>
                                                 </div>
                                             </div>
                                             <div class="multi-product-bottom-links col-md-12 without-bc">
                                                 <div class="col-md-6"><span class="date-to"><?= $row->starting_year ?>-<?= $row->ending_year ?></span></div>
                                                 <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
                                             </div>
                                         </div>
                                     </div>
                                     <?php
                                     $pro_count++;
                                 }
                             }
                             ?>

                             <div class="col-md-12 text-right">
                                 <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-collections');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-3" style="padding-right: 0px;">
                         <div class="row row-information" style="padding-top: 40px;">
                             <div class="col-md-12">
                                 <div class="information-section">
                                     <h2>Information</h2>
                                     <ul class="information-section-list">
                                         <?php
                                         if($ArchitectInfomodel) {
                                             foreach ($ArchitectInfomodel as $row) {
                                                 ?>
                                                 <li class="active">
                                                     <h3><?= $row->title ?></h3>
                                                     <p><?= $row->description ?></p>
                                                 </li>
                                             <?php }
                                         }
                                         else
                                         {?>
                                             <li class="active">
                                                 <h3>No info added yet.</h3>
                                             </li>
                                         <?php }?>
                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
             <div id="dashboard" class="tab-pane fade ">
                 <div class="row row-top-bottom-mrg">
                     <div class="col-md-3">
                         <div class="row row-information">
                             <div class="col-md-12">
                                 <div class="information-section">
                                     <h2>My Categories</h2>
                                     <ul class="information-section-list hidden-style-img">
                                         <?php
                                         if($Categories) {
                                             foreach ($Categories as $row) {
                                                 ?>
                                                 <li class="active">
                                                     <h3><?= $row->category ?></h3>
                                                 </li>
                                             <?php }
                                         }
                                         else
                                         {?>
                                             <li class="active">
                                                 <h3>No Category added.</h3>
                                             </li>
                                         <?php }?>

                                     </ul>
                                 </div>
                             </div>
                         </div>
                     </div>
                     <div class="col-md-9">
                         <div class="posted-leads-table">
                             <h1 class="posted-lead-heading">Posted Leads <span> ( Realtime business opportunities presented to our members )</span></h1>
                             <table width="100%" >
                                 <tr>
                                     <th>Project</th>
                                     <th>Ref&nbsp;No.</th>
                                     <th>Location</th>
                                     <th>Size&nbsp;of&nbsp;Plot</th>
                                     <th>Servises&nbsp;Type</th>
                                     <th>Finishes</th>
                                     <th>Date</th>
                                     <th>Sattus</th>
                                 </tr>
                                 <?php
                                 if($LeedAssignments) {
                                     foreach ($LeedAssignments as $row) {
                                         ?>
                                         <tr>
                                             <td>
                                                 <img src="<?php echo $themeUrl."/img/"; echo ($row->relatedRecords['leeds']->lead_type=='Need Contractor')? 'table-prd1.png':'table-prd2.png';?>">
                                                 <span><?php echo $row->relatedRecords['leeds']->project_type?></span>
                                             </td>
                                             <td><?php echo $row->relatedRecords['leeds']->id?></td>
                                             <td><?php echo $row->relatedRecords['leeds']->location?></td>
                                             <td><?php echo $row->relatedRecords['leeds']->building_size?></td>
                                             <td><?php echo $row->relatedRecords['leeds']->service_required?></td>
                                             <td><?php echo $row->relatedRecords['leeds']->finish_type?></td>
                                             <td><?php echo str_replace(" ", "&nbsp;", date("d M y", strtotime($row->relatedRecords['leeds']->date_created)))?></td>
                                             <td><?php if( $row->relatedRecords['leeds']->status ==1){ echo "Active"; } else {echo "Inactive";}?></td>
                                         </tr>
                                     <?php }
                                 }
                                 else
                                 {?>
                                     <tr>
                                         <td colspan="8">No Leads assigned.</td>
                                     </tr>
                                 <?php }?>
                             </table>
                         </div>
                         <div class="posted-leads-table">
                             <h1 class="posted-lead-heading">Matched Leads <span> </span></h1>
                             <table width="100%" >
                                 <tr>
                                     <th>Project</th>
                                     <th>Ref  No.</th>
                                     <th>Location</th>
                                     <th>Size of Plot</th>
                                     <th>Servises Type</th>
                                     <th>Finishes</th>
                                     <th>Date</th>
                                     <th>Sattus</th>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img src="<?php echo $themeUrl;?>/img/table-prd1.png">
                                         <span>house</span>
                                     </td>
                                     <td>#12865</td>
                                     <td>Lahore</td>
                                     <td>10 Marla</td>
                                     <td>Design</td>
                                     <td>A+</td>
                                     <td>08 Mar 175</td>
                                     <td>Matched</td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img src="<?php echo $themeUrl;?>/img//table-prd2.png">
                                         <span>house</span>
                                     </td>
                                     <td>#12865</td>
                                     <td>Lahore</td>
                                     <td>10 Marla</td>
                                     <td>Design</td>
                                     <td>A+</td>
                                     <td>08 Mar 175</td>
                                     <td>Matched</td>
                                 </tr>
                                 <tr>
                                     <td>
                                         <img src="<?php echo $themeUrl;?>/img/table-prd1.png">
                                         <span>house</span>
                                     </td>
                                     <td>#12865</td>
                                     <td>Lahore</td>
                                     <td>10 Marla</td>
                                     <td>Design</td>
                                     <td>A+</td>
                                     <td>08 Mar 175</td>
                                     <td>Matched</td>
                                 </tr>
                             </table>
                         </div>
                     </div>
                 </div>
             </div>
             <div id="projects" class="tab-pane fade ">
                 <div class="row row-top-bottom-mrg">
                     <div class="col-md-12 projects-list">
                         <div class="row row-about-products row-achitect">
                             <div class="col-md-12">
                                 <h2 class="main-inner-heading">My Projects</h2>
                             </div>
                             <div class="col-md-3">
                                 <div class="multi-product-view multi-product-view-referrer col-md-12 add-new-project">
                                     <a href="javascript:void(0)" onclick="create_new_project()">
                                         <img src="<?php echo $themeUrl;?>/img/add-new-img.jpg" width="100%">
                                     </a>
                                 </div>
                             </div>
                             <?php
                             if($userProjects) {
                                 $pro_count=1;
                                 foreach ($userProjects as $row) {
                                     ?>
                                     <?php if($pro_count%4==0 ){ echo "<div class='row'> <div  class='col-md-12' style='margin-top: 30px;'></div></div>";} ?>
                                     <div class="col-md-3 poject_<?= $row->id ?>">
                                         <div class="multi-product-view multi-product-view-referrer col-md-12">
                                             <h3><?= $row->title ?></h3>
                                             <p><?= $row->city.', '.\backend\models\Products::getinfo('id', $row->country, 'countries', 'country_name'); ?>&nbsp;</p>
                                             <div class="multi-product-img">
                                                 <div class="row">
                                                     <?php $count =1;
                                                     $thumb ="_494-336.";
                                                     foreach($row->relatedRecords['projectPictures'] as $related){
                                                         if($count!=1){ $thumb ="_436-384.";}
                                                         ?>
                                                         <div class="<?php if($count==1){?>col-md-12 m-bottom-23<?php }if($count==2){?>col-md-6 right-padding-10<?php } else{?>col-md-6 left-padding-10 m-bottom-23 <?php }?>">
                                                             <a  data-fancybox="gallery_<?= $row->id;?>" href="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/projects-images/<?php echo $row->id;?>/<?= $related->file?>">
                                                                <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/projects-images/<?php echo $row->id;?>/<?= pathinfo($related->file, PATHINFO_FILENAME).$thumb.pathinfo($related->file, PATHINFO_EXTENSION)?>" width="100%">
                                                             </a>
                                                         </div>
                                                         <?php
                                                         $count++;
                                                         if($count==4)
                                                         { break;}
                                                     }?>
                                                 </div>
                                             </div>
                                             <div class="multi-product-bottom-links col-md-12 without-bc">
                                                 <div class="col-md-6"><span class="date-to"><?= $row->starting_year ?>-<?= $row->ending_year ?></span></div>
                                                 <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
                                             </div>
                                             <div class="view-edi-dtl-btn col-md-12">
                                                 <ul>
                                                     <li><a href="javascript:void(0)"><i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                     <li><a href="javascript:void(0)" onclick="edit_project(<?= $row->id ?>)"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a></li>
                                                     <li><a href="javascript:void(0)" onclick="delete_project(<?= $row->id ?>)"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a></li>
                                                 </ul>

                                             </div>
                                         </div>
                                     </div>
                                     <?php
                                     $pro_count++;
                                 }
                             }
                             ?>

                         </div>
                     </div>
                     <div class="col-md-12 create-project" style="display: none;">
                         <form form method="post">
                             <div class="posted-leads-table">
                                 <h1 class="posted-lead-heading">Add New Project</h1>
                                 <div class="row row-add-new-pord-input">
                                     <div class="col-md-8">
                                         <input name="title" id="title" type="text" placeholder="Project Name or Title" class="add-new-pord-input">
                                     </div>
                                     <div class="col-md-4">
                                         <div class="styled-select">
                                             <select name="category" id="category">
                                                 <option>Category</option>
                                                 <?php
                                                 if($Categories)
                                                 {
                                                     foreach ($Categories as $category)
                                                     {
                                                         ?>
                                                         <option value="<?php echo $category->id;?>"><?php echo $category->category;?></option>
                                                         <?php
                                                     }
                                                 }
                                                 ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row row-add-new-pord-input">
                                     <div class="col-md-4">
                                         <div class="styled-select">
                                             <select name="starting_year" id="starting_year">
                                                 <option>Starting Year</option>
                                                 <?php
                                                 for($i=2000; $i<=2017; $i++)
                                                 {
                                                     ?>
                                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                     <?php
                                                 }
                                                 ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="styled-select">
                                             <select name="ending_year" id="ending_year">
                                                 <option>Ending Year</option>
                                                 <?php
                                                 for($i=2000; $i<=2025; $i++)
                                                 {
                                                     ?>
                                                     <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                     <?php
                                                 }
                                                 ?>
                                             </select>
                                         </div>
                                     </div>
                                     <div class="col-md-4">
                                         <div class="styled-select">
                                             <select name="country" id="country">
                                                 <option value="">Country</option>
                                                 <?php
                                                 if($Countries)
                                                 {
                                                     foreach ($Countries as $country)
                                                     {
                                                         ?>
                                                         <option value="<?php echo $country->id;?>"><?php echo $country->country_name;?></option>
                                                         <?php
                                                     }
                                                 }
                                                 ?>
                                             </select>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row row-add-new-pord-input">
                                     <div class="col-md-8">
                                         <input name="keywords" id="keywords" type="text" placeholder="Keywords (separated by commas)" class="add-new-pord-input">
                                         <span class="max-value">Maximum 5 tags</span> </div>
                                     <div class="col-md-4">
                                         <input name="city" id="city" type="text" placeholder="City" class="add-new-pord-input">
                                     </div>
                                 </div>
                                 <div class="row row-add-new-pord-input">
                                     <div class="col-md-12">
                                         <div class="upload-file-border col-md-12">
                                             <div class="upload-file-form">
                                                 <div class="upload-file-img">
                                                     <img src="<?php echo $themeUrl;?>/img/upload-file.jpg">
                                                 </div>
                                                 <div class="col-md-12 text-center">
                                                     <?php
                                                     $prjid=1;
                                                     $prj = Projects::find()->orderBy('id DESC')->one();
                                                     if($prj)
                                                     {
                                                         $prjid=$prj->id+1;
                                                     }
                                                     echo '<input type="hidden" id="new_project_id" name="new_project_id" value="'.$prjid.'">';
                                                     ?>
                                                     <?= FileUploadUI::widget([
                                                         'model'         => $ProjectPicturesmodel,
                                                         'attribute'     => 'file',
                                                         'url'           => ['site/project-image-upload', 'prod_id' => $prjid], // your url, this is just for demo purposes,
                                                         'gallery'       => false,
                                                         'fieldOptions'  => [
                                                             'accept'    => 'image/*'
                                                         ],
                                                         'clientOptions' => [
                                                             'maxFileSize' => 2000000
                                                         ],
                                                         // ...
                                                         'clientEvents' => [
                                                             'fileuploaddone' => 'function(e, data) {
                                                                             console.log(e);
                                                                             console.log(data);
                                                                             var picid = data.result.files[0].id;
                                                                             setTimeout(function(){ 
                                                                                var desc = $("#projectpictures-file-fileupload table tr p.name a");
                                                                                $("#projectpictures-file-fileupload table tr p.name a").each(function(){
                                                                                    if($(this).attr("href")==data.result.files[0].url)
                                                                                    {
                                                                                        $(this).parent().replaceWith("<input type=text class=form-control name=description["+picid+"] >");
                                                                                    }
                                                                                });
                                                                              }, 3000);
                                                                         }',
                                                             'fileuploadfail' => 'function(e, data) {
                                                                              console.log(e);
                                                                              console.log(data);
                                                                         }',
                                                         ],
                                                     ]); ?>

                                                 </div>
                                             </div>
                                         </div>
                                         <div id="proj_img_table"></div>
                                     </div>
                                     <div class="col-md-12">
                                         <a class="btn btn-default pull-right" href="javascript:void(0)" onclick="$('.projects-list').show();$('.create-project').hide();" style="margin-top: 15px;margin-left: 15px;background-color: #e6e6e6; border-color: #adadad;">Cancel</a>
                                         <button class="btn btn-success pull-right" style="margin-top: 15px;">Submit</button>
                                     </div>
                                 </div>
                             </div>
                         </form>
                     </div>
                 </div>
             </div>
             <div id="referals" class="tab-pane fade ">
                 <div class="row row-top-bottom-mrg">
                    <h3>Referals</h3>
                 </div>
             </div>
         </div>

          <div class="row multi-product-row">
              <div class="col-md-12">
                <h1 class="multi-product-main-heading">Most Viewed Products</h1>
              </div>
              <div class="col-md-3">
                <div class="multi-product-view">
                    <h3>Living Room</h3>
                    <p>Zurich, Switzerland  </p>
                    <img src="<?php echo $themeUrl;?>/img/multi-pr5.jpg">
                </div>
              </div>
              <div class="col-md-3">
                <div class="multi-product-view">
                    <h3>Hip House</h3>
                    <p>Eupen, Belgium  </p>
                    <img src="<?php echo $themeUrl;?>/img/multi-pr6.jpg">
                </div>
              </div>
              <div class="col-md-3">
                <div class="multi-product-view">
                    <h3>Villa Pu</h3>
                    <p>Amsterdam, Netherland  </p>
                    <img src="<?php echo $themeUrl;?>/img/multi-pr7.jpg">
                </div>
              </div>
              <div class="col-md-3">
                <div class="multi-product-view">
                    <h3>Rough Tiles</h3>
                    <p>Amsterdam, Netherland  </p>
                    <img src="<?php echo $themeUrl;?>/img/multi-pr8.jpg">
                </div>
              </div>
          </div>
          
          <div class="row most-product-row">
          <div class="col-md-12">
          <h1 class="multi-product-main-heading">Most Viewed Products</h1>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round">
            <img src="<?php echo $themeUrl;?>/img/multi-star-img1.jpg" width="100%">
            <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="multi-star-img">
            
            </div>
            	<h3>Living Room</h3>
                <p>Zurich, Switzerland  </p>
             <div class="multi-product-bottom-links col-md-12">
            <div class="col-md-6"><span class="date-to">2008-2012</span></div>
            <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view multi-product-view-referrer col-md-12">
                <div class="multi-product-view-round">
                <img src="<?php echo $themeUrl;?>/img/multi-star-img2.jpg" width="100%">
              
                </div>
            	<h3>Michel John</h3>
                <p>Zurich, Switzerland</p>
             <div class="multi-product-bottom-links col-md-12">
            <div class="col-md-6"><span class="date-to">2008-2012</span></div>
            <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round">
            <img src="<?php echo $themeUrl;?>/img/multi-star-img3.jpg" width="100%">
            <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="multi-star-img">
            
            </div>
            	<h3>Wander Jackson</h3>
                <p>Zurich, Switzerland  </p>
             <div class="multi-product-bottom-links col-md-12">
            <div class="col-md-6"><span class="date-to">2008-2012</span></div>
            <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
            </div>
          </div>
          <div class="col-md-3">
          	<div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round">
            <img src="<?php echo $themeUrl;?>/img/multi-star-img4.jpg" width="100%">
            <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="multi-star-img">
            
            </div>
            	<h3>Nile John</h3>
                <p>Zurich, Switzerland  </p>
             <div class="multi-product-bottom-links col-md-12">
            <div class="col-md-6"><span class="date-to">2008-2012</span></div>
            <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
            </div>
          </div>
         </div>
       </div>
     </div>
<script>
    function create_new_project()
    {
        $('.projects-list').hide();
        $('.create-project').show();
        $.ajax({
            type: "POST",
            url: "<?php echo $site_base_url;?>/index.php?r=site/create-new-project",
            dataType: 'json',
            success: function (data)
            {
                $('#new_project_id').val(data.project_id);
            }
        });
    }
    function edit_project(project_id)
    {
        $('.projects-list').hide();
        $('.create-project').show();
        var url = "<?php echo $site_base_url;?>/index.php?r=site/edit-project";
        var all_data = {
            project_id: project_id,
        };
        $.ajax({
            type: "POST",
            url: url,
            data: all_data,
            dataType: 'json',
            success: function (data) {
                if (data.result == 'project found') {
                    $('#title').val(data.title);
                    $('#country').val(data.country);
                    $('#city').val(data.city);
                    $('#category').val(data.category);
                    $('#keywords').val(data.keywords);
                    $('#new_project_id').val(project_id);
                    $('#ending_year').val(data.ending_year);
                    $('#starting_year').val(data.starting_year);
                    jQuery('#projectpictures-file-fileupload').fileupload({
                        "maxFileSize": 2000000,
                        "url": "<?php echo $site_base_url;?>/index.php?r=site%2Fproject-image-upload&prod_id=" + project_id
                    });
                    if (data.proj_img != 'images not found') {
                        var table_mockup = '<table role="presentation" class="table table-striped"><tbody class="files">';
                        //foreach(data.result.proj_img as project_image)
                        $.each(data.proj_img, function (i, project_image) {
                            table_mockup += '<tr class="template-download fade in proj_img_'+project_image.ID+'"><td><span class="preview"><img src="uploads/projects-images/' + project_id + '/' + project_image.file + '"></span></td><td><input type="text" class="form-control" name="description['+project_image.ID+']" value="' + project_image.description + '" /></td><td><span class="size">'+project_image.image_size+' KB</span></td><td><a href="javascript:void(0)" class="btn btn-danger delete" onclick="project_image_delete(&#39;' + project_image.file + '&#39;,&#39;' + project_id + '&#39;,&#39;' + project_image.ID + '&#39;)"> <i class="glyphicon glyphicon-trash"></i><span>Delete</span></a></td></tr>';
                        });
                        table_mockup += '</tbody></table>';
                        $("#proj_img_table").html(table_mockup);
                    }
                }
            }
        });
    }
    function delete_project(project_id)
    {
        if (confirm("Are you sure?") == true) {
            var url = "<?php echo $site_base_url;?>/index.php?r=site/delete-project";
            var all_data = {
                project_id: project_id,
            };
            $.ajax({
                type: "POST",
                url: url,
                data: all_data,
                dataType: 'json',
                success: function (data)
                {
                    $('.poject_'+project_id).remove();
                }
            });
            return true;
        } else {
            return false;
        }
    }
    function project_image_delete(file, prod_id, id)
    {
        if (confirm("Are you sure?") == true) {
            var url = "<?php echo $site_base_url;?>/index.php?r=site/project-image-delete&name="+file+"&prod_id="+prod_id;
            var all_data = {
                prod_id: prod_id,
                file: file,
            };
            $.ajax({
                type: "POST",
                url: url,
                data: all_data,
                dataType: 'json',
                success: function (data)
                {
                    $('.proj_img_'+id).remove();
                }
            });
            return true;
        } else {
            return false;
        }
    }
    function toggle_class(myclass) {
        $('.'+myclass).toggle();
    }
</script>