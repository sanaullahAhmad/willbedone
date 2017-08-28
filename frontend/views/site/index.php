<?php
//echo "<pre>";print_r($_SERVER);exit;
use backend\models\Categories;
/* @var $this yii\web\View */
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$this->title = 'Banjaiga';
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);

?>
<h4 class="main-content" style="font-size: 36px; color: #3f3e3e; font-family: 'PT Sans';">The best Architects, Contractors and Material Suppliers in Pakistan matched to you.</h4>

<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center explore-heading">
            <form class="navbar-form" role="search" style="margin-bottom:40px" method="get" action="">
                <div class="input-group add-on col-sm-8 col-md-8">
                    <input name="r" value="site/category" type="hidden">
                    <input class="form-control search_keywords" type="text" name="search_keywords" id="search_keywords" value="<?php if(isset($_GET['search_keywords'])){ echo $_GET['search_keywords'];}?>"  placeholder="Search here - Architects, Vendors, Manufacturers, Material Suppliers....">
                    <select class="selectpicker" name="id" id="header_categories">
                        <option value="">Categories</option>
                        <?php
                        $Categories    = Categories::find()->where(['parent'=>'0'])->all();
                        if($Categories){
                            foreach ($Categories as $cat){
                                ?>
                                <option value="<?= $cat->id;?>" <?php if(isset($_GET['search_keywords']) && isset($_GET['id']) && $cat->id==$_GET['id']){ echo "selected";}?>><?= $cat->category;?></option>
                                <?php
                            }
                        }
                        ?>
                    </select>
                </div>
                <div class="input-group-btn submit-srch">
                    <button class="btn btn-default submit-btn-search" type="submit">Search</button>
                </div>
            </form>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-1" style="text-align: center;">
            &nbsp;
        </div>
        <div class="col-md-1" style="text-align: center; width: 13%; margin-bottom: 34px;">
            <h4>Quick Links</h4>
        </div>
        <div class="col-md-12" style="text-align: center;">
            <?php
                $Categories    = Categories::find()->where(['parent'=>'0'])->all();
                $count=0;
                if($Categories){
                    foreach ($Categories as $cat){
                        ?>
                        <a href="<?= $site_base_url?>?r=site/category&id=<?= $cat->id;?>" class="btn btn-default btn-quick-links"><?= $cat->category;?></a>
                        <?php
                        if($count==4)
                        {
                            break;
                        }
                        $count++;
                    }
                }
            ?>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <h4 class="main-content">Post to Banjaiga and get matched to the best <br>
            Architects, Contractors or materials Suppliers for your project.</h4>
    </div>
</div>


<div class="how-works-section">
    <div class="container">
        <div class="row text-center how-works-options">
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="/banjaiga/frontend/web/../../themes/banjaiga/img/one-stop-shop.png">
                        </span>
                <h4 class="service-heading">One stop shop for construction </h4>
                <p class="text-muted">You choose a product or service you require for your project.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                           <img src="/banjaiga/frontend/web/../../themes/banjaiga/img/professional-network.png">
                        </span>
                <h4 class="service-heading">Professional Network</h4>
                <p class="text-muted">We magically activate our networks of Architects, contractors, service providers and match them with you.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="/banjaiga/frontend/web/../../themes/banjaiga/img/buy-confidence.png">
                        </span>
                <h4 class="service-heading">Buy wth confidence</h4>
                <p class="text-muted">We help you with selection and buying at great prices and make sure it get delivered on site.</p>
            </div>
            <div class="col-md-3 col-sm-6">
                        <span>
                            <img src="/banjaiga/frontend/web/../../themes/banjaiga/img/customer-satisfaciton.png">
                        </span>
                <h4 class="service-heading">Customer Satisfaction </h4>
                <p class="text-muted">We make it a very pleasant experience. You will just love to be part of it.</p>
            </div>
        </div>
    </div>

</div>

