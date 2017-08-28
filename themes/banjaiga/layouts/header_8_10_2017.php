<?php
use backend\models\Architects;
use backend\models\Vendors;
use backend\models\UserShoppingList;
use backend\models\ShoppingListItems;
use backend\models\ProductVendors;
use backend\models\User;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
?>
<!--shopping cart here-->
<?php
$current_list='';
if(Yii::$app->user->isGuest==false && Yii::$app->user->identity->user_type=='normal')
{
?>
<div class="container-shopping-list-modal" id="shopping-list" style="display: none;">
    <div class="header-shopping-list-modal col-md-12">
        <?php
        $shopping_lists = UserShoppingList::find()->where(['user_id' => Yii::$app->user->identity->id])->all();
        $list_mockup = '';
        $current_list='';
        $current_list_id=0;
        if($shopping_lists) {
            $c =1;
            foreach ($shopping_lists as $list)
            {
                if($c> 1){ $list_mockup .= "<br />";}
                if($list->is_current){ $current_list =$list->name; $current_list_id=$list->id; }
                $c++;
                $list_mockup .= "<a onclick='change_shoping_list(".$list->id.")' href='javascript:void(0)'>".$list->name.'</a>';
            }
        }
            else{ $list_mockup .= "No Lists";}
        ?>
        <h1 class="main-heading-shopping-list-modal">
            <span id="current_list_span"><?= $current_list?></span>
            <img src="<?php echo $themeUrl?>/img/pen-icon.png" onclick="change_list_title(<?= $current_list_id?>)" title="Change Title">
        </h1>
        <p id="total_items">3 ITEMS added</p>
        <div class="col-md-12 change-view-btn">

            <a href="javascript:void(0)" data-toggle="popover" data-trigger="focus"
               data-content="<?= $list_mockup ?>" data-html="true" data-placement="bottom" title="">Change list</a>
            <a href="#">view full list</a>
        </div>
    </div>
    <div class="accordion col-md-12 accordion-main-header" id="accordion2">
    <?php
    $prj = UserShoppingList::find()->where(['user_id' => Yii::$app->user->identity->id, 'is_current' => '1'])->one();

    // to be used in list code in two places
    $list_total = ShoppingListItems::find()->where(['user_shopping_list_id' => $prj->id])->sum('price_offered*quantity');//*quantity
    $ShoppingListItems          = ShoppingListItems::find()->where(['user_shopping_list_id' => $prj->id])->count();

    if ($prj) {
        $ShopItems = ShoppingListItems::find()->where(['user_shopping_list_id'=>$prj->id, 'user_shopping_list_user_id' => Yii::$app->user->identity->id])->with(['products','user'])->all();
        if($ShopItems)
        {
            $item_count=1;
            foreach ($ShopItems as $row)
            {
                ?>
        <div class="accordion-group accordion-group-list <?php if($item_count==0){ echo "active"; }?> shopping_list_item_<?= $row->id?>">
            <div class="accordion-heading accordion-heading-list">
                <a class="accordion-toggle accordion-toggle-style " data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php  echo $item_count;?>">
                    <!--<img src="<?php /*echo $themeUrl*/?>/img/sofa-list-icon.png">-->
                    <?php if($cat =ShoppingListItems::getCategory($row->relatedRecords['products']->product_categories_id,'category')){echo $cat;}else{echo "Others";};?>
                </a>
            </div>
            <div id="collapse_<?php  echo $item_count;?>" class="accordion-body collapse  shopping_list_body_<?= $row->id?>">
                <div class="accordion-inner accordion-inner-list">
                    <div class="cart-quote col-md-12">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="shop-quantity shop-quantity-<?= $row->id?>"><?php echo $row->quantity?>x</p>
                                        <span class="shop-quantity-arrows">
                                            <a href="javascript:void(0)" onclick="update_quantity('up', '<?= $row->id?>')"> <i class="fa fa-angle-up"></i></a>
                                            <a href="javascript:void(0)" onclick="update_quantity('down', '<?= $row->id?>')"> <i class="fa fa-angle-down"></i></a>
                                        </span>
                                    </div>
                                    <div class="col-md-6 cloase-list">
                                        <a href="javascript:void(0)" onclick="remove_shopping_list_items('<?= $row->id?>')">
                                            <img  src="<?php echo $themeUrl?>/img/xras-list-icon.png">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 text-center">
                                <!--<img src="<?php /*echo $themeUrl*/?>/img/table-set.jpg" class="rs-responsive">-->
                                <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->relatedRecords['products']->id;?>/<?= pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_EXTENSION) ?>" class="rs-responsive1" style="width: 221px;height: 154px">
                            </div>
                            <div class="col-md-12 get-quaote">
                                <div class="row">
                                    <div class="col-md-5 get-quaote-detail">
                                        <h5><?php echo $row->relatedRecords['products']->name?> </h5>
                                        <?php
                                        $productVendors      = ProductVendors::find()->where(['id' => $row->relatedRecords['products']->product_vendors_id])->one();
                                        if($productVendors){$product_vendors_id=$productVendors->vendors_id;}else{$product_vendors_id=0;}
                                        $productVendorsDetail= Vendors::find()->where(['id' => $product_vendors_id])->one();
                                        //
                                        if($productVendorsDetail){$productVendorsDetail_userid=$productVendorsDetail->user_id;}else{$productVendorsDetail_userid=0;}
                                        $user_info           = User::find()->where(['id' => $productVendorsDetail_userid])->one();
                                        ?>
                                        <span>by <?php if($user_info){ echo $user_info->username;}else { echo "N/A"; }?></span>
                                    </div>
                                    <div class="col-md-7 get-quaote-btn">
                                        <?php if($row->price_offered!=0){?>
                                        <a href="javascript:void(0)" >Qoute Rs. <?= $row->price_offered?></a>
                                        <?php }elseif($row->status==0){
                                            if($row->relatedRecords['products']->availability==1){
                                                $a_content = "Get Quote";
                                                $a_onclick = "update_quote_status(".$row->id.", 2)";
                                             } else {
                                                $a_content = "Get Information";
                                                $a_onclick = "update_quote_status_get_information(".$row->id.", 7)";
                                             }?>
                                            <a href="javascript:void(0)" id="get_qoute_link_<?= $row->id?>" onclick="<?= $a_onclick ?>">
                                                <?= $a_content?>
                                            </a>
                                        <?php }elseif($row->status==2){?>
                                            <a href="javascript:void(0)" >Waiting fo Quote</a>
                                        <?php }elseif($row->status==7){?>
                                            <a href="javascript:void(0)" >Information requested</a>
                                        <?php } ?>
                                    </div>
                                    <div class="col-md-12">
                                        <?php if($row->status==0){?>
                                        <div class="checkbox get-quaote-checkbox">
                                            <input class="CB2RBVehicles" id="inlineCheckbox12" value="5-marla" name="plot-area" type="checkbox" checked>
                                            <label for="inlineCheckbox12">Get Quote from all Vendors & Manufacturers </label>
                                        </div>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                <?php
                $item_count++;
            }
            // Loop ended here
            //only completely Processed List will show "My Qoutes" tab here
            $processedShoppingListItems = ShoppingListItems::find()->where('user_shopping_list_id='. $prj->id.' AND assigned_user_id!=0')->count();
            if($ShoppingListItems!=0 && $prj->status==1 /*&& $ShoppingListItems==$processedShoppingListItems*/)
            {
                $seconds = strtotime($prj->date_updated. ' +10 days') - time();
                $days    = floor($seconds / 86400);
                $seconds %= 86400;
                $hours    = floor($seconds / 3600);
                $seconds %= 3600;
                $minutes = floor($seconds / 60);
                $seconds %= 60;
                ?>
                <div class="accordion-group accordion-group-list quotes-box">
                    <div class="accordion-heading accordion-heading-list">
                        <a class="accordion-toggle accordion-toggle-style " data-toggle="collapse" data-parent="#accordion3" href="#collapsethree">
                            <ul class="quotes-time">
                                <li>DAYS<span><?= $days?></span></li>
                                <li>HOURS<span><?= $hours?></span></li>
                                <li>MINS<span><?= $minutes?></span></li>
                            </ul>
                            <span class="my-quotes"> my quotes</span>
                        </a>
                    </div>
                    <div id="collapsethree" class="accordion-body collapse">
                        <div class="accordion-inner quotes-box-accordion-inner">
                        <?php
                        $item_count=1;
                        foreach ($ShopItems as $row)
                        {
                            ?>
                            <div class="total-cast-box">
                                <div class="total-cast-box-inner">
                                    <span class="total-cast-quantity"><?php echo $row->quantity?>x</span>
                                    <div class="col-md-4 total-box-rounded-img"><img style="width: 100px;height: 100px; border-radius: 50px;" src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->relatedRecords['products']->id;?>/<?= pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_EXTENSION) ?>"> </div>
                                    <div class="col-md-8 total-cast-box-detail">
                                        <?php
                                        $productVendors      = ProductVendors::find()->where(['id' => $row->relatedRecords['products']->product_vendors_id])->one();
                                        if($productVendors){$product_vendors_id=$productVendors->vendors_id;}else{$product_vendors_id=0;}
                                        $productVendorsDetail= Vendors::find()->where(['id' => $product_vendors_id])->one();
                                        if($productVendorsDetail){$productVendorsDetail_userid=$productVendorsDetail->user_id;}else{$productVendorsDetail_userid=0;}
                                        $user_info           = User::find()->where(['id' => $productVendorsDetail_userid])->one();
                                        ?>
                                        <h3><?= $row->relatedRecords['products']->name?> <span>  by <?php if($user_info){ echo $user_info->username; } ?></span></h3>
                                        <p><?= substr($row->relatedRecords['products']->description, 0, 80);?> </p>
                                        <h4>Total Cost <span>PKR <?= number_format($list_total)?></span></h4>
                                    </div>
                                    <div class="col-md-12 total-cast-box-btn">
                                        <a href="javascript:void(0)" onclick="save_shopping_list(<?= $prj->id;?>, 2)" class="total-cast-btn save_list_button" <?php if($prj->status==2){?>style="display: none;"<?php }?>>
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            SAVE
                                        </a>
                                        <a href="javascript:void(0)" onclick="save_shopping_list(<?= $prj->id;?>, 3)" class="total-cast-btn place_order_button" style="display: <?php if($prj->status==2){echo "inline-block";}else{ echo "none";}?>;">
                                            <i class="fa fa-heart" aria-hidden="true"></i>
                                            Place Order
                                        </a>
                                        <?php if($prj->status!=2){?>
                                        <a href="#" class="list_decline" onclick="save_shopping_list(<?= $prj->id;?>, 5)"><i class="fa fa-thumbs-down" aria-hidden="true"></i>decline</a>
                                        <a href="#" class="list_visit_showroom"  onclick="save_shopping_list(<?= $prj->id;?>, 4)">Visit Showroom</a>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                        <?php break; } ?>
                            <div class="row">
                                <?php
                                $item_count=1;
                                foreach ($ShopItems as $row)
                                {
                                ?>
                                <div class="col-md-12 p-r-l">
                                    <div class="product-notification-box">
                                        <div class="col-md-7">
                                            <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->relatedRecords['products']->id;?>/<?= pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_FILENAME).'_446-300.'.pathinfo($row->relatedRecords['products']->featured_image, PATHINFO_EXTENSION) ?>" class="product-notification-box-img">
                                            <h4 class="product-notification-name"><?php echo $row->relatedRecords['products']->name?></h4>
                                            <span class="product-notification-box-quantity"><?php echo $row->quantity?>x</span>
                                        </div>
                                        <div class="col-md-5 product-notification-value">
                                            <img src="/banjaiga/frontend/web/../../themes/banjaiga/img/notification-xras.png" class="notification-xras">
                                            <h3>PKR <?= number_format($row->price_offered)?></h3>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                    $item_count++;
                                }?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
    }
    ?>
    </div>
    <div class="footer-shopping-list-modal col-md-12">
        <a href="javascript:void(0)"  class="green-defualt" onclick="add_new_list();">ADD LIST</a>
        <?php
        if($ShoppingListItems!=0 && $ShoppingListItems==$processedShoppingListItems)
        {
            //don't show clear list
        }else{?>
            <a href="javascript:void(0)"  class="green-defualt" onclick="return clear_list();">CLEAR LIST</a>
        <?php }?>
        <a href="#" class="grey-defualt" onclick="confirm('Are you sure you want to save?')">SAVE LIST</a>
    </div>
</div>
<!--shopping cart ends-->
<?php
}
?>
<div class="header">
    <div class="left-pad-none">
        <nav class="navbar navbar-inverse top-nav-bar">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".js-navbar-collapse"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
                <a class="navbar-brand" href="<?php Yii::$app->request->getBaseUrl(true);?>?r=site">
                    <img src="<?php echo $themeUrl; ?>/img/logo-and-text_01_beta.png" style="/*height: 50px*/; margin-top: 5px;">
                </a>
            </div>
            <div class="collapse navbar-collapse js-navbar-collapse">
                <ul class="nav navbar-nav main-mega-menu">
                    <li class="dropdown mega-dropdown"> <a href="#" style="padding-left: 0px;" class="dropdown-toggle" data-toggle="dropdown">About us <!-- <span class="caret"></span>--></a>
                        <ul class="dropdown-menu mega-dropdown-menu">
                            <li>
                                <p class="col-lg-12">Meet the team responsible for "Building Happiness" in the construction industry: Our close-knit team of Architects, Designers, Material experts and technicians have hundreds of successful projects under their belts</p>
                                <a href="#" class="btn mega-drop-down-btn" data-toggle="modal" data-target="#workingModal">READ MORE</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown mega-dropdown"> <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/how-it-works" target="_blank" > How it works </a> </li>
                    <li class="dropdown mega-dropdown"> <a href="#" data-toggle="modal" data-target="#myModal">Start your project </a> </li>
                    <li class="dropdown mega-dropdown"> <a href="#" >For Professionals <i class="fa fa-angle-down"></i></a>
                        <ul class="dropdown-menu mega-dropdown-menu-custom">
                            <li><a href="http://banjaiga.com/vendors.html" target="_blank">Vendors</a></li>
                            <li><a href="http://banjaiga.com/vendors.html" target="_blank">Manufacturers </a></li>
                            <li><a href="http://banjaiga.com/architects.html" target="_blank">Architects </a></li>
                        </ul>
                    </li>
                </ul>
                <!--<ul class="nav navbar-nav navbar-right social-links">
                  <li><a href="#" data-toggle="modal" data-target="#workingModal"><i class="fa fa-lg fa-google-plus"></i></a></li>
                  <li><a href="#" data-toggle="modal" data-target="#workingModal"><i class="fa fa-twitter"></i></a></li>
                  <li><a href="#" data-toggle="modal" data-target="#workingModal"><i class="fa fa-lg fa-facebook"></i></a></li>
                </ul>-->
                <ul class="nav navbar-nav navbar-right phonenumber">
                    <li>
                        <a href="#" >
                            <img src="<?php echo $themeUrl; ?>/img/phonenumers_03.jpg" >+92&nbsp;51&nbsp;2814068
                        </a>
                    </li>
                </ul>
                <div class="pull-right cart">
                    <span class="">
                        <a href="#">
                            <img src="<?php echo $themeUrl; ?>/img/cart.png" onclick="toggle_sopping_list('shopping-list')">
                        </a>
                    </span>
                </div>

                <ul class="nav navbar-nav main-mega-menu pull-right login-signup-menu">
                    <?php
                    if (Yii::$app->user->isGuest) {
                        ?>
                        <li><a href="#" data-toggle="modal" data-target="#loginModal">Log in </a></li>
                        <li><a href="#" data-toggle="modal" data-target="#workingModal">signup </a></li>
                        <?php
                    } else {
                        //echo "<pre>";print_r(Yii::$app->user->identity->username);exit;
                       ?>
                        <!--<li style="display: none;">.</li>-->
                        <li>
                            <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/logout" >Logout </a>
                        </li>

                        <?php
                        if(Yii::$app->user->identity->user_type=='architect' && ($vendormodel=Architects::findOne(['user_id' => Yii::$app->user->identity->id])) !== null)
                        {
                            $action = "architect-dashboard&id=".$vendormodel->id."&user_id=".Yii::$app->user->identity->id;
                        }
                        elseif(Yii::$app->user->identity->user_type=='vendor' && ($architectmodel=Vendors::findOne(['user_id' => Yii::$app->user->identity->id])) !== null)
                        {
                            $action = "vendor-dashboard&id=".$architectmodel->id."&user_id=".Yii::$app->user->identity->id;
                        }
                        elseif(Yii::$app->user->identity->user_type=='normal' )
                        {
                            $action = "customer-dashboard&user_id=".Yii::$app->user->identity->id;
                        }
                        else
                        {
                            $action = "";
                        }
                        ?>
                        <li>
                            <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/<?php echo $action;?>" >Profile </a>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <!-- /.nav-collapse -->
        </nav>
    </div>
</div>