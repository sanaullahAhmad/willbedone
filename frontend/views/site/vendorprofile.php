<?php
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga | Vendor';?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="vendor-profile-list">
        <li><a href="#">Overview</a></li>
        <li><a href="#">Products</a></li>
        <li><a href="#">COLLECTIONS</a></li>
        <li><a href="#">BRANDS</a></li>
        <li><a href="#">Reviews</a></li>
      </ul>
    </div>
  </div>
  <div class="banner-vendors">
      <?php if($profilemodel->getAttribute('cover') !=''){?>
              <img  src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('cover');?>" width="100%">
      <?php }else{?>
      <img src="<?php echo $themeUrl; ?>/img/profile-background.jpg" width="100%">
      <?php }?>
  </div>
  <div class="row">
    <div class="col-md-8">
      <div class="main-profile-round-img">
          <?php if($profilemodel->getAttribute('logo') !='' && file_exists(dirname(dirname(__DIR__)).'/web/uploads/vendors/'.$vendor_id.'/'.$profilemodel->getAttribute('logo'))){?>
              <img  src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id;?>/<?php echo $profilemodel->getAttribute('logo');?>" width="100%">
          <?php }else{?>
              <img src="<?php echo $themeUrl; ?>/img/no-vendor-log.png">
          <?php }?>
          <?php if($vendormodel->vendor_type==0) { ?>
            <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="star-icon">
          <?php }?>
      </div>
      <div class="main-profile-cotent">
        <h2>
            <?php if($model->getAttribute('username') !=''){?>
               <?php echo $model->getAttribute('username');?>
            <?php }else{?>
                Crete Sol
            <?php }?>
        </h2>
        <p><?php echo substr($profilemodel->getAttribute('about'),0, 35);?> <br>
            <?php echo $profilemodel->getAttribute('city');?>, <?php echo $profilemodel->getAttribute('country');?></p>
        <img src="<?php echo $themeUrl;?>/img/stars.png"> </div>
      <div class="btn-socail-profile-view">
          <?php
          if($VendorCataloguemodel)
          {
              ?>
              <span class="dropdown request-catalogue">
                  <button class="btn-default btn-standard profile-btn dropdown-toggle" type="button" data-toggle="dropdown">Catalogue</button>
                  <ul class="dropdown-menu">
                      <?php
                      foreach ($VendorCataloguemodel as $catl)
                      {
                          ?>
                          <li><a href="<?php echo Yii::$app->request->getBaseUrl(true).'/uploads/user-catalogue/'.$model->id.'/'.$catl->catalogue?>"><?php echo $catl->name?></a></li>
                          <?php
                      }
                      ?>
                  </ul>
              </span>
              <?php
          }
          else
          {
           ?>
          <a class=" btn-default btn-standard profile-btn"
           href="<?php if($profilemodel->getAttribute('cataloguefile') !=''){?>
               <?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id ?>/<?php echo $profilemodel->getAttribute('cataloguefile');?>
            <?php }else{?>
                javascript:alert('No catalogue file uploaded for this vendor')
            <?php }?>">Catalogue</a>
          <?php
          }
          ?>
          <a class=" btn-default btn-standard  profile-btn"
             href="<?php if($profilemodel->getAttribute('dealerlistfile') !=''){?>
               <?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?php echo $vendor_id ?>/<?php echo $profilemodel->getAttribute('dealerlistfile');?>
            <?php }else{?>
               javascript:alert('No dealers list file uploaded for this vendor')
            <?php }?>">Dealer list</a>
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
    <?php
    if($VendorCollectionmodel)
    {
    ?>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Collections by <?php echo $model->getAttribute('username');?></h2>
        </div>
          <?php
              $pro_count=0;
              foreach ($VendorCollectionmodel as $row) {
                  ?>
                  <?php if($pro_count%3==0){ echo "<div style='clear:both'></div>";} ?>
                  <div class="col-md-4 <?php if($pro_count> 2){ echo "see-all-collections";} ?>">
                      <div class="multi-product-view multi-product-view-referrer col-md-12">
                          <h3><?= $row->title ?></h3>
                          <p><?= substr($row->description, 0, 27); ?> </p>
                          <div class="multi-product-img">
                              <div class="row">
                                  <?php $count =1;
                                  $thumb ="_494-336.";
                                  foreach($row->relatedRecords['userCollectionsPictures'] as $related){
                                      if($count!=1){ $thumb ="_436-384.";}
                                      ?>
                                      <div <?php if($count>3){ ?> style="display: none;" <?php }?> class="<?php if($count==1){ ?>col-md-12 m-bottom-23<?php } elseif($count==2){?>col-md-6 right-padding-10<?php } else{?>col-md-6 left-padding-10 m-bottom-23 <?php }?>">
                                          <a  data-fancybox="gallery_<?= $row->id;?>" href="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/collection-images/<?php echo $row->id;?>/<?= $related->file?>">
                                            <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/collection-images/<?php echo $row->id;?>/<?= pathinfo($related->file, PATHINFO_FILENAME).$thumb.pathinfo($related->file, PATHINFO_EXTENSION)?>" width="100%">
                                          </a>
                                      </div>
                                      <?php
                                      $count++;
                                  }?>
                              </div>
                          </div>
                      </div>
                  </div>
                  <?php
                  $pro_count++;
              }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-collections');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
    <?php
    }
    ?>



    <?php
    if($VendorProductmodel) {
    ?>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Products by <?php echo $model->getAttribute('username');?></h2>
        </div>
          <?php
              $pro_count=0;
              foreach ($VendorProductmodel as $row) {
              ?>
              <?php if($pro_count%3==0){ echo "<div style='clear:both'></div>";} ?>
                <div class="col-md-4  <?php if($pro_count> 2){ echo "see-all-products";} ?>">
                    <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/product&id=<?= $row->id;?>">
                      <div class="multi-product-view">
                        <h3><?= $row->name ?></h3>
                        <p><?= substr($row->description, 0, 17); ?>&nbsp&nbsp;</p>
                            <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= pathinfo($row->featured_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($row->featured_image, PATHINFO_EXTENSION) ?>">
                      </div>
                    </a>
                </div>
                  <?php
                  $pro_count++;
              }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a  href="javascript:void(0)" onclick="toggle_class('see-all-products');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
    <?php
    }
    ?>

    <?php
    $product_catalogue=false;
    if($VendorProductmodel) {
        foreach ($VendorProductmodel as $row) {
            if($row->relatedRecords['productCatalogue']) {
                $product_catalogue = true;
            }
        }
    }
    if($VendorCataloguemodel || $product_catalogue) {
    ?>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading"> Catalogues by <?php echo $model->getAttribute('username');?></h2>
        </div>
          <?php
          $pro_count=0;
          foreach ($VendorCataloguemodel as $row) {
              ?>
              <?php if ($pro_count % 3 == 0 && $pro_count != 0) {
                  echo "<div style='clear:both'></div>";
              } ?>
              <div class="col-md-4  <?php if ($pro_count > 2) {
                  echo "see-all-catalogues";
              } ?>">
                  <div class="multi-product-view">
                    <h3><?= $row->name ?></h3>
                    <p><?php /* echo substr($row->description, 0, 17);*/ ?>&nbsp;</p>
                      <a href="<?php echo Yii::$app->request->getBaseUrl(true) ?>/uploads/user-catalogue/<?php echo $model->id; ?>/<?= $row->catalogue; ?>">
                      <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/user-catalogue/<?php echo $model->id; ?>/<?= pathinfo($row->catalogue_image, PATHINFO_FILENAME) . '_446-300.' . pathinfo($row->catalogue_image, PATHINFO_EXTENSION) ?>">
                      </a>
                  </div>
              </div>
              <?php
              $pro_count++;
          }
          //Product catalogues here
          if($VendorProductmodel) {
              foreach ($VendorProductmodel as $row) {
                  ?>
                  <?php if($pro_count%3==0 && $pro_count!=0){ echo "<div style='clear:both'></div>";}
                  if($row->relatedRecords['productCatalogue'])
                  {
                      foreach($row->relatedRecords['productCatalogue'] as $rel_catl) {
                          ?>
                          <div class="col-md-4 <?php if ($pro_count > 2) {
                              echo "see-all-catalogues";
                          } ?>">
                              <div class="multi-product-view <!--multi-product-view-referrer col-md-12-->">
                                  <h3><?= $row->name.' : '?></h3>
                                  <p><?php /*echo  $row->description*/ echo $rel_catl->name ?>&nbsp; </p>
                                  <a href="<?php echo Yii::$app->request->getBaseUrl(true) ?>/uploads/product-catalogue/<?php echo $row->id; ?>/<?= $rel_catl->catalogue; ?>">
                                      <?php $count = 1;
                                      foreach ($row->relatedRecords['productPictures'] as $related) {
                                          ?>
                                          <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id; ?>/<?= pathinfo($related->file, PATHINFO_FILENAME) . '_446-300.' . pathinfo($related->file, PATHINFO_EXTENSION) ?>"
                                               width="100%">
                                          <?php
                                          $count++;
                                          if ($count == 2/*4*/) {
                                              break;
                                          }
                                      } ?>
                                  </a>
                              </div>
                          </div>
                          <?php
                          $pro_count++;
                      }
                  }
              }
          }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-catalogues');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
    <?php
    }
    ?>



    <?php
    if($Vendormanufacturer) {
    ?>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Brand Sold by <?php echo $model->getAttribute('username');?></h2>
        </div>
        <ul class="profile-brands-logo-list">
            <?php
            if($Vendormanufacturer) {
                $pro_count = 1;
                $brand_arr = array();
                foreach ($Vendormanufacturer as $row) {
                    //print_r($brand_arr);
                    ?>
                    <li class="<?php if ($pro_count > 3) {
                        echo "see-all-brands";
                    } if(($pro_count-1)%3==0){echo " line_first_child";}?>">
                        <a href="<?php echo Yii::$app->request->getBaseUrl(true) ?>?r=site/manufacturer-profile&id=<?= $row->relatedRecords['manufacturers'][0]->getAttribute('id'); ?>&user_id=<?= $row->id; ?>"
                           title="<?= $row->username ?>">
                            <img src="<?php echo Yii::$app->request->getBaseUrl(true) ?>/uploads/manufacturers/<?= $row->relatedRecords['manufacturers'][0]->getAttribute('id'); ?>/<?= $row->relatedRecords['userProfiles'][0]->getAttribute('logo') ?>">
                        </a>
                    </li>
                    <?php
                    $pro_count++;
                }
            }
            ?>
        </ul>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-brands');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
    <?php
    }
    ?>
    <?php
    if($UserVideosmodel) {
        ?>
        <div class="row row-about-products">
            <div class="col-md-12">
                <h2 class="main-inner-heading">Videos by <?php echo $model->getAttribute('username'); ?></h2>
            </div>
            <?php
            $pro_count = 0;
            foreach ($UserVideosmodel as $video) {
                ?>
                <div class="col-md-4 <?php if ($pro_count > 2) {
                    echo "see-all-videos";
                } ?>">
                    <div class="multi-product-view">
                        <h3><?= $video->title ?></h3>
                        <p><?= substr($video->description, 0, 15) ?> </p>
                        <a href="<?php $video->url ?>">
                            <iframe width="222" height="150"
                                    src="<?= str_replace('watch?v=', 'embed/', $video->url) ?>">
                            </iframe>
                        </a></div>
                </div>
                <?php
                $pro_count++;
            }
            ?>

            <div class="col-md-12 text-right">
                <p class="btn-see-all"><a href="javascript:void(0)" onclick="toggle_class('see-all-videos');">SEE
                        ALL <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
        <?php
    }
    if($UserTestimonialsmodel) {
        ?>
        <div class="row row-about-products">
            <div class="col-md-12">
                <h2 class="main-inner-heading">What People Say</h2>
            </div>
            <?php
            $pro_count = 0;
            foreach ($UserTestimonialsmodel as $row) {
                ?>
                <?php if ($pro_count % 2 == 0) {
                    echo "<div style='clear:both'></div>";
                } ?>
                <div class="col-md-6  <?php if ($pro_count > 1) {
                    echo "see-all-testimonials";
                } ?>">
                    <p><img src="<?php echo $themeUrl; ?>/img/dot.png"></p>
                    <div class="testimonial-detail"> <?= substr($row->description, 0, 140); ?> </div>
                    <h4 class="name-testimonial"><?php if ($row->relatedRecords['userFrom']) {
                            echo $row->relatedRecords['userFrom']->username;
                        } ?></h4>
                    <img src="<?php echo $themeUrl; ?>/img/dot-right.png" class="dot-right">
                </div>
                <?php
                $pro_count++;
            }

            ?>
            <div class="col-md-12 text-right">
                <p class="btn-see-all"><a href="javascript:void(0)" onclick="toggle_class('see-all-testimonials');">SEE
                        ALL <i class="fa fa-angle-right"></i></a></p>
            </div>
        </div>
        <?php
    }
    ?>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Architects Who have worked with <?php echo $model->getAttribute('username');?></h2>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round"> <img src="<?php echo $themeUrl;?>/img/multi-star-img1.jpg" width="100%"> </div>
            <h3>Living Room</h3>
            <p>Zurich, Switzerland </p>
            <div class="multi-product-bottom-links col-md-12">
              <div class="col-md-6"><span class="date-to">2008-2012</span></div>
              <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round"> <img src="<?php echo $themeUrl;?>/img/multi-star-img2.jpg" width="100%"> </div>
            <h3>Michel John</h3>
            <p>Zurich, Switzerland</p>
            <div class="multi-product-bottom-links col-md-12">
              <div class="col-md-6"><span class="date-to">2008-2012</span></div>
              <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="multi-product-view multi-product-view-referrer col-md-12">
            <div class="multi-product-view-round"> <img src="<?php echo $themeUrl;?>/img/multi-star-img3.jpg" width="100%"> <img src="<?php echo $themeUrl;?>/img/star-icon.png" class="multi-star-img"> </div>
            <h3>Wander Jackson</h3>
            <p>Zurich, Switzerland </p>
            <div class="multi-product-bottom-links col-md-12">
              <div class="col-md-6"><span class="date-to">2008-2012</span></div>
              <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="<?php echo $themeUrl;?>/img/hart-icon.png"></a> <a href="#"><img src="<?php echo $themeUrl;?>/img/plus-icon.png"></a></div>
            </div>
          </div>
        </div>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="#">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
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
                    <li class="<?php if($row->icon=='Arrow'){?>active<?php } else {?>question_mark<?php }?>">
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
      <div class="row row-information">
        <div class="col-md-12">
          <div class="information-section">
            <h2>Team</h2>
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
            <div class="team-info">
              <h2>No team added yet.</h2>
            </div>
              <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
<script>
    function toggle_class(myclass) {
        $('.'+myclass).toggle();
    }
</script>