<div class="sections-tool">
    <div class="container">
        <div class="col-md-12">
            <h1 class="main-hadding"> What are you looking for? Use our free tools to find out </h1>
        </div>
        <div class="row home-startup-boxes">
            <div class="col-md-3 col-sm-6">
                <div class="tool-section-content green-box">
                    <div class="media"><img src="<?php echo $themeUrl;?>/img/home-icon.png"></div>
                    <h3 class="tool-section-hadding">I want to construct <br> a New House</h3>
                    <a href="new-house.html" class="btn get-btn" target="_blank">GET ESTIMATE!</a>
                    <!--<a href="#" class="btn get-btn" data-toggle="modal" data-target="#workingModal">GET ESTIMATE!</a>-->
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="tool-section-content red-box">
                    <div class="media"><img src="<?php echo $themeUrl;?>/img/man-icon.png"></div>
                    <h3 class="tool-section-hadding">I need a <br>
                        Contractor</h3>
                    <a href="?r=site/need-contractor" class="btn get-btn" >GET ESTIMATE!</a> </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="tool-section-content blue-box">
                    <div class="media"><img src="<?php echo $themeUrl;?>/img/reading-man-icon.png"></div>
                    <h3 class="tool-section-hadding">I want to hire an<br>
                        Architect</h3>
                    <a href="?r=site/hire-architect" class="btn get-btn" >GET ESTIMATE!</a> </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="tool-section-content yellow-box">
                    <div class="media"><img src="<?php echo $themeUrl;?>/img/materials-icon.png"></div>
                    <h3 class="tool-section-hadding">I want to buy<br>
                        Buliding Materials</h3>
                    <!--<a href="building-materials.html" class="btn get-btn" target="_blank">GET ESTIMATE!</a>-->
                    <a href="#" class="btn get-btn" data-toggle="modal" data-target="#workingModal">GET ESTIMATE!</a> </div>
            </div>
        </div>
    </div>
</div>

