<?php
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga | Architect';?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="vendor-profile-list">
        <li><a href="#">Overview  </a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">Manufacturers       </a></li>
        <li><a href="#">Reviews</a></li>
       
      </ul>
    </div>
  </div>
  <div class="banner-vendors">
      <?php if($profilemodel->getAttribute('cover') !=''){?>
          <img  src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/architects/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('cover');?>" width="100%">
      <?php }else{?>
          <img src="<?php echo $themeUrl; ?>/img/profile-background.jpg" width="100%">
      <?php }?>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="main-profile-round-img">
          <?php if($profilemodel->getAttribute('logo') !=''){?>
              <img  src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/architects/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('logo');?>" width="100%">
          <?php }else{?>
              <img src="<?php echo $themeUrl; ?>/img/profile-logo.jpg">
          <?php }?>
          <img src="<?php echo $themeUrl; ?>/img/star-icon.png" class="star-icon">
      </div>
      <div class="main-profile-cotent">
        <h2> <?php if($model->getAttribute('username') !=''){?>
                <?php echo $model->getAttribute('username');?>
            <?php }else{?>
                Wanders Jackson
            <?php }?>
        </h2>
        <p><?php echo substr($profilemodel->getAttribute('about'),0, 35);?><br>
            <?php echo $profilemodel->getAttribute('city');?>, <?php echo $profilemodel->getAttribute('country');?></p>
        </div>
      <div class="btn-socail-profile-view">
          <ul class="socail-links-view">
              <li>
                  <a href="javacript:void(0)" data-toggle="popover" data-trigger="focus" data-content="<?php echo $profilemodel->getAttribute('address');?><?php if($VendorPhoneNumbersmodel) { foreach ($VendorAddressmodel as $row) { echo ",<br />".$row->address; }  }?>" data-html="true" data-placement="bottom"  title="Address">
                      <img src="<?php echo $themeUrl;?>/img/social-map-icon.png" alt="">
                  </a>
              </li>
              <li>
                  <a href="javacript:void(0)" data-toggle="popover" data-trigger="focus" data-content="<?php echo $model->getAttribute('email');?>" data-placement="bottom" title="Email">
                      <img src="<?php echo $themeUrl;?>/img/social-envelope-icon.png" alt="">
                  </a>
              </li>
              <li>
                  <a href="javacript:void(0)" data-toggle="popover" data-trigger="focus" data-content="<?php echo "<a href='tel:".$profilemodel->getAttribute('phone')."'>".$profilemodel->getAttribute('phone');?></a><?php if($VendorPhoneNumbersmodel) { foreach ($VendorPhoneNumbersmodel as $row) { echo ",<br /><a href='tel:".$row->phone_number."'>".$row->phone_number.'</a>'; }  }?>" data-html="true" data-placement="bottom" title="Phone">
                      <img src="<?php echo $themeUrl;?>/img/social-phone-icon.png" alt="">
                  </a>
              </li>
              <li>
                  <a data-toggle="popover" data-trigger="focus" data-content="<?php echo $profilemodel->getAttribute('website');?>" data-placement="bottom" href="<?php echo $profilemodel->getAttribute('website');?>" title="Website" target="_blank">
                      <img src="<?php echo $themeUrl;?>/img/social-web-icon.png" alt="">
                  </a>
              </li>
          </ul>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-md-9">
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
                          <p><?= $row->keywords ?> </p>
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
          else
          {
          ?>
              <div class="col-md-12"> <h4>No Projects.</h4></div>
              <?php
          }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-collections');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      <div class="row row-about-products" style="display: none;">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Products by <?php echo $model->getAttribute('username');?></h2>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view">
            <h3>Buds 2 table lamp</h3>
            <p>Foscarini </p>
            <img src="<?php echo $themeUrl; ?>/img/multi-pr1.jpg"> </div>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view">
            <h3>Chelsea Sofa </h3>
            <p>Molteni &amp; C </p>
            <img src="<?php echo $themeUrl; ?>/img/multi-pr2.jpg"> </div>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view">
            <h3>Creed Small Armchair</h3>
            <p>Minotti </p>
            <img src="<?php echo $themeUrl; ?>/img/multi-pr3.jpg"> </div>
        </div>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="#">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      
      
      
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">What People Say</h2>
        </div>
          <?php
          if($UserTestimonialsmodel) {
              $pro_count=0;
              foreach ($UserTestimonialsmodel as $row) {
                  ?>
                  <?php if($pro_count%2==0){ echo "<div style='clear:both'></div>";} ?>
                  <div class="col-md-6  <?php if($pro_count> 1){ echo "see-all-testimonials";} ?>">
                      <p><img src="<?php echo $themeUrl;?>/img/dot.png"></p>
                      <div class="testimonial-detail"> <?= substr($row->description, 0, 140); ?> </div>
                      <h4 class="name-testimonial"><?php if($row->relatedRecords['userFrom']){echo $row->relatedRecords['userFrom']->username; }?></h4>
                      <img src="<?php echo $themeUrl;?>/img/dot-right.png" class="dot-right">
                  </div>
                  <?php
                  $pro_count++;
              }
          }
          else
          {
              ?>
              <div class="col-md-12"> <h4>No Testimonials.</h4></div>
              <?php
          }
          ?>

        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-testimonials');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Manufacturers of <?php echo $model->getAttribute('username');?></h2>
        </div>
          <?php
          $vendor_count=0;
          if($TrustedVendorsmodel)
          { ?>
            <ul class="profile-brands-logo-list">
            <?php
                //echo "<pre>";print_r($TrustedVendorsmodel);exit;
                foreach($TrustedVendorsmodel as $row)
                {
                    if(in_array($row->relatedRecords['vendors']['0']->id, $vend_selection))
                    {
                        ?>
                        <li class=" <?php if($vendor_count> 3){ echo "see-all-trustedvendors";} if($vendor_count%4==3){echo " lastchild";}if($vendor_count%4==0){echo " firstchild";}?>">
                            <a href="<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=site/vendor-profile&id=<?= $row->relatedRecords['vendors']['0']->id ?>&user_id=<?php echo $row->id?>">
                            <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?= $row->relatedRecords['vendors']['0']->id ?>/<?= $row->relatedRecords['userProfiles']['0']->getAttribute('logo') ?>">
                            </a>
                        </li>
                        <?php
                        $vendor_count++;
                    }
                }?>

            </ul>
            <?php
            }
            if($vendor_count==0)
            {
            ?>
                <div class="col-md-12"> <h4>No Vendors.</h4></div>
          <?PHP }?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-trustedvendors');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      
    </div>
    <div class="col-md-3">
      <div class="row row-information">
        <div class="col-md-12">
          <div class="information-section">
            <h2>Information</h2>
            <ul class="information-section-list">
                <?php
                if($VendorInfomodel) {
                    foreach ($VendorInfomodel as $row) {
                        ?>
                        <li class="<?php if($row->icon=='Arrow'){?>active<?php } else {?>question_mark<?php }?>"">
                            <h3><?= $row->title ?></h3>
                            <p><?= $row->description ?></p>
                        </li>
                    <?php }
                }
                else
                {?>
              <li class="active">
                <h3>Registration Number</h3>
                <p>ABN-23446-5</p>
              </li>
              <li>
                <h3>Business Type</h3>
                <p>Architecture Design</p>
              </li>
              <li>
                <h3>Active Since</h3>
                <p>07 - Feb 2015</p>
              </li>
              <li>
                <h3>
Number of Projects</h3>
                <p>29</p>
              </li>
              <li>
                <h3>Verification</h3>
                <p>Banjaiga has not verified this license 
since December, 2013.</p>
              </li>
                <?php }?>
            </ul>
          </div>
        </div>
      </div>
      <div class="row row-information">
        <div class="col-md-12">
          <div class="information-section">
            <h2>Information</h2>
              <?php
              if($VendorTeammodel) {
                  foreach ($VendorTeammodel as $row) {
                      ?>
                      <div class="team-info">
                          <?php if($row->picture !='' && file_exists(dirname(dirname(__DIR__)).'/web/uploads/user-team/'.$model->id.'/'.$row->picture)){?>
                              <img src="<?php echo Yii::$app->request->getBaseUrl(true);?>/uploads/user-team/<?= $model->id ?>/<?= $row->picture ?>" class="profile-img">
                          <?php }else{?>
                              <img src="<?php echo $themeUrl; ?>/img/no-vendor-log.png" class="profile-img">
                          <?php }?>

                          <h2><?= $row->name ?></h2>
                          <p><?= $row->designation ?></p>
                      </div>
                  <?php }
              }
              else
              {?>
            <div class="team-info"> <img src="<?php echo $themeUrl; ?>/img/profile-img1.png" class="profile-img">
              <h2>Rangzar Khan</h2>
              <p>CEO</p>
            </div>
            <div class="team-info"> <img src="<?php echo $themeUrl; ?>/img/profile-img2.png" class="profile-img">
              <h2>Architect </h2>
              <p>CEO</p>
            </div>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<script>
    function toggle_class(myclass) {
        if($('.'+myclass).css('display')=='none')
        {
            $('.'+myclass).css('display','inline');
        }
        else {
            $('.'+myclass).css('display','none');
        }
        //$('.'+myclass).toggle();
    }
</script>
