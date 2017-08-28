<?php
use yii\helpers\Html;
use frontend\assets\BanjaigaAsset;
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
/* @var $this \yii\web\View */
/* @var $content string */
$asset = BanjaigaAsset::register($this);
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
?>
<script>
    $(document).ready(function() {
        $(".dropdown").hover(
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideDown("400");
                $(this).toggleClass('open');
            },
            function () {
                $('.dropdown-menu', this).not('.in .dropdown-menu').stop(true, true).slideUp("400");
                $(this).toggleClass('open');
            }
        );
        $('input:text').blur(function () {
            if ($(this).hasClass('search_keywords')) {
                return false;
            }
            if ($(this).val() == '') {
                $(this).addClass('red-border');
            } else {
                $(this).removeClass('red-border');
            }
            if ($(this).attr('name') == 'user_email' && !banjaiga_validateEmail($(this).val())) {
                $(this).addClass('red-border');
            }
        });
    });
//Show less nad More code
    $(document).ready(function() {
        var len = document.querySelectorAll('#accordion2 .accordion-group-list').length;
        var quotes_box = document.querySelectorAll('#accordion2 .quotes-box').length;
       /* len = (len-quotes_box);*/
        $('#total_items').html(len+' ITEMS added');
        function splitText(text) {
            var textBreak = textLimit;
            var first = text.substring(0, textBreak);
            var second = text.substring(textBreak);
            var aux = second.substring(0, second.indexOf(" "));
            var spaceIndex = second.indexOf(" ");
            second = " " + second.substring(spaceIndex + 1);
            first = first.substring(0, textBreak) + aux;
            var bothTextes = [first, second];
            return bothTextes;
        }
        var textLimit = 260;
        var text = $("#companyDetails").html();
        if (text && text.length > textLimit) {
            var textArray = splitText(text);
            $("#companyDetails").text(textArray[0]);
            $("#companyDetails").append("<a onclick=\"expandText()\" class='show-more'>...<span class=\"red\">Read More <i class=\"fa fa-angle-right\"></i></span></a>");
            $("#companyDetails").append("<span style=\"display: none\" class='rest-of-description'>" + textArray[1] + "</span>");
            $("#companyDetails").append("<a onclick=\"collapseText()\" style=\"display: none\" class='red show-less'>  <i class=\"fa fa-angle-left\"></i> Show Less </a>");
        } else {
            $("#companyDetails").text(text);
        }
        $('[data-toggle="popover"]').popover();

        if (typeof(Storage) !== "undefined") {
            if (localStorage.shopping_list_id) {
                //alert(localStorage.shopping_list_id);
                toggle_sopping_list('shopping-list');
                $('.shopping_list_body_'+localStorage.shopping_list_id).addClass('in');
                localStorage.removeItem("shopping_list_id");
            }
        }

    })
    //following code replace error images with default image
    $('.container img').each(function (e) {
        var URL = $(this).attr("src");
        testImage(URL, this);
    });
    function testImage(url, cur_img) {
        var res = url.split('/');
        if(res.indexOf('uploads') != -1)
        {
            var tester = new Image();
            tester.addEventListener('load', imageFound);
            tester.addEventListener('error' , function(){
                imageNotFound(cur_img);
            });
            tester.src = '<?php echo $ssl[0];?>://<?php echo $_SERVER['SERVER_NAME'];?>'+url;
        }
    }
    function imageFound() {
    }
    function imageNotFound(cur_img) {
        $(cur_img).attr("src",'<?php echo $ssl[0];?>://<?php echo $_SERVER['SERVER_NAME'];?>/banjaiga/themes/banjaiga/img/no-image-icon-158_87.jpg');
    }
    function expandText() {
        $(".rest-of-description").show();
        $(".show-less").show();
        $(".show-more").hide();
    }
    function collapseText() {
        $(".rest-of-description").hide();
        $(".show-less").hide();
        $(".show-more").show();
    }
    function toggle_id(myid) {
        $('#'+myid).toggle();
    }
    function toggle_sopping_list(myid) {
        <?php
        if(Yii::$app->user->isGuest==true || Yii::$app->user->identity->user_type!='normal')
        {?>
            alert('Login as customer first');
            <?php
        }
        ?>
        if($('#'+myid).attr('style')=='display: none;')
        {
            $('#'+myid).css('display','block');
            $('body').append( '<div class="modal-backdrop fade in" onclick="toggle_sopping_list(&#39;'+myid+'&#39;)"></div>');
        }
        else {
            $('#'+myid).css('display','none');
            $('body .modal-backdrop.fade.in').remove();

        }
    }
    function update_quantity(changing, shopping_list_items_id) {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/update-quantity&changing="+changing+"&shopping_list_items_id="+shopping_list_items_id;
        $.ajax({
            type: "POST",
            url: url,
            /*data: all_data,*/
            dataType: 'json',
            success: function (data)
            {
                $('.shop-quantity-'+shopping_list_items_id).html(data.new_quantity+'px');
            }
        });
    }
    function remove_shopping_list_items(shopping_list_items_id) {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/remove-shopping-list-items&shopping_list_items_id="+shopping_list_items_id;
        $.ajax({
            type: "POST",
            url: url,
            /*data: all_data,*/
            dataType: 'json',
            success: function (data)
            {
                $('.shopping_list_item_'+shopping_list_items_id).remove();

                var len = document.querySelectorAll('#accordion2 .accordion-group-list').length;
                var quotes_box = document.querySelectorAll('#accordion2 .quotes-box').length;
                /*len = (len-quotes_box);*/
                $('#total_items').html(len+' ITEMS added');
                //
                if (typeof(Storage) !== "undefined") {
                    localStorage.setItem("shopping_list_id", shopping_list_id);
                }
                location.reload();
            }
        });
    }
    function change_shoping_list(shopping_list_id) {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/change-shoping-list&shopping_list_id="+shopping_list_id;
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            success: function (data)
            {
                if (typeof(Storage) !== "undefined") {
                    localStorage.setItem("shopping_list_id", shopping_list_id);
                }
                location.reload();
            }
        });
    }
    function add_new_list() {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/add-new-list";
        $.ajax({
            type: "POST",
            url: url,
            dataType: 'json',
            success: function (data)
            {
                if (typeof(Storage) !== "undefined") {
                    localStorage.setItem("shopping_list_id", data.usl_id);
                }
                location.reload();
            }
        });
    }
    function update_quote_status(item_id, status, proceed=null) {
        $('#qoutationModal').modal("show");
        $('#confirm-qoutation').attr('onclick','update_quote_status('+item_id+', '+status+', 1)');
        if(proceed===1)
        {
            var url = "<?php echo $site_base_url;?>/index.php?r=site/update-quote-status-ajax";
            var formdata={
                item_id:item_id,
                status:status
            }
            $.ajax({
                type: "POST",
                url: url,
                data:formdata,
                dataType: 'json',
                success: function (data)
                {
                    $('#get_qoute_link_'+item_id).html('Waiting for Quote');
                    $('#get_qoute_link_'+item_id).attr('onclick','');
                    $('#qouteConfirmModal').modal("show");
                }
            });
        }
    }

    function update_quote_status_get_information(item_id, status) {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/update-quote-status-ajax";
        var formdata={
            item_id:item_id,
            status:status
        }
        $.ajax({
            type: "POST",
            url: url,
            data:formdata,
            dataType: 'json',
            success: function (data)
            {
                $('#shopping_list_item_id').val(item_id);
                $('#make_a_requestModal').modal("show");
            }
        });
    }
    function submit_make_a_request_form() {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/submit-makea-request-form-ajax";
        var formdata = $('#make_a_request').serialize();
        var item_id = $('#shopping_list_item_id').val();
        $.ajax({
            type: "POST",
            url: url,
            data:formdata,
            dataType: 'json',
            success: function (data)
            {
                $('#get_qoute_link_'+item_id).html('Information requested');
                $('#get_qoute_link_'+item_id).attr('onclick','');
            }
        });
    }
    function clear_list() {
        if(confirm("Are you sure you want to clear the list.")) {
            var url = "<?php echo $site_base_url;?>/index.php?r=site/clear-list-ajax";
            $.ajax({
                type: "POST",
                url: url,
                dataType: 'json',
                success: function (data) {
                    $("#accordion2").html('');
                    var len = document.querySelectorAll('#accordion2 .accordion-group-list').length;
                    var quotes_box = document.querySelectorAll('#accordion2 .quotes-box').length;
                    /*len = (len-quotes_box);*/
                    $('#total_items').html(len+' ITEMS added');
                    //
                    if (typeof(Storage) !== "undefined") {
                        localStorage.setItem("shopping_list_id", shopping_list_id);
                    }
                    location.reload();
                }
            });
        }
    }
    function change_list_title(current_list_id) {
        $('.main-heading-shopping-list-modal img').hide();
        var cur_list_title = $('#current_list_span').html();
        $('#current_list_span').html('<input type="text" id="changed_title" value="'+cur_list_title+'" style="width: 50%;margin-right: 10px;"><li onclick="save_list_title('+current_list_id+')" class="glyphicon glyphicon-floppy-save" title="Save Changes"></li> ');

    }
    function save_list_title(current_list_id) {
        var url = "<?php echo $site_base_url;?>/index.php?r=site/save-list-title-ajax";
        var formdata = {
            current_list_id:current_list_id,
            changed_title  :$('#changed_title').val(),
        }
        $.ajax({
            type: "POST",
            url: url,
            data: formdata,
            dataType: 'json',
            success: function (data)
            {
                $('#current_list_span').html(data.title);
                $('.main-heading-shopping-list-modal img').show();

            }
        });
    }
    //Star Rating code goes here
    function highlightStar(obj,id) {
        removeHighlight(id);
        $('#tutorial-'+id+' li').each(function(index) {
            $(this).addClass('highlight');
            if(index == $('#tutorial-'+id+' li').index(obj)) {
                return false;
            }
        });
    }
    function removeHighlight(id) {
        $('#tutorial-'+id+' li').removeClass('selected');
        $('#tutorial-'+id+' li').removeClass('highlight');
    }
    function addRating(obj,id) {
        $('#tutorial-'+id+' li').each(function(index) {
            $(this).addClass('selected');
            $('#rating-'+id).val((index+1));
            if(index == $('#tutorial-'+id+' li').index(obj)) {
                return false;
            }
        });
        /*$.ajax({
         url: "add_rating.php",
         data:'id='+id+'&rating='+$('#rating-'+id).val(),
         type: "POST"
         });*/
    }
    function save_shopping_list(list_id, status) {
        $.ajax({
             url: "<?php echo $site_base_url;?>/index.php?r=site/save-shopping-list-ajax",
             data:'list_id='+list_id+'&status='+status,
             type: "POST",
            dataType:'json',
            success: function (data)
            {
                if(status==3)
                {
                    $('#saveShoppingListModal').modal("show");
                    $('.save_list_button').hide();
                    $('.list_decline').hide();
                    $('.list_visit_showroom').show();
                    $('.place_order_button').show();
                }
                if(status==6)
                {
                    $('#placeOrderListModal').modal("show");
                    $('.place_order_button').hide();
                    $('.order_placed_button').show();
                    $('.order_placed_button').removeClass('total-cast-btn');
                }
                if(status==4)
                {
                    $('#visitShowroomListModal').modal("show");
                }
                if(status==5)
                {
                    $('#declineListModal').modal("show");
                    $('.submit_decline_feedback').attr("onclick",'submit_decline_feedback('+list_id+')');
                }
            }
         });
    }
    function submit_decline_feedback(list_id) {
        var list_feedback_form =$('#list_feedback_form').serialize();
        $.ajax({
            url: "<?php echo $site_base_url;?>/index.php?r=site/save-shopping-list-ajax",
            data:list_feedback_form+'&list_id='+list_id,
            type: "POST",
            dataType:'json',
            success: function (data)
            {

            }
        });
    }
    function submit_ratings() {
        //localStorage.removeItem('product_ids');
        var pro_id = $("#product-id-rating").val();
        var ratingphonenumebr = $("#rating-phonenumebr").val();
        if(ratingphonenumebr=='')
        {
            alert('Enter your Phone Number first');
            return false;
        }
        if (typeof(Storage) !== "undefined" ) {
            console.log(localStorage.getItem("product_ids"));
            var storedIds = [];
            if(localStorage.getItem("product_ids")){  storedIds = JSON.parse(localStorage.getItem("product_ids")); }
            var proceed=true;
            for (item in storedIds)
            {
                //alert(storedIds[item]);
                if(storedIds[item] ==pro_id)
                {
                    proceed = false;
                }
            }
            if(proceed)
            {
                storedIds.push(pro_id);
                localStorage.setItem("product_ids", JSON.stringify(storedIds));
                //
                var formdata ={
                    seller_comu     :$("#rating-1").val(),
                    buy_again       :$("#rating-3").val(),
                    product_quality :$("#rating-2").val(),
                    products_id     :$("#product-id-rating").val(),
                    rating          :$("#rating-textarea").val(),
                    ratingphonenumebr:ratingphonenumebr,
                }
                $.ajax({
                    url: "<?php echo $site_base_url;?>/index.php?r=site/add-review",
                    data:formdata,
                    type: "POST",
                    dataType:'json',
                    success: function (data)
                    {
                        //location.reload();
                        alert('Thanks for your feedback.');
                    }
                });
            }
            else
            {
                alert('You have Already submited Review for this product');
            }

        } else {

        }
    }
    function resetRating(id) {
        if($('#rating-'+id).val() != 0) {
            $('#tutorial-'+id+' li').each(function(index) {
                $(this).addClass('selected');
                if((index+1) == $('#rating-'+id).val()) {
                    return false;
                }
            });
        }
    }
    //Star Rating code ends
</script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.0.47/jquery.fancybox.min.js"></script>
<style>
    .red-border {
        border:1px solid red !important;
    }
    #submit-final-step:hover {
        background: #fff none repeat scroll 0 0 !important;
        color: #35b0a0;
    }
    .btn-group.bootstrap-select {
        background-color:#fff;
    }
    .modal-body.thanks-modal-body ul {
        padding-left: 12px;
        text-align: center;
    }
    .modal-backdrop.fade.in
    {
        z-index: 10;
    }
</style>