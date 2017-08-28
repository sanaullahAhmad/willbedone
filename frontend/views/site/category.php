<?php
use  backend\models\Products;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga | Vendor';?>
<div class="container">
  <div class="row">
    <div class="col-md-12">
      <ul class="vendor-profile-list">
        <li><a href="#">HODS</a></li>
        <li><a href="#">HUBS</a></li>
        <li><a href="#">ACCESSORIES</a></li>
        <li><a href="#">CABINETRY</a></li>
        <li><a href="#">DISHWASHERS</a></li>
        <li><a href="#">REFREGERATORS</a></li>
      </ul>
    </div>
  </div>
  <div class="banner-vendors">
      <img src="<?php echo $themeUrl; ?>/img/slide1.jpg" width="100%">
  </div>
  <div class="row" style="margin-top: 40px;">
      <div class="col-md-3">
          <div class="row row-information">
              <div class="col-md-12">
                  <div class="information-section">
                      <h2><?php echo $model->category;?></h2>
                      <ul class="information-section-list">
                          <?php
                          if($SubCategories) {
                              foreach ($SubCategories as $row) {
                                  ?>
                                  <li class="no-background">
                                      <h3><?= $row->category ?></h3>
                                  </li>
                              <?php }
                          }
                          else
                          {?>
                              <li class="no-background">
                                  <h3>No Subcategory added yet.</h3>
                              </li>
                          <?php }?>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
    <div class="col-md-9">
      <div class="about-detail">
          <div class="row">
              <div class="col-md-8">
                  <h2 class="main-inner-heading"><?= $model->category;?></h2>
              </div>
              <div class="col-md-4">
                  <a class=" btn btn-default  pull-right category-gethelp-btn" href="#">Get Help</a>
                  <a class=" btn btn-default pull-right category-catalogue-btn" href="#">Catalogue</a>
              </div>
          </div>
          <p id="companyDetails"><?= $model->description;?></p>
      </div>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading"> Matched Results<?php /*echo $model->category;*/?><!-- Manufacturers--></h2>
        </div>
          <?php
          if($Cat_products) {
              $pro_count=0;
              $manufacturers_id_arr = array();
              foreach ($Cat_products as $row) {
                  //for search keyword
                  if (isset($_GET['search_keywords']) && $_GET['search_keywords']!='' && $row->relatedRecords['productManufacturerprofile'] && stristr($row->relatedRecords['productManufacturerprofile']->full_name, $_GET['search_keywords']) !== FALSE ) {
                      $search = "found";//echo 1;
                  }
                  elseif (isset($_GET['search_keywords']) && $_GET['search_keywords']=='')
                  {
                      $search = "found";//echo 2;
                  }

                  elseif (!isset($_GET['search_keywords']))
                  {
                      $search = "found";//echo 3;
                  }
                  else{
                      $search = "Notfound";//echo 4;
                  }
                  if($row->manufacturers_id!=0 && !in_array($row->manufacturers_id, $manufacturers_id_arr) && $search == "found") {
                      array_push($manufacturers_id_arr, $row->manufacturers_id);
                      ?>
                      <?php if ($pro_count % 3 == 0) {
                          echo "<div style='clear:both'></div>";
                      } ?>
                      <div class="col-md-4 <?php if ($pro_count > 2) {
                          echo "see-all-collections";
                      } ?>">
                          <a href="<?= Yii::$app->request->getBaseUrl(true); ?>?r=site/manufacturer-profile&id=<?php echo Products::getinfo('user_id', $row->manufacturers_id, 'manufacturers', 'id') ?>&user_id=<?= $row->manufacturers_id ?>">
                              <div class="multi-product-view multi-product-view-referrer col-md-12">
                                  <h3><?php if ($row->relatedRecords['productManufacturerprofile']) {
                                          echo $row->relatedRecords['productManufacturerprofile']->full_name;
                                      } ?></h3>
                                  <div class="multi-product-img">
                                      <div class="row">
                                          <?php $count = 1;
                                          $thumb = "_494-336.";
                                          foreach ($row->relatedRecords['productPictures'] as $related) {
                                              if ($count != 1) {
                                                  $thumb = "_436-384.";
                                              }
                                              ?>
                                              <div <?php if ($count > 3) { ?> style="display: none;" <?php } ?>
                                                      class="<?php if ($count == 1) { ?>col-md-12 m-bottom-23<?php } elseif ($count == 2) { ?>col-md-6 right-padding-10<?php } else { ?>col-md-6 left-padding-10 m-bottom-23 <?php } ?>">
                                                  <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?= $row->id; ?>/<?= pathinfo($related->file, PATHINFO_FILENAME) . $thumb . pathinfo($related->file, PATHINFO_EXTENSION) ?>"
                                                       width="100%">
                                              </div>
                                              <?php
                                              $count++;
                                          } ?>
                                      </div>
                                  </div>
                              </div>
                          </a>
                      </div>
                      <?php
                      $pro_count++;
                  }
              }
          }
          if($pro_count==0)
          {
              ?>
              <div class="col-md-12"> <h4>No Manufacturers.</h4></div>
              <?php
          }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-collections');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      <div class="row row-about-products">
        <div class="col-md-12">
          <h2 class="main-inner-heading">Products by <?php echo $model->category;?></h2>
        </div>
          <?php
          if($Cat_products) {
              $pro_count=0;
              foreach ($Cat_products as $row) {
                  //for search keyword
                  if (isset($_GET['search_keywords']) && $_GET['search_keywords']!=''  && stristr($row->name, $_GET['search_keywords']) !== FALSE ) {
                      $search = "found";
                  }
                  elseif (isset($_GET['search_keywords']) && $_GET['search_keywords']=='')
                  {
                      $search = "found";
                  }

                  elseif (!isset($_GET['search_keywords']))
                  {
                      $search = "found";
                  }
                  else{
                      $search = "Notfound";
                  }
                  if($search == "found") {
                      ?>
                      <?php if ($pro_count % 3 == 0) {
                          echo "<div style='clear:both'></div>";
                      } ?>
                      <div class="col-md-4  <?php if ($pro_count > 2) {
                          echo "see-all-products";
                      } ?>">
                          <a href="<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=site/product&id=<?= $row->id; ?>">
                              <div class="multi-product-view">
                                  <h3><?= substr($row->name, 0, 17) ?></h3>
                                  <p><?= substr($row->description, 0, 17); ?>&nbsp;</p>
                                  <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id; ?>/<?= pathinfo($row->featured_image, PATHINFO_FILENAME) . '_446-300.' . pathinfo($row->featured_image, PATHINFO_EXTENSION) ?>">
                              </div>
                          </a>
                      </div>
                      <?php
                      $pro_count++;
                  }
              }
          }
          if($pro_count==0)
          {
              ?>
              <div class="col-md-12"> <h4>No Products.</h4></div>
              <?php
          }
          ?>
        <div class="col-md-12 text-right">
          <p class="btn-see-all"> <a  href="javascript:void(0)" onclick="toggle_class('see-all-products');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
        </div>
      </div>
      <div class="row row-about-products">
            <div class="col-md-12">
                <h2 class="main-inner-heading">Vendors by <?php echo $model->category;?></h2>
            </div>
            <?php
            if($catVendors) {
                $pro_count=0;
                foreach ($catVendors as $row) {
                    //for search keyword
                    if (isset($_GET['search_keywords']) && $_GET['search_keywords']!='' && $row->relatedRecords['userProfiles'] && stristr($row->relatedRecords['userProfiles']->full_name, $_GET['search_keywords']) !== FALSE ) {
                        $search = "found";//echo 1;
                    }
                    elseif (isset($_GET['search_keywords']) && $_GET['search_keywords']=='')
                    {
                        $search = "found";//echo 2;
                    }

                    elseif (!isset($_GET['search_keywords']))
                    {
                        $search = "found";//echo 3;
                    }
                    else{
                        $search = "Notfound";//echo 4;
                    }
                    if($search == "found") {
                        ?>
                        <?php if ($pro_count % 3 == 0 && $pro_count != 0) {
                            echo "<div style='clear:both'></div>";
                        } ?>
                        <div class="col-md-4  <?php if ($pro_count > 2) {
                            echo "see-all-catalogues";
                        } ?>">
                            <a href="<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=site/vendor-profile&id=<?= $row->id; ?>&user_id=<?= $row->user_id; ?>">
                                <div class="multi-product-view">
                                    <?php if ($row->relatedRecords['userProfiles']) {
                                        echo '<h3>' . substr($row->relatedRecords['userProfiles']->full_name, 0, 20) . '&nbsp;<h3>';
                                        //echo '<p>'.substr($row->relatedRecords['userProfiles']->about, 0, 17).'<p>';
                                    } ?>
                                    <img style="width: 222px; height: 150px;"
                                         src="<?= Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?= $row->id; ?>/<?= $row->relatedRecords['userProfiles']->getAttribute('logo') ?>">
                                </div>
                            </a>
                        </div>
                        <?php
                        $pro_count++;
                    }
                }
            }
            if($pro_count==0)
            {
                ?>
                <div class="col-md-12"> <h4>No Vendors.</h4></div>
                <?php
            }
            ?>
            <div class="col-md-12 text-right">
                <p class="btn-see-all"> <a  href="javascript:void(0)" onclick="toggle_class('see-all-catalogues');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
            </div>
      </div>
    </div>
  </div>
<script>
    function toggle_class(myclass) {
        $('.'+myclass).toggle();
    }
</script>