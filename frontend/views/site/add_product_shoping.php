<?php
use backend\models\Vendors;
use backend\models\ShoppingListItems;
use backend\models\ProductVendors;
use backend\models\User;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$row = ShoppingListItems::find()->where(['id'=>$sli_id])->with(['products','user'])->one();
if($row)
{
    $item_count=$cnt;
    ?>
    <div class="accordion-group accordion-group-list <?php if($item_count==0){ echo "active"; }?> shopping_list_item_<?= $row->id?>">
        <div class="accordion-heading accordion-heading-list">
            <a class="accordion-toggle accordion-toggle-style " data-toggle="collapse" data-parent="#accordion2" href="#collapse_<?php  echo $item_count;?>">
                <!--<img src="<?php /*echo $themeUrl*/?>/img/sofa-list-icon.png">-->
                <?php if($cat =ShoppingListItems::getCategory($row->relatedRecords['products']->product_categories_id,'category')){echo $cat;}else{echo "Others";};?>

            </a>
        </div>
        <div id="collapse_<?php  echo $item_count;?>" class="accordion-body collapse">
            <div class="accordion-inner accordion-inner-list">
                <div class="cart-quote col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-6">
                                    <p class="shop-quantity shop-quantity-<?= $row->id?>"><?php echo $row->quantity?>px</p>
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
                                    $productVendors         = ProductVendors::find()->where(['id' => $row->relatedRecords['products']->product_vendors_id])->one();
                                    if($productVendors){$product_vendors_id=$productVendors->vendors_id;}else{$product_vendors_id=0;}
                                    $productVendorsDetail   = Vendors::find()->where(['id' => $product_vendors_id])->one();

                                    if($productVendorsDetail){$productVendorsDetail_userid=$productVendorsDetail->user_id;}else{$productVendorsDetail_userid=0;}
                                    $user_info              = User::find()->where(['id' => $productVendorsDetail_userid])->one();
                                    ?>
                                    <span>by <?php if($user_info){ echo $user_info->username;}else { echo "N/A"; }?></span> </div>
                                <div class="col-md-7 get-quaote-btn">
                                    <?php if($row->price_offered!=0){?>
                                        <a href="javascript:void(0)" >Qoute Rs. <?= $row->price_offered?></a>
                                    <?php }elseif($row->status==0){?>
                                        <a href="javascript:void(0)" id="get_qoute_link_<?= $row->id?>" onclick="update_quote_status(<?= $row->id ?>,'2')">

                                            <?php if($row->relatedRecords['products']->availability==1){?>
                                                Get Quote
                                            <?php } else {?>
                                                Get Information
                                            <?php }?>
                                        </a>
                                    <?php }elseif($row->status==2){?>
                                        <a href="javascript:void(0)" >Waiting fo Quote</a>
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
}
?>

