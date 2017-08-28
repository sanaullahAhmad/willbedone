<?php
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
$this->title = 'Banjaiga | Product';?>
<div class="container">
    <div class="row single-product-row">
        <div class="col-md-7">
            <div id="main_area">
                <!-- Slider -->
                <div class="row">
                    <div class="col-xs-12" id="slider">
                        <!-- Top part of the slider -->
                        <div class="col-md-2">
                            <div class="hidden-xs slider-products" id="slider-thumbs">
                                <!-- Bottom switcher of slider -->
                                <ul class="hide-bullets slider-products-list">
                                    <?php $count =0;
                                    foreach($ProductPictures as $related){
                                        ?>
                                        <li class=""> <a class="" id="carousel-selector-<?php echo $count;?>">
                                                <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $model->id;?>/<?= $related->file ?>">
                                            </a>
                                        </li>
                                        <?php
                                        $count++;
                                    }?>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <div class="carousel-bounding-box" id="carousel-bounding-box">
                                <div class="carousel slide" carousel-slider id="myCarousel">
                                    <!-- Carousel items -->
                                    <div class="carousel-inner" style="min-height: 500px;">
                                        <?php $count =0;
                                        foreach($ProductPictures as $related)
                                        {
                                            ?>
                                            <div class="<?php if($count==0) {echo 'active';}?> item" data-slide-number="<?php echo $count;?>">
                                                <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $model->id;?>/<?= $related->file ?>">
                                            </div>
                                            <?php
                                            $count++;
                                        }?>

                                    </div>
                                    <!-- Carousel nav -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/Slider-->
            </div>
            <div class="row">
                <div class="col-md-12 bt-mrg">
                    <a href="javascript:void(0)" class="single-product-btn green-btn" data-toggle="popover" data-trigger="focus"
                     data-content="<?php if($ProductCataloguemodel) { $c =1;foreach ($ProductCataloguemodel as $catl) { if($c> 1){ echo "<br />";}$c++; echo "<a href='".Yii::$app->request->getBaseUrl(true).'/uploads/product-catalogue/' . $model->id . '/' . $catl->catalogue."'>".$catl->name.'</a>'; }  }else{ echo "No Catalogues";}?>" data-html="true" data-placement="bottom" title="Catalogues">
                      <img src="<?php echo $themeUrl;?>/img/book-icon.png"> REQUEST Catalogue
                    </a>
                    <a href="#" class="single-product-btn grey-btn" onclick="addto_shoppinglist(<?= $model->id;?>, <?= $model->product_categories_id ?>)/* toggle_sopping_list('shopping-list')*/;">
                        <img src="<?php echo $themeUrl;?>/img/document-icon.png"><?php if($model->availability==1){?>ASK FOR QuotATION<?php }else {?>Get Information<?php }?>
                    </a>
                    <a href="#" class="like-btn"><img src="<?php echo $themeUrl;?>/img/hart-icon-big.png"></a>
                </div>
            </div>
            <div class="row row-about-products">
                <div class="col-md-12">
                    <h2 class="main-inner-heading">Related Products</h2>
                </div>
                <?php
                if($relatedProducts) {
                    $pro_count=0;
                    foreach ($relatedProducts as $row) {
                        ?>
                        <?php if($pro_count%4==0 && $pro_count!=0){ echo "<div style='clear:both'></div>";} ?>
                        <div class="col-md-3 <?php if($pro_count> 3){ echo "see-all-collections";} ?>">
                            <div class="related-product-view">
                                <h3 class="fill-heading"><?= substr($row->name, 0, 17) ?></h3>
                                <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/product&id=<?= $row->id;?>">
                                    <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= pathinfo($row->featured_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($row->featured_image, PATHINFO_EXTENSION) ?>" width="100%">
                                </a>
                            </div>
                        </div>
                        <?php
                        $pro_count++;
                    }
                }
                else
                {
                    ?>
                    <h3>No Related Product.</h3>
                    <?php
                }
                ?>
                <div class="col-md-12 text-right">
                    <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-collections');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
                </div>
            </div>
            <div class="row row-about-products">
                <div class="col-md-12">
                    <h2 class="main-inner-heading">Recommended Products</h2>
                </div>
                <?php
                if($RecomendedProducts) {
                    $pro_count=0;
                    foreach ($RecomendedProducts as $row) {
                        ?>
                        <?php if($pro_count%4==0 && $pro_count!=0){ echo "<div style='clear:both'></div>";} ?>
                        <div class="col-md-3 <?php if($pro_count> 3){ echo "see-all-products";} ?>">
                            <div class="related-product-view">
                                <h3 class="fill-heading"><?= substr($row->name, 0, 17) ?></h3>
                                <a href="<?php echo Yii::$app->request->getBaseUrl(true);?>?r=site/product&id=<?= $row->id;?>">
                                    <img src="<?php echo Yii::$app->request->getBaseUrl(true); ?>/uploads/products-images/<?php echo $row->id;?>/<?= pathinfo($row->featured_image, PATHINFO_FILENAME).'_332-250.'.pathinfo($row->featured_image, PATHINFO_EXTENSION) ?>" width="100%">
                                </a>
                            </div>
                        </div>
                        <?php
                        $pro_count++;
                    }
                }
                else
                {
                    ?>
                    <h3>No Products.</h3>
                    <?php
                }
                ?>
                <div class="col-md-12 text-right">
                    <p class="btn-see-all"> <a href="javascript:void(0)" onclick="toggle_class('see-all-products');">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
                </div>
            </div>
            <div class="row row-about-products">
                <div class="col-md-12">
                    <h2 class="main-inner-heading">Other Products</h2>
                </div>
                <div class="col-md-3">
                    <div class="related-product-view">
                        <h3 class="fill-heading">Riviera Black</h3>
                        <img src="<?php echo $themeUrl;?>/img/fryban.jpg" width="100%">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="related-product-view">
                        <h3 class="fill-heading">Limestone Biege </h3>
                        <img src="<?php echo $themeUrl;?>/img/bath-tube.jpg" width="100%">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="related-product-view">
                        <h3 class="fill-heading">Alpine Grey</h3>
                        <img  src="<?php echo $themeUrl;?>/img/other-prod3.jpg" width="100%">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="related-product-view">
                        <h3 class="fill-heading">Beola Grey</h3>
                        <img src="<?php echo $themeUrl;?>/img/other-prod4.jpg" width="100%">
                    </div>
                </div>
                <div class="col-md-12 text-right">
                    <p class="btn-see-all"> <a href="#">SEE ALL <i class="fa fa-angle-right"></i></a> </p>
                </div>
            </div>
            <div class="row row-about-products">
                <div class="col-md-12">
                    <h2 class="main-inner-heading">Customer Reviews</h2>
                </div>
                <?php
                $rating=0;
                if($ratingCount!=0)
                {
                    $rating = number_format( round($ratingSum/$ratingCount,1), 1);
                }
                ?>
                <div class="col-md-6"> <span class="review-point"><?php if($ratingCount!=0){ echo $rating;}else{ echo "0.0";}?></span>
                    <div class="reviews-star">
                        <!--<img src="<?php /*echo $themeUrl;*/?>/img/stars-icon.png">-->
                        <div class="rating-icons">
                            <ul>
                                <?php
                                for($i=1;$i<=5;$i++) {
                                    $selected = "";
                                    if($i<=$rating) {
                                        $selected = "selected";
                                    }
                                    ?>
                                    <li class='<?php echo $selected; ?>' >&#9733;</li>
                                <?php }  ?>
                            </ul>
                        </div>
                        <h6><?= $ratingCount?> Ratings & Reviews</h6>
                    </div>
                </div>
                <div class="col-md-6 publish-review-btn"><a class=" btn-default btn-standard profile-btn" href="#">Publish Review</a></div>
            </div>
            <div class="rating">
                <form method="post">
                    <div class="text-center rating-main-heading"> <img src="<?php echo $themeUrl;?>/img/rating-logo.png">
                        <h2>Rate Your Experiece</h2>
                    </div>
                    <ul>
                        <li>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="rating-heading">Communication with  Seller</h3>
                                    <p class="rating-p">How Responsive was the Seller during the whole process?</p>
                                </div>
                                <div class="col-md-4 rating-star-list">
                                    <!--<img src="<?php /*echo $themeUrl;*/?>/img/stars-icon.png">-->

                                    <div id="tutorial-1" class="rating-icons">
                                        <input type="hidden" name="seller_comu" id="rating-1" value="4" />
                                        <ul onMouseOut="resetRating(1);">
                                            <?php
                                            for($i=1;$i<=5;$i++) {
                                                $selected = "";
                                                if($i<=4) {
                                                    $selected = "selected";
                                                }
                                                ?>
                                                <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,1);" onmouseout="removeHighlight(1);" onClick="addRating(this,1);">&#9733;</li>
                                            <?php }  ?>
                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="rating-heading">Product Quality</h3>
                                    <p class="rating-p">Did the quality of the prodcut was upto the mark?</p>
                                </div>
                                <div class="col-md-4 rating-star-list">
                                   <!-- <img src="<?php /*echo $themeUrl;*/?>/img/stars-icon.png">-->
                                    <div id="tutorial-2" class="rating-icons">
                                        <input type="hidden" name="product_quality" id="rating-2" value="4" />
                                        <ul onMouseOut="resetRating(2);">
                                            <?php
                                            for($i=1;$i<=5;$i++) {
                                                $selected = "";
                                                if($i<=4) {
                                                    $selected = "selected";
                                                }
                                                ?>
                                                <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,2);" onmouseout="removeHighlight(2);" onClick="addRating(this,2);">&#9733;</li>
                                            <?php }  ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="row">
                                <div class="col-md-8">
                                    <h3 class="rating-heading">Buy Again or Recommended</h3>
                                    <p class="rating-p">Would you recommend buying this product?</p>
                                </div>
                                <div class="col-md-4 rating-star-list">
                                    <!--<img src="<?php /*echo $themeUrl;*/?>/img/stars-icon.png">-->
                                    <div id="tutorial-3" class="rating-icons">
                                        <input type="hidden" name="buy_again" id="rating-3" value="4" />
                                        <ul onMouseOut="resetRating(3);">
                                            <?php
                                            for($i=1;$i<=5;$i++) {
                                                $selected = "";
                                                if($i<=4) {
                                                    $selected = "selected";
                                                }
                                                ?>
                                                <li class='<?php echo $selected; ?>' onmouseover="highlightStar(this,3);" onmouseout="removeHighlight(3);" onClick="addRating(this,3);">&#9733;</li>
                                            <?php }  ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="text-center rating-main-heading"> <img src="<?php echo $themeUrl;?>/img/mgs-icon.png">
                        <h2>Rate Your Experiece</h2>
                        <textarea name="rating" id="rating-textarea" rows="5" placeholder="Help community by sharing your views regarding product and overall experience..."></textarea>
                        <input type="hidden" name="product-id-rating" id="product-id-rating" value="<?= $model->id?>">
                        <input type="text" name="rating-phonenumebr" id="rating-phonenumebr" placeholder="Phone Number" >
                        <a onclick="submit_ratings()" class=" btn-default btn-standard profile-btn" href="#">Save Review</a>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-md-5">
            <ul class="single-product-section">
                <li>
                    <h1 class="single-product-main-heading"><?php echo $model->name;?></h1>
                    <h5 class="single-product-heading-detail text-capitalize"><?php echo substr($model->description, 0, 40);?></h5>
                    <h5 class="single-product-heading-detail"><?php echo $model->sizweight;?> </h5>
                    <h3 class="single-product-star-heading"><img src="<?php echo $themeUrl;?>/img/stars-icon.png"> 9 Ratings & Reviews</h3>
                </li>
                <li>
                    <p class="single-product-pre">
                        <?php echo substr($model->long_description, 0, 500);?>
                    </p>
                    <p class="shopping-btn">
                        <a href="javascript:void(0)" onclick="addto_shoppinglist(<?= $model->id;?>, <?= $model->product_categories_id ?>)" class="single-product-btn green-btn">
                            <img src="<?php echo $themeUrl;?>/img/cart--icon-white.png">
                            ADD TO SHOPPING LIST
                        </a>
                    </p>
                </li>
                <li>
                    <h2 class="single-product-small-heading">Product Specification</h2>
                    <div class="row">
                        <div class="col-md-4 specification-detail bolder">
                            <p>Manufactured&nbsp;By </p>
                            <p>Sold By<?php
                                $soldby_mokup='';
                                $i =1;
                                if($vendorProfile){
                                    foreach($vendorProfile as $vend){
                                        $soldby_mokup .=$i.") ".$vend->full_name.", ";
                                        if($i<count($vendorProfile)){
                                            $soldby_mokup .="<br>";
                                            echo "<br>&nbsp;";
                                        }
                                        $i++;
                                    }
                                }else { $soldby_mokup .="N/A"; }?></p>
                            <p>Size/Weight </p>
                            <p>Materials </p>
                            <p>Category </p>
                            <p>Style </p>
                        </div>
                        <div class="col-md-8 specification-detail ">
                            <p> <?php if($manufacturerProfile){ echo $manufacturerProfile->full_name;}else { echo "N/A"; }?>&nbsp; </p>
                            <p> <?= $soldby_mokup ?> </p>
                            <p><?php echo $model->sizweight;?> &nbsp;</p>
                            <p><?php echo $model->material;?> &nbsp;</p>
                            <p><?php if($productCatDetail){ echo $productCatDetail->category; }else { echo "N/A"; }?> &nbsp;</p>
                            <p><?php echo $model->style;?>&nbsp; </p>
                        </div>
                    </div>
                </li>
                <li>
                    <h2 class="single-product-small-heading">Seller Information</h2>
                    <div class="row">
                        <div class="col-md-5 specification-detail bolder">
                            <p>Registration Number </p>
                            <p>Business Type </p>
                            <p>Active Since </p>
                            <p>Projects </p>
                            <p>Verification </p>
                        </div>
                        <div class="col-md-7 specification-detail ">
                            <p> <?php if($manufacturerProfile){ echo $manufacturerProfile->registration_number;}else { echo "N/A"; }?>&nbsp;</p>
                            <p><?php if($manufacturerProfile){ echo $manufacturerProfile->business_type;}else { echo "N/A"; }?>&nbsp; </p>
                            <p> <?php if($vendorInfo){ echo date("d M Y", $vendorInfo->created_at);}else { echo "N/A"; }?>&nbsp; </p>
                            <p> 28&nbsp; </p>
                            <p> Not Verified since <?php if($vendorInfo){ echo date("d M Y", $vendorInfo->created_at);}else { echo "N/A"; }?>&nbsp; </p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    window.onload = function() {
        $('#myCarousel').carousel({ interval: 5000 });
        $('#carousel-text').html(
            $('#slide-content-0').html()
        ); //Handles the carousel thumbnails
        $('[id^=carousel-selector-]').click( function()
        {
            var id = this.id.substr(this.id.lastIndexOf("-") + 1);
            var id = parseInt(id); $('#myCarousel').carousel(id);
        }); // When the carousel slides, auto update the text
        $('#myCarousel').on('slid.bs.carousel', function (e)
        {
            var id = $('.item.active').data('slide-number');
            $('#carousel-text').html($('#slide-content-'+id).html());
        });
    }
    function toggle_class(myclass) {
        $('.'+myclass).toggle();
    }
    function addto_shoppinglist(product_id, product_categories_id) {
        toggle_sopping_list('shopping-list');
        all_data={
            product_id:product_id,
            product_categories_id:product_categories_id
        }
        $.ajax({
            type: "POST",
            url: "<?php echo $site_base_url;?>/index.php?r=site/listadd",
            data: all_data,
            dataType: 'json',
            success: function (data) {
                if(data.result=='error')
                {
                    alert(data.message);
                }
                else
                {
                    /* REMOVED THIS PRVIOUS CODE OF AVOID RELOADING DUE TO AVOID LOADIN THIS ACCORDIAN AFTER TIME ACCORDIAN
                    $("#accordion2 .shopping_list_item_"+data.sli_id).remove();
                    $("#accordion2").append(data.product_mockup);
                    var len = document.querySelectorAll('#accordion2 .accordion-group-list').length;
                    $('#total_items').html(len+' ITEMS added');*/
                    if (typeof(Storage) !== "undefined") {
                        localStorage.setItem("shopping_list_id", data.sli_id);
                        $('.shopping_list_body_'+ data.sli_id).addClass('in');
                    }
                    location.reload();
                }
            }
        });
    }
</script>