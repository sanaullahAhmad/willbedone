<?php

use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\UserShoppingList */

$this->title = 'Update User Shopping List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'User Shopping Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id]];
$this->params['breadcrumbs'][] = 'Update';
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);

?>
<?php $form = ActiveForm::begin(); ?>
<div class="container">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
    <?php /*echo $this->render('_form', [
        'model'     => $model,
        'users_row' => $users_row,
    ])*/ ?>
</div>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Update List</a></li>
    <li><a data-toggle="tab" href="#product_assignment">Product Assingment</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Update Vendor</h3>
        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        <?=  $form->field($model, 'status')->dropdownList([
            '1' => 'Processed',
            '0' => 'Pending'
        ],
            ['prompt'=>'Select']
        ); ?>
        <?=  $form->field($model, 'user_id')->dropdownList($users_row,
            ['prompt'=>'Select User', 'id' => 'user_id']
        ); ?>
    </div>
    <div id="product_assignment" class="tab-pane fade">
        <h3>Product Assingment</h3>
        <span class="btn btn-info add"  onclick="add_product()">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add Product</span>
        </span>
        <table role="presentation" class="table table-striped products-table">
            <tbody class="files">
            <tr>
                <th colspan="2">Product</th>
                <th>Vendor</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Price Offered</th>
                <th>Actions</th>
            </tr>
        <?php
        if($ShoppingListItems)
        {
            foreach ($ShoppingListItems as $row)
            {
                ?>
                <tr class="template-download fade in img_id_<?= $row->id?>">
                    <td>
                        <?php
                        echo  $model->getInfo($row->products_id, 'name','products');
                        ?>
                        <input type="hidden" name="shopping_list_items_id[<?= $row->id ?>]" value="<?= $row->id ?>">
                    </td>
                    <td>
                        <img style="width: 150px" src="../../frontend/web/uploads/products-images/<?= $row->products_id?>/<?= $model->getInfo($row->products_id, 'featured_image','products')?>"
                    </td>
                    <td>
                        <p class="name">
                            <select name="assigned_user_id[<?= $row->id ?>]"  class="form-control">
                                <option value="">Select Vendor</option>
                                <?php if($Vendors){
                                    foreach($Vendors as $user){
                                        echo "<option value=" . $user->id . "";
                                        if ($user->id == $row->assigned_user_id) {
                                            echo " selected";
                                        }
                                        echo ">" . $user->username . "</option>";
                                    }
                                }?>
                            </select>
                        </p>
                    </td>
                    <td>
                        <?= $row->quantity ?> <?php echo $qty =$model->getInfo($model->getInfo($row->products_id, 'unit_id','products'), 'name', 'units') ?>
                    </td>
                    <td>
                        <?php if($model->getInfo($row->products_id, 'is_multiple','products')==0){?>
                        Actual Price : <?= $model->getInfo($row->products_id, 'actual_price','products') ?> per <?=  $qty?><br>
                        Banjaiga Price : <?= $model->getInfo($row->products_id, 'banjaiga_price','products') ?> per <?=  $qty?>
                        <?php } else {?>
                        Starting From : <?= $model->getInfo($row->products_id, 'starting_from','products') ?> per <?= $qty?>
                        <?php }?>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="price_offered[<?= $row->id ?>]" value="<?= $row->price_offered ?>" style="float: left;max-width: 150px"> <div style="max-width: 200px; float: left; margin: 10px 0 0 10px;"> Per Unit</div>
                    </td>
                    <td>
                        <span class="btn btn-danger delete"  onclick="delete_shopping_list_items('<?= $model->id ?>','<?= $row->id ?>')">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                        </span>
                        <?php
                        $shopping_list_items_info = \backend\models\ShoppingListItemsInfo::find()->where(['shopping_list_item_id'=> $row->id ])->count();
                        if($shopping_list_items_info>0) {?>
                            <br>
                            <a href="<?= $site_base_url?>/?r=user-shopping-list/see-info&id=<?= $row->id ?>" class="btn btn-info info" style="width: 77px;margin-top: 5px;">
                                <i class="glyphicon glyphicon-plane"></i>
                                <span>Info</span>
                            </a>
                        <?php }?>
                        <?php
                        if(!$row->is_processed) {?>
                            <br>
                            <a href="javascript:void(0)" onclick="mark_processed_shopping_list_items('<?= $model->id ?>','<?= $row->id ?>')" class="btn btn-info  mark-procesed-btn-<?= $row->id ?>" style="width: auto;margin-top: 5px;">
                                <span>Mark Processed</span>
                            </a>
                        <?php }?>
                        <br>
                        <?php
                        $b_content='';
                        $b_class='default';
                        if($row->status==0){ $b_content= "Fresh Item";$b_class='default';}
                        elseif($row->status==2 && $row->is_processed==1){ $b_content= "Quotation sent";$b_class='success';}
                        elseif($row->status==2){ $b_content= "Waiting for Quote";$b_class='primary';}
                        elseif($row->status==3){ $b_content= "Saved";$b_class='success';}
                        elseif($row->status==4){ $b_content= "Visit Showroom";$b_class='info';}
                        elseif($row->status==5){ $b_content= "Declined";$b_class='warning';}
                        elseif($row->status==6){ $b_content= "Order Placed";$b_class='success';}
                        elseif($row->status==7){ $b_content= "Information requestd";$b_class='info';}
                        elseif($row->status==8){ $b_content= "Information sent";$b_class='success';}
                        elseif($row->status==9){ $b_content= "Showroom Shown";$b_class='info';}
                        ?>
                        <a href="javascript:void(0)" class="btn btn-<?= $b_class?>" style="margin-top: 5px;">
                            <span>
                                Status =<?= $b_content ?>
                            </span>
                        </a>
                        <?php
                        if($row->status==7){
                            ?>
                            <a data-toggle="modal" data-target="#SendInformatioModal" onclick="$('.send_info_submit').attr('onclick','send_information(<?= $row->id?>)')" href="javascript:void(0)" class="btn btn-primary send_info_btn_<?= $row->id?>" style="margin-top: 5px;">
                                <span>
                                    Send Information Now
                                </span>
                            </a>



                            <?php
                        }
                        ?>
                <?php
                if($row->status==4){
                    ?>
                    <br>
                    <a href="javascript:void(0)" onclick="mark_showroom_visited_shopping_list_items('<?= $model->id ?>','<?= $row->id ?>')" class="btn btn-info  mark-showroom-visitede-btn-<?= $row->id ?>" style="width: auto;margin-top: 5px;">
                        <span>Mark Showroom Visited</span>
                    </a>
                    <?php
                }
                ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            <?php
        }
        ?> </tbody>
        </table>

        <!-- Modal -->

    </div>
</div>
<div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
<script>
    function delete_shopping_list_items(user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=user-shopping-list/delete-shopping-list-items&row_id='+row_id+'&user_id='+user_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.img_id_'+row_id).remove();
            }
        })
    }
    function send_information(row_id) {
        info_text = $('#send_cus_info').serialize();
        $.ajax({
            url: '<?php  $ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
                echo $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true); ?>/index.php?r=user-shopping-list/send-information&row_id='+row_id,
            dataType: 'json',
            type:'POST',
            data:info_text,
            success: function ( data)
            {
                $('.send_info_btn_' + row_id).html('Information Sent');
                $('.send_info_btn_' + row_id).attr('onclick', '');
                $('.send_info_btn_' + row_id).removeClass('btn-primary');
                $('.send_info_btn_' + row_id).addClass('btn-success');
            }
        })
    }
    function mark_processed_shopping_list_items(user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=user-shopping-list/mark-processed-shopping-list-items&row_id=' + row_id + '&user_id=' + user_id,
            dataType: 'json',
            type: 'POST',
            success: function (data) {
                $('.mark-procesed-btn-' + row_id).html('Processed');
                $('.mark-procesed-btn-' + row_id).attr('onclick', '');
                $('.mark-procesed-btn-' + row_id).removeClass('btn-info');
                $('.mark-procesed-btn-' + row_id).addClass('btn-success');
            }
        })
    }
    function mark_showroom_visited_shopping_list_items(user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=user-shopping-list/mark-showroom-visited-shopping-list-items&row_id='+row_id+'&user_id='+user_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.mark-showroom-visitede-btn-'+row_id).html('Showroom Visited');
                $('.mark-showroom-visitede-btn-'+row_id).attr('onclick','');
                $('.mark-showroom-visitede-btn-'+row_id).removeClass('btn-info');
                $('.mark-showroom-visitede-btn-'+row_id).addClass('btn-success');
            }
        })
    }
    //More Catalogue goes here
    function add_product() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.products-table') .append('<tr class="template-download fade in img_id_'+ran+'"><td><p class="name"><select name="products_id[&#39;'+ran+'&#39;]"  class="form-control" required><option value="">Select Product</option> <?php if($products){ foreach($products as $product){ echo "<option value=" . $product->id . "";   echo ">" . $product->name . "</option>"; } }?></select></p><input type="hidden" name="shopping_list_items_id[&#39;'+ran+'&#39;]" value="'+ran+'"></td><td> </td> <td><p class="name"><select name="assigned_user_id[&#39;'+ran+'&#39;]"  class="form-control" required><option value="">Select Vendor</option> <?php if($Vendors){ foreach($Vendors as $user){ echo "<option value=" . $user->id . "";   echo ">" . $user->username . "</option>"; } }?></select></p></td><td> <input type="text" name="quantity[&#39;'+ran+'&#39;]" required> </td><td>    </td><td> <input type="text" class="form-control" name="price_offered[&#39;'+ran+'&#39;]" value="0" style="float: left;max-width: 150px"> <div style="max-width: 200px; float: left; margin: 10px 0 0 10px;"> Per Unit</div> </td> <td> <span class="btn btn-danger delete"  onclick="delete_temp_product(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i><span>Delete</span></span></td></tr>');
    }
    function delete_temp_product(ran) {
        $('.img_id_'+ran).remove();
    }
</script>
