<?php
use dosamigos\fileupload\FileUploadUI;
use backend\models\Projects;
use backend\models\ShoppingListItems;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
$this->title = 'Welcome | Vendor';?>
<div class="banner-vendors">
<img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('cover');?>" width="100%">

</div>
<div class="container">
   <div class="main-profile-round-img">
       <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('logo');?>">
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
         <img src="<?php echo $themeUrl;?>/img/stars-icon.png">
   </div>
</div>
<div class="container">
     <div class="main-body-section">
         <div class="row">
            <div class="col-md-12">
                <ul class="summary-list pull-left nav nav-pills">
                    <li class="active"><a  href="#summry"   data-toggle="pill">SUMMARY</a></li>
                    <li><a href="#profile" data-toggle="pill">PROFILE</a></li>
                    <li><a href="#dashboard" data-toggle="pill">  LEADS DASHBOARD </a></li>
                    <li><a href="#projects" data-toggle="pill">     PRODUCTS </a></li>
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
                                 <h2 class="main-inner-heading">Collections by <?php echo $model->getAttribute('username');?></h2>
                             </div>
                             <?php
                             if($VendorProductmodel) {
                                 $pro_count=1;
                                 foreach ($VendorProductmodel as $row) {
                                     ?>
                                     <div class="col-md-4">
                                         <div class="multi-product-view multi-product-view-referrer col-md-12">
                                             <h3><?= $row->name ?></h3>
                                             <p><?= $row->description ?> </p>
                                             <div class="multi-product-img">
                                                 <div class="row">
                                                     <div class="col-md-12 m-bottom-23">
                                                         <img class="dimension_242_165" src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= $row->featured_image ?>" width="100%">
                                                     </div>
                                                     <?php $count =1; foreach($row->relatedRecords['productPictures'] as $related){
                                                         if($row->featured_image!=$related->file)
                                                         {
                                                             ?>
                                                             <div class="<?php if($count==1){?>col-md-6 right-padding-10<?php } else{?>col-md-6 left-padding-10 m-bottom-23 <?php }?>">
                                                                 <img class="dimension_106_94" src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= $related->file ?>" width="100%">
                                                             </div>
                                                             <?php
                                                             $count++;
                                                         }
                                                         if($count==3)
                                                         { break;}
                                                     }?>
                                                 </div>
                                             </div>
                                             <div class="multi-product-bottom-links col-md-12">
                                                 <div class="col-md-6"><span class="date-to">2008-2012</span></div>
                                                 <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a>
                                                     <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>
                                     <?php
                                     $pro_count++;
                                     if($pro_count==4)
                                     { break;}
                                 }
                             }
                             else
                             {?>
                                 <div class="col-md-4">
                                     <div class="multi-product-view multi-product-view-referrer col-md-12">
                                         <h3>No Product uploaded</h3>
                                         <p> Amsterdam, Netherland </p>
                                         <div class="multi-product-bottom-links col-md-12">
                                             <div class="col-md-6"><span class="date-to">2008-2012</span></div>
                                             <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
                                         </div>
                                     </div>
                                 </div>
                             <?php }?>
                             <div class="col-md-12 text-right">
                                 <p class="btn-see-all"> <a href="#">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
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
                                         if($VendorInfomodel) {
                                             foreach ($VendorInfomodel as $row) {
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
                                     <th>Status</th>
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
                                             <td><?php echo str_replace(" ", "&nbsp;", date("d M y", strtotime($row->relatedRecords['leeds']->date_created)));?></td>
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
                             <h1 class="posted-lead-heading">Products Leads <span> </span></h1>
                             <table width="100%" >
                                 <tr>
                                     <th>Product </th>
                                     <th>Category</th>
                                     <th>Quantity</th>
                                     <th>Customer</th>
                                     <th>Date</th>
                                     <th>Status</th>
                                 </tr>

                                 <?php
                                 if($ShoppingListItems) {
                                     foreach ($ShoppingListItems as $row) {
                                         ?>
                                         <tr>
                                             <td>
                                                 <img src="<?php echo Yii::$app->request->getBaseUrl(true)."/uploads/products-images/".$row->relatedRecords['products']->id."/".$row->relatedRecords['products']->featured_image;?>" style="width: 100px;height: 100px;border-radius: 50px;">
                                                 <span><?php echo $row->relatedRecords['products']->name?></span>
                                             </td>
                                             <td><?php echo ShoppingListItems::getCategory($row->relatedRecords['products']->product_categories_id,'category');?></td>
                                             <td><?php echo $row->quantity?></td>
                                             <td><?php echo $row->relatedRecords['user']->username?></td>
                                             <td><?php echo str_replace(" ", "&nbsp;", date("d M y", strtotime($row->date_created)));?></td>
                                             <td><?php if( $row->status ==1){ echo "Processed"; } else {echo "Pending";}?></td>
                                         </tr>
                                     <?php }
                                 }
                                 else
                                 {?>
                                     <tr>
                                         <td colspan="8">No Product assigned.</td>
                                     </tr>
                                 <?php }?>


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
                                 <h2 class="main-inner-heading">My Products</h2>
                             </div>
                             <div class="col-md-3" style="display: none">
                                 <div class="multi-product-view add-new-prd"> <a href="#"> <img src="<?php echo $themeUrl;?>/img/add-new-prd.jpg"> </a> </div>
                             </div>
                             <?php
                             if($VendorProductmodel) {
                                 $pro_count=0;
                                 foreach ($VendorProductmodel as $row) {
                                     ?>
                                     <?php if($pro_count%4==0 && $pro_count!=0 ){ echo "<div style='clear:both; height: 30px;'></div> ";} ?>
                                     <div class="col-md-3">
                                         <div class="multi-product-view">
                                             <h3><?= $row->name ?></h3>
                                             <p><?= substr($row->description,0,25) ?></p>
                                             <div class="image-div">
                                                 <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= pathinfo($row->featured_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($row->featured_image, PATHINFO_EXTENSION) ?>">
                                             </div>
                                         </div>
                                         <div class="view-edi-dtl-btn col-md-12">
                                             <ul>
                                                 <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                 <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a></li>
                                                 <li><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a></li>
                                             </ul>
                                         </div>
                                     </div>
                                     <?php
                                     $pro_count++;
                                 }
                             }
                             else
                             {
                                 ?>
                                 <div class="col-md-3">
                                     <div class="multi-product-view">
                                         <h3>No Product </h3>
                                         <p>Found </p>
                                         <img src="<?php echo $themeUrl;?>/img/no-image-icon-158_87.jpg"> <div class="view-edi-dtl-btn col-md-12">
                                             <ul>
                                                 <li><a href="#"><i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                 <li><a href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit </a></li>
                                                 <li><a href="#"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete </a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                                 <?php
                             }
                             ?>


                         </div>
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
                    <div class="col-md-6 like-detail-lisnk"><a href="#">
                            <img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a>
                        <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a>
                    </div>
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
                    <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a>
                    </div>
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
                    $('#category').val(data.category);
                    $('#keywords').val(data.keywords);
                    $('#starting_year').val(data.starting_year);
                    $('#ending_year').val(data.ending_year);
                    $('#country').val(data.country);
                    $('#website').val(data.website);
                    $('#new_project_id').val(project_id);
                    jQuery('#projectpictures-file-fileupload').fileupload({
                        "maxFileSize": 2000000,
                        "url": "<?php echo $site_base_url;?>/index.php?r=site%2Fproject-image-upload&prod_id=" + project_id
                    });
                    if (data.proj_img != 'images not found') {
                        var table_mockup = '<table role="presentation" class="table table-striped"><tbody class="files">';
                        //foreach(data.result.proj_img as project_image)
                        $.each(data.proj_img, function (i, project_image) {
                            table_mockup += '<tr class="template-download fade in proj_img_'+project_image.ID+'"><td><span class="preview"><img src="uploads/projects-images/' + project_id + '/' + project_image.file + '"></span></td><td><p class="name">' + project_image.file + '</p></td><td><span class="size">'+project_image.image_size+' KB</span></td><td><a href="javascript:void(0)" class="btn btn-danger delete" onclick="project_image_delete(&#39;' + project_image.file + '&#39;,&#39;' + project_id + '&#39;,&#39;' + project_image.ID + '&#39;)"> <i class="glyphicon glyphicon-trash"></i><span>Delete</span></a></td></tr>';
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
</script>