<div class="row-about-products" style="padding-top: 36px;padding-bottom: 20px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-inner-heading">Featured Gold Vendors</h2>
            </div>

            <?php
            if($featureVendors) {
                $pro_count = 0;
                foreach ($featureVendors as $row) {
                    if(isset($row['products']))
                    {
                        if(isset($row['products']['products_pictures']))
                        {
                        ?>
                        <?php if ($pro_count % 4 == 0 && $pro_count != 0) {
                            echo "<div style='clear:both'></div>";
                        } ?>
                        <div class="col-md-3 <?php if ($pro_count > 3) {
                            echo "see-all-catalogues";
                        } ?>">
                            <a href="<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=site/vendor-profile&id=<?= $row['vendors_id']; ?>&user_id=<?= $row['user_id']; ?>">
                                <div class="multi-product-view multi-product-view-referrer col-md-12">
                                    <h3><img style="height: 30px; width: 90%;margin-bottom: 15px;" src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/vendors/<?= $row['vendors_id'];?>/<?= $row['profile_logo'];?>">
                                    </h3>
                                    <div class="multi-product-img">
                                        <div class="row">
                                            <?php
                                            $count = 1;
                                            $thumb = "_494-336.";
                                            foreach ($row['products']['products_pictures'] as $prd_pic)
                                            {
                                                if ($count != 1) {
                                                    $thumb = "_436-384.";
                                                }
                                                ?>
                                                <div <?php if ($count > 3) { ?> style="display: none;" <?php } ?>
                                                        class="<?php if ($count == 1) { ?>col-md-12 m-bottom-23<?php } elseif ($count == 2) { ?>col-md-6 right-padding-10<?php } else { ?>col-md-6 left-padding-10 m-bottom-23 <?php } ?>">
                                                    <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?= $row['products']['products_id']; ?>/<?= pathinfo($prd_pic, PATHINFO_FILENAME) . $thumb . pathinfo($prd_pic, PATHINFO_EXTENSION) ?>"
                                                         width="100%">
                                                </div>
                                            <?php
                                               $count++;
                                             }

                                            ?>
                                        </div>
                                    </div>
                                    <div class="multi-product-bottom-links col-md-12">
                                        <div class="col-md-6"><span class="date-to">Islamabad,&nbsp;Pakistan</span></div>
                                        <div class="col-md-6 like-detail-lisnk">
                                            <a href="#"><img src="/banjaiga/frontend/web/../../themes/banjaiga/img/hart-icon.png"></a>
                                            <a href="#"><img src="/banjaiga/frontend/web/../../themes/banjaiga/img/plus-icon.png"></a>
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
            }
            ?>

            <div class="col-md-12 text-right">
                <p class="btn-see-all">
                    <a href="javascript:void(0)" onclick="toggle_class('see-all-catalogues');">Veiw All<i class="fa fa-angle-right"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>

<div class="row-about-products" style="background-color: #fafafa; padding-top: 36px;padding-bottom: 20px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-inner-heading">Featured Gold Architects</h2>
            </div>
            <?php
            if($featureArchetics) {
            $pro_count = 0;
            foreach ($featureArchetics as $row) {
            if(isset($row['projects']))
            {
            if(isset($row['projects']['projects_pictures']))
            {
            ?>
            <?php if ($pro_count % 4 == 0 && $pro_count != 0) {
                echo "<div style='clear:both'></div>";
            } ?>
            <div class="col-md-3 <?php if ($pro_count > 3) {
                echo "see-all-architects";
            } ?>">
                <a href="<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=site/architect-profile&id=<?= $row['archetics_id']; ?>&user_id=<?= $row['user_id']; ?>">

                <div class="multi-product-view multi-product-view-referrer col-md-12">
                    <div class="multi-product-view-round">
                        <img style="border: 2px solid #fff; border-radius: 50%;width: 100px;height: 100px;" src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/architects/<?= $row['archetics_id'];?>/<?= $row['profile_logo'];?>">
                    </div>
                    <h3><?= substr($row['profile_fullname'], 0, 20);?>&nbsp;</h3>
                    <p><?= $row['profile_city'];?>, <?= $row['profile_country'];?>&nbsp;</p>
                    <div class="multi-product-img">
                        <div class="row">
                            <?php
                            $count = 1;
                            $thumb = "_494-336.";
                            foreach ($row['projects']['projects_pictures'] as $prd_pic)
                            {
                                if ($count != 1) {
                                    $thumb = "_436-384.";
                                }
                                ?>
                                <div <?php if ($count > 3) { ?> style="display: none;" <?php } ?>
                                        class="<?php if ($count == 1) { ?>col-md-12 m-bottom-23<?php } elseif ($count == 2) { ?>col-md-6 right-padding-10<?php } else { ?>col-md-6 left-padding-10 m-bottom-23 <?php } ?>">
                                    <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/projects-images/<?= $row['projects']['projects_id']; ?>/<?= pathinfo($prd_pic, PATHINFO_FILENAME) . $thumb . pathinfo($prd_pic, PATHINFO_EXTENSION) ?>"
                                         width="100%">
                                </div>
                                <?php
                                $count++;
                            }
                            ?>
                        </div>
                    </div>
                    <div class="multi-product-bottom-links col-md-12">
                        <div class="col-md-6"><span class="date-to">2008-2012</span></div>
                        <div class="col-md-6 like-detail-lisnk"><a href="#"><img src="/banjaiga/frontend/web/../../themes/banjaiga/img/hart-icon.png"></a>
                            <a href="#"><img src="/banjaiga/frontend/web/../../themes/banjaiga/img/plus-icon.png"></a>
                        </div>
                    </div>
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
                <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-architects');">Veiw All <i class="fa fa-angle-right"></i></a> </p>
            </div>
        </div>
    </div>
</div>

<div class="row-about-products" style="padding-top: 36px;padding-bottom: 20px; ">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="main-inner-heading">Featured Products</h2>
            </div>
            <?php
            if($recommendedProducts) {
                $pro_count=0;
                foreach ($recommendedProducts as $row) {
                        ?>
                        <?php if ($pro_count % 4 == 0) {
                            echo "<div style='clear:both'></div>";
                        } ?>
                        <div class="col-md-3 <?php if ($pro_count > 3) {
                            echo "see-all-collections";
                        } ?>">

                                <div class="multi-product-view multi-product-view-referrer col-md-12">
                                    <h3></h3>
                                    <div class="multi-product-img">
                                        <a href="<?= Yii::$app->request->getBaseUrl(true); ?>?r=site/product&id=<?= $row->id; ?>">
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
                                        </a>
                                    </div>
                                    <div class="multi-product-bottom-links col-md-12">
                                        <div class="col-md-6"><span class="date-to">Feb 21,2017</span></div>
                                        <div class="col-md-6 like-detail-lisnk">
                                            <a href="#">6&nbsp;items&nbsp;added</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php
                        $pro_count++;
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
                <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-products');">Veiw All <i class="fa fa-angle-right"></i></a> </p>
            </div>
        </div>
    </div>
</div>

<div class="new-letter-section" style="padding-top: 36px;padding-bottom: 20px;">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1 class="main-hadding main-hadding-blue" style="padding-top: 250px;"> Subscribe to our newsletter for best deals and product information! </h1>
            </div>
            <div class="new-letter-input-section">
                <input type="text" placeholder="Your Email Address">
                <button class="btn subscribe-btn" data-toggle="modal" data-target="#workingModal">SUBSCRIBE ME</button>
            </div>
        </div>
    </div>
</div>


<div class="container">
    <div class="col-md-12">
        <h1 class="main-hadding"> Our Gold Vendor Partners </h1>
    </div>
    <ul class="partners-list">
        <li><img src="<?php echo $themeUrl;?>/img/cretesol-logo.jpg"></li>
        <li><img src="<?php echo $themeUrl;?>/img/grannitto-logo.jpg"></li>
        <li><img src="<?php echo $themeUrl;?>/img/enovations-logo.jpg"></li>
        <li><img src="<?php echo $themeUrl;?>/img/fevive.jpg"></li>
        <!--<li><img src="<?php /*echo $themeUrl;*/?>/img/s-abdullah-logo.png"></li>-->
        <li><img src="<?php echo $themeUrl;?>/img/enovations-logo.jpg"></li>
        <li><img src="<?php echo $themeUrl;?>/img/sardars-logo.png"></li>
        <li><img src="<?php echo $themeUrl;?>/img/Buro-logo.jpg"></li>
        <li><img src="<?php echo $themeUrl;?>/img/oppein-logo.png"></li>
        <!--<li><img src="<?php /*echo $themeUrl;*/?>/img/Dsi-logo.jpg"></li>-->
    </ul>
</div>

<div class="form-process-section" style="background-color:#fafafa; padding-bottom:50px; padding-top:50px">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <p class="text-muted text-muted-cust-font apply-sub-heading" style="display: none;"> Are you interested in selling through Banjaiga? We would love to hear from you.</p>
                <button type="button" class="btn btn-info contractor-step-btn" style="background-color: rgb(53, 176, 160); padding: 12px 28px; font-weight: bold; text-transform: uppercase; display: none;" id="get_started_btn">Apply Now</button>
                <div class="form-process-content" style="">
                    <h3 class="section-heading section-heading-cust-font" style="color:#6f7270"> Become part of the future of construction industry </h3>
                    <p>Please fill in the form below to receive a special invitation for the earlybird registration on Banjaiga. </p>
                    <div class="col-md-10 col-md-offset-2 col-sm-offset-0">
                        <div class="col-md-10 contact-information">
                            <div class="row">
                                <form id="form_info_cont" action="#">
                                    <div class="col-sm-6 contact-information-input">
                                        <div class="btn-group bootstrap-select is_required">

                                            <select class="selectpicker is_required" name="i_am" id="i_am" tabindex="-98">
                                                <option value="">I am a</option>
                                                <option value="manufacturer">Manufacturer</option>
                                                <option value="vendor">Vendor</option>
                                                <option value="reseller">Reseller</option>
                                            </select></div>
                                    </div>
                                    <div class="col-sm-6 contact-information-input full-name-cont">
                                        <input type="text" placeholder="Full name" name="full_name" id="full_name" class="is_required">
                                    </div>
                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Company name" name="compnay" id="compnay" class="is_required">
                                    </div>
                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Email Address" name="user_email" id="user_email" class="is_required">
                                    </div>

                                    <div class="col-sm-6 contact-information-input">
                                        <input type="text" placeholder="Telephone Number" name="telephone_number" id="telephone_number" class="is_required">
                                    </div>
                                    <div class="col-sm-6 contact-information-input">
                                        <div class="btn-group bootstrap-select is_required">
                                            <select class="selectpicker is_required" name="interest_mode" id="interest_mode" tabindex="-98">
                                                <option value="">How interested are you?</option>
                                                <option value="reference">I want to become a member, NOW!</option>
                                                <option value="friends">This sounds interesting, tell me more</option>
                                                <option value="google">I think I want to be on the platform but I am not sure yet.</option>
                                            </select></div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal thanks-modal fade" id="successPostingModel" role="dialog">
                        <div class="modal-dialog  thanks-modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header thanks-modal-header">
                                    <button type="button" data-dismiss="modal"><img src="img/close-icon.png"></button>
                                    <img src="img/cong-icon.png">
                                    <h4 class="modal-title">Thanks for sharing your information!</h4>
                                </div>
                                <div class="modal-body thanks-modal-body">
                                    <!-- <p>What happens next?</p>-->
                                    <ul>
                                        <li>Please note that Banjaiga receives a lot of applications but only selects a few companies that successfully passes through out rigorous selection process. Our representative will call you soon to take you through the onboarding process.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="list-unstyled list-inline ">
                        <li>
                            <button type="button" class="btn btn-info next-step green-btn contractor-step-btn" id="submit-final-step" style="background-color:#35b0a0; border: 1px solid #35b0a0; padding: 10px 48px">Submit</button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    body
    {
        font-family: 'PT Sans';
    }
    .partners-list > li {
        margin: 0 40px;
    }
    .partners-list > li:first-child {
        margin-left: 0px;
    }
</style>