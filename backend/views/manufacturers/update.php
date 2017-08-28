<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;

/* @var $this yii\web\View */
/* @var $model backend\models\manufacturers */

$this->title = 'Update Manufacturer: ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Manufacturers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $manufacturer_id, 'user_id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<h1><?= Html::encode($this->title) ?></h1>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>
<?php /*echo  $this->render('_form', [
        'model' => $model,
    ])*/ ?>
<?php $form = ActiveForm::begin(['id' => 'registration-form']); ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Update Manufacturer</a></li>
    <li><a data-toggle="tab" href="#menu1">Update Profile</a></li>
    <li><a data-toggle="tab" href="#menu3">Update Info</a></li>
    <li><a data-toggle="tab" href="#menu4">Additional</a></li>
    <li><a data-toggle="tab" href="#menu5">Collections</a></li>
    <li><a data-toggle="tab" href="#menu6">More Catalogues</a></li>
</ul>
<div class="tab-content">
    <div id="home" class="tab-pane fade in active">
        <h3>Update Manufacturer</h3>
        <?= $form->field($model, 'username') ?>
        <?= $form->field($model, 'email')->input('email') ?>
        <?= $form->field($model, 'phone') ?>
    </div>
    <div id="menu1" class="tab-pane fade">
        <h3>Update Profile</h3>
        <?php //echo "<pre>";print_r($model);exit;?>
        <?= $form->field($profilemodel, 'website') ?>
        <?= $form->field($profilemodel, 'address') ?>
        <?= $form->field($profilemodel, 'about') ?>
        <?= $form->field($profilemodel, 'phone') ?>
        <?= $form->field($profilemodel, 'full_name') ?>
        <?= $form->field($profilemodel, 'city') ?>
        <?= $form->field($profilemodel, 'country') ?>
        <?php echo  $form->field($profilemodel, 'profile_type')->dropdownList([
            'Type 1' => 'Type 1',
            'Type 2' => 'Type 2'
        ],
            ['prompt'=>'Select Profile Type']
        ); ?>
        <?php echo  $form->field($profilemodel, 'status')->dropdownList([
            '1' => 'Active',
            '0' => 'InActive'
        ],
            ['prompt'=>'Select']
        ); ?>



        <?php echo  $form->field($profilemodel, 'business_type') ?>
        <?php echo  $form->field($profilemodel, 'registration_number') ?>
        <div class="form-group">
            <label>&nbsp;</label>
        </div>


        <?php //echo  $form->field($profilemodel, 'logo')->fileInput() ?>
        <?php //echo $form->field($profilemodel, 'cover')->fileInput() ?>
        <?php echo  $form->field($logouploadmodel, 'logo')->fileInput([ 'accept' => 'image/*']) ?>
            <div class = "form-group">
                <?php if($profilemodel->getAttribute('logo') !=''){ ?>
                <img id="logofile" style="max-width: 500px;" src="../../frontend/web/uploads/manufacturers/<?php echo $manufacturer_id;?>/<?php echo $profilemodel->getAttribute('logo');?>">
                <?php }else {?>
                    <img id="logofile"  src="../../themes/banjaiga/img/multi-star-img1.jpg">
                <?php }?>
                <div id="jc_coords_logo" style="display: none">
                    <input type="hidden" id="lx" name="lx" />
                    <input type="hidden" id="ly" name="ly" />
                    <input type="hidden" id="lw" name="lw" />
                    <input type="hidden" id="lh" name="lh" />
                    <span onclick="return checkCoordsLogo();" class="btn btn-info" >Crop Image</span>
                </div>
            </div>
        <?php echo  $form->field($coveruploadmodel, 'cover')->fileInput([ 'accept' => 'image/*']) ?>
            <div class = "form-group">
                <?php if($profilemodel->getAttribute('cover') !=''){ ?>
                <img id="coverfile" style="max-width: 800px;" src="../../frontend/web/uploads/manufacturers/<?php echo $manufacturer_id;?>/<?php echo $profilemodel->getAttribute('cover');?>">
                <?php }else {?>
                    <img id="coverfile"  src="../../themes/banjaiga/img/multi-star-img1.jpg">
                <?php }?>
                <div id="jc_coords_cover" style="display: none">
                    <input type="hidden" id="cx" name="cx" />
                    <input type="hidden" id="cy" name="cy" />
                    <input type="hidden" id="cw" name="cw" />
                    <input type="hidden" id="ch" name="ch" />
                    <span onclick="return checkCoordsCover();" class="btn btn-info" >Crop Image</span>
                </div>
            </div>

        <?php echo  $form->field($catalogueuploadmodel, 'catalogue')->fileInput([ 'accept' => '.pdf']) ?>
        <?php if($profilemodel->getAttribute('cataloguefile') !=''){?>
            <div class = "form-group">
                <h4><?php echo $profilemodel->getAttribute('cataloguefile');?></h4>
            </div>
            <div class="form-group ">
                <label>&nbsp;</label>
            </div>
        <?php }?>
        <?php echo  $form->field($dealerlistuploadmodel, 'dealerlist')->fileInput([ 'accept' => '.xlsx']) ?>
        <?php if($profilemodel->getAttribute('dealerlistfile') !=''){?>
            <div class = "form-group">
                <h4><?php echo $profilemodel->getAttribute('dealerlistfile');?></h4>
            </div>
            <div class="form-group ">
                <label>&nbsp;</label>
            </div>
        <?php }?>

    </div>
    <div id="menu3" class="tab-pane fade">
        <h3>Update Info</h3>

        <span class="btn btn-info add"  onclick="add_info()">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add Info</span>
        </span>
        <table role="presentation" class="table table-striped infos-table">
            <tbody class="files">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Icon</th>
                <th>Actions</th>
            </tr>
            <?php
            if($VendorInfomodel){
                foreach ($VendorInfomodel as $row)
                {?>
                    <tr class="template-download fade in info_id_<?= $row->id?>">
                        <td>
                            <p class="name">
                                <input type="text" name="title[<?= $row->id ?>]" value="<?= $row->title ?>" class="form-control">
                            </p>
                        </td>
                        <td>
                            <p class="name">
                                <input type="text" name="description[<?= $row->id ?>]"  value="<?= $row->description ?>" class="form-control">
                            </p>
                        </td>
                        <td>
                            <div class="radio">
                                <label><input type="radio" name="icon[<?= $row->id ?>]" value="Question Mark" <?php if($row->icon=='Question Mark'){ ?>checked<?php }?> >Question Mark</label>
                                <br>
                                <label><input type="radio" name="icon[<?= $row->id ?>]" value="Arrow"  <?php if($row->icon=='Arrow'){ ?>checked<?php }?> >Arrow</label>
                            </div>
                        </td>
                        <td>
                            <span class="btn btn-danger delete"  onclick="delete_info('<?= $row->title?>','<?= $model->id ?>','<?= $row->id ?>')">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
            }?>
            </tbody>
        </table>
    </div>
    <div id="menu4" class="tab-pane fade">
        <h3>Additional addresses and  phone numbers</h3>
        <div class="row">
            <div class="col-md-6">
                <span class="btn btn-info add"  onclick="add_address()">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Address</span>
                </span>

                <table role="presentation" class="table table-striped addresses-table">
                    <tbody class="files">
                    <tr>
                        <th>Addresses</th>
                    </tr>
                    <?php
                    if($VendorAddressmodel){
                        foreach ($VendorAddressmodel as $row)
                        {?>
                            <tr class="template-download fade in address_id_<?= $row->id?>">
                                <td>
                                    <p class="name">
                                        <input type="text" name="address[<?= $row->id ?>]"  value="<?= $row->address ?>" class="form-control">
                                    </p>
                                </td>
                                <td>
                                    <span class="btn btn-danger delete"  onclick="delete_address('<?= $model->id ?>','<?= $row->id ?>')">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    }?>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6">
                <span class="btn btn-info add"  onclick="add_phone_number()">
                    <i class="glyphicon glyphicon-plus"></i>
                    <span>Add Phone Number</span>
                </span>
                <table role="presentation" class="table table-striped phonenumbers-table">
                    <tbody class="files">
                    <tr>
                        <th>Phone Numbers</th>
                    </tr>
                    <?php
                    if($VendorPhoneNumbersmodel){
                        foreach ($VendorPhoneNumbersmodel as $row)
                        {?>
                            <tr class="template-download fade in phone_number_id_<?= $row->id?>">
                                <td>
                                    <p class="name">
                                        <input type="text" name="phone_number[<?= $row->id ?>]"  value="<?= $row->phone_number ?>" class="form-control">
                                    </p>
                                </td>
                                <td>
                                    <span class="btn btn-danger delete"  onclick="delete_phone_number('<?= $model->id ?>','<?= $row->id ?>')">
                                        <i class="glyphicon glyphicon-trash"></i>
                                        <span>Delete</span>
                                    </span>
                                </td>
                            </tr>
                            <?php
                        }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <div id="menu5" class="tab-pane fade">
        <h3>Vendor Collections</h3>

        <span class="btn btn-info add"  onclick="add_collection()">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add Collections</span>
        </span>
        <table role="presentation" class="table table-striped collections-table">
            <tbody class="files">
            <tr>
                <th>Title</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
            <?php
            if($VendorCollectionmodel){
                foreach ($VendorCollectionmodel as $row)
                {?>
                    <tr class="template-download fade in collection_id_<?= $row->id?>">
                        <td>
                            <p class="name">
                                <input type="text" name="collection_title[<?= $row->id ?>]" value="<?= $row->title ?>" class="form-control">
                            </p>
                        </td>
                        <td>
                            <p class="name">
                                <input type="text" name="collection_description[<?= $row->id ?>]"  value="<?= $row->description ?>" class="form-control">
                            </p>
                        </td>
                        <td>
                            <span class="btn btn-danger delete"  onclick="delete_collection('<?= $row->title?>','<?= $model->id ?>','<?= $row->id ?>')">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </span>
                            <a class="btn btn-info delete"  href="<?php Yii::$app->request->getBaseUrl(true)?>?r=vendors/update-collection&id=<?= $row->id ?>">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <span>Edit</span>
                            </a>
                        </td>
                    </tr>
                    <?php
                }
            }?>
            </tbody>
        </table>
    </div>
    <div id="menu6" class="tab-pane fade">
        <h3>More Catalogues</h3>
        <span class="btn btn-info add"  onclick="add_catalogue()">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add Catalogue</span>
        </span>
        <table role="presentation" class="table table-striped catalogue-table">
            <tbody class="files">
            <tr>
                <th>Name</th>
                <th>Update Catalogue</th>
                <th>Catalogue</th>
                <th>Actions</th>
            </tr>
            <?php
            if($VendorCataloguemodel){
                foreach ($VendorCataloguemodel as $row)
                {?>
                    <tr class="template-download fade in catalogue_id_<?= $row->id?>">
                        <td>
                            <p class="name">
                                <input type="text" name="catalogue_name[<?= $row->id ?>]" value="<?= $row->name ?>" class="form-control">
                            </p>
                        </td>
                        <td>
                            <span class="preview">
                                <input type="file" accept=".pdf" name="catalogue[<?= $row->id ?>]" >
                            </span>
                        </td>
                        <td>
                            <span class="preview vendor-team-img">
                                <a href="../../frontend/web/uploads/user-catalogue/<?= $model->id ?>/<?= $row->catalogue?>" title="<?= $row->catalogue?>"  data-gallery="">
                                    <?= $row->catalogue?>
                                </a>
                            </span>
                        </td>
                        <td>
                            <span class="btn btn-danger delete"  onclick="delete_catalogue('<?= $row->catalogue?>','<?= $model->id ?>','<?= $row->id ?>')">
                                <i class="glyphicon glyphicon-trash"></i>
                                <span>Delete</span>
                            </span>
                        </td>
                    </tr>
                    <?php
                }
            }?>
            </tbody>
        </table>
    </div>
</div>

<div class = "form-group">
    <?= Html::submitButton('Submit', ['class' => 'btn btn-primary',
        'name' => 'profile-button']) ?>
</div>
<?php ActiveForm::end(); ?>

<script>
    //PhoneNumbers goes here
    function add_phone_number() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.phonenumbers-table') .append('<tr class="template-download fade in phone_number_id_'+ran+'"><td><p class="name"><input type="text" name="phone_number['+ran+']"  class="form-control"> </p> </td><td> <span class="btn btn-danger delete"  onclick="delete_temp_phone_number(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_phone_number(ran) {
        $('.phone_number_id_'+ran).remove();
    }
    function delete_phone_number( user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/phone-number-delete&user_id='+user_id+'&row_id='+row_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.phone_number_id_'+row_id).remove();
            }
        })
    }

    //Adresses goes here
    function add_address() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.addresses-table') .append('<tr class="template-download fade in address_id_'+ran+'"><td><p class="name"><input type="text" name="address['+ran+']"  class="form-control"> </p> </td><td> <span class="btn btn-danger delete"  onclick="delete_temp_address(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_address(ran) {
        $('.address_id_'+ran).remove();
    }
    function delete_address( user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/address-delete&user_id='+user_id+'&row_id='+row_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.address_id_'+row_id).remove();
            }
        })
    }
    //info goes here
    function add_info() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.infos-table') .append('<tr class="template-download fade in info_id_'+ran+'"><td><p class="name"><input type="text" name="title['+ran+']"  class="form-control"> </p> </td> <td> <p class="name"> <input type="text" name="description['+ran+']" class="form-control"></p></td> <td><div class="radio"><label><input type="radio" name="icon['+ran+']" value="Question Mark" checked>Question Mark</label><br><label><input type="radio" name="icon['+ran+']" value="Arrow">Arrow</label></div></td> <td><span class="btn btn-danger delete"  onclick="delete_temp_info(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_info(ran) {
        $('.info_id_'+ran).remove();
    }
    function delete_info(name, id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/info-delete&id='+row_id+'&user_id='+id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.info_id_'+row_id).remove();
            }
        })
    }

    //collection goes here
    function add_collection() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.collections-table') .append('<tr class="template-download fade in collection_id_'+ran+'"><td><p class="name"><input type="text" name="collection_title['+ran+']"  class="form-control"> </p> </td> <td> <p class="name"> <input type="text" name="collection_description['+ran+']"   class="form-control"> </p> </td>  <td> <span class="btn btn-danger delete"  onclick="delete_temp_collection(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_collection(ran) {
        $('.collection_id_'+ran).remove();
    }
    function delete_collection(name, id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/collection-delete&id='+row_id+'&user_id='+id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.collection_id_'+row_id).remove();
            }
        })
    }

    //More Catalogue goes here
    function add_catalogue() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
        $('.catalogue-table') .append('<tr class="template-download fade in catalogue_id_'+ran+'"><td><p class="name"><input type="text" name="catalogue_name['+ran+']"  class="form-control"> </p> </td><td><span class="preview"> <input type="file"  accept=".pdf" name="catalogue['+ran+']" ></span></td> <td></td> <td><span class="btn btn-danger delete"  onclick="delete_temp_catalogue(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_catalogue(ran) {
        $('.catalogue_id_'+ran).remove();
    }
    function delete_catalogue(name, user_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/catalogue-delete&name='+name+'&row_id='+row_id+'&user_id='+user_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.catalogue_id_'+row_id).remove();
            }
        })
    }

    window.onload = function() {
        // How easy is this??
        $('#logouploadmodel-logo').on('change', function(){
            $("#loading-gif").show();
            $('#logouploadmodel-logo').hide();//show it when crop button is clicked
            var data = new FormData();
            data.append('input_file_name', $('#logouploadmodel-logo').prop('files')[0]);
            // append other variables to data if you want: data.append('field_name_x', field_value_x);
            if ($('#logofile').data('Jcrop')) {
                $('#logofile').data('Jcrop').destroy();
            }
            $.ajax({
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                data: data,
                url: '<?php $ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
                    echo $ssl[0];?>://<?php echo $_SERVER['SERVER_NAME'];?>/banjaiga/backend/web/index.php?r=manufacturers/logo-cover-upload&id=<?php echo $manufacturer_id;?>&user_id=<?php echo $model->id;?>&image=<?php echo $profilemodel->getAttribute('logo');?>&fieldname=logo',
                dataType : 'json',
                // in PHP you can call and process file in the same way as if it was submitted from a form:
                // $_FILES['input_file_name']
                success: function(jsonData){
                    $("#loading-gif").hide();
                    if(jsonData.crop=='small-image-size-error')
                    {
                        alert("Image is too smalll for logo. Image should be at least 124px X 124px");
                    }
                    else if(jsonData.crop=='no')
                    {
                        $("#logofile").attr('src',jsonData.src);
                    }
                    else {
                        $("#logofile").attr('src',jsonData.src);
                        showratio = (500/parseInt(jsonData.width)).toFixed(2);
                        cordratio = (parseInt(jsonData.width)/500).toFixed(2);
                        showratio_width = (showratio*124).toFixed(2);
                        showratio_height = (showratio*124).toFixed(2);
                        cordratio_width = (cordratio*124).toFixed(2);
                        cordratio_height = (cordratio*124).toFixed(2);
                        $('#logofile').css('width',500);
                        $('#logofile').css('height','auto');
                        $('#logofile').Jcrop({
                            aspectRatio: showratio_width / showratio_height,
                            minSize: [ showratio_width,showratio_height ],
                            /*maxSize: [ 124,124 ],*/
                            onSelect: updateCoordsLogo,
                            setSelect: [0,0,cordratio_width,cordratio_height]
                        });
                        $("#jc_coords_logo").show();
                    }
                    $('#logouploadmodel-logo').val('');
                }

            });
        });
        $('#coveruploadmodel-cover').on('change', function(){
            $("#loading-gif").show();
            $('#coveruploadmodel-cover').hide();//show it when crop button is clicked
            var data = new FormData();
            data.append('input_file_name', $('#coveruploadmodel-cover').prop('files')[0]);
            // append other variables to data if you want: data.append('field_name_x', field_value_x);
            if ($('#coverfile').data('Jcrop')) {
                $('#coverfile').data('Jcrop').destroy();
            }
            $.ajax({
                type: 'POST',
                processData: false, // important
                contentType: false, // important
                data: data,
                url: '<?php $ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
                    echo $ssl[0];?>://<?php echo $_SERVER['SERVER_NAME'];?>/banjaiga/backend/web/index.php?r=manufacturers/logo-cover-upload&id=<?php echo $manufacturer_id;?>&user_id=<?php echo $model->id;?>&image=<?php echo $profilemodel->getAttribute('logo');?>&fieldname=cover',
                dataType : 'json',
                // in PHP you can call and process file in the same way as if it was submitted from a form:
                // $_FILES['input_file_name']
                success: function(jsonData){
                    $("#loading-gif").hide();
                    if(jsonData.crop=='small-image-size-error')
                    {
                        alert("Image is too smalll for cover. Image should be at least 11336px X 388px");
                    }
                    else if(jsonData.crop=='no')
                    {
                        $("#coverfile").attr('src',jsonData.src);
                    }
                    else {
                        $("#coverfile").attr('src',jsonData.src);

                        showratio = (800/parseInt(jsonData.width)).toFixed(2);
                        cordratio = (parseInt(jsonData.width)/800).toFixed(2);

                        showratio_width = (showratio*1136).toFixed(2);
                        showratio_height = (showratio*388).toFixed(2);

                        cordratio_width = (cordratio*1136).toFixed(2);
                        cordratio_height = (cordratio*388).toFixed(2);

                        $('#coverfile').css('width',800);
                        $('#coverfile').css('height','auto');
                        $('#coverfile').Jcrop({
                            aspectRatio: showratio_width / showratio_height,
                            minSize: [ showratio_width,showratio_height ],
                            /*maxSize: [ 1136,388 ],*/
                            onSelect: updateCoordsCover,
                            setSelect: [0,0,cordratio_width,cordratio_height]
                        });
                        $("#jc_coords_cover").show();
                    }
                    $('#coveruploadmodel-cover').val('');
                }
            });
        });
    }
    function updateCoordsLogo(c)
    {
        jQuery('#lx').val(c.x*cordratio);
        jQuery('#ly').val(c.y*cordratio);
        jQuery('#lw').val(c.w*cordratio);
        jQuery('#lh').val(c.h*cordratio);
    };
    function updateCoordsCover(c)
    {
        jQuery('#cx').val(c.x*cordratio);
        jQuery('#cy').val(c.y*cordratio);
        jQuery('#cw').val(c.w*cordratio);
        jQuery('#ch').val(c.h*cordratio);
    };

    function checkCoordsLogo()
    {
        if (parseInt(jQuery('#lw').val())>0) {
            lx = $("#lx").val();
            ly = $("#ly").val();
            lw = $("#lw").val();
            lh = $("#lh").val();
            image = $("#logofile").attr('src');
            image = image.split('/');
            image = image[image.length-1];
            $.ajax({
                url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=manufacturers/crop-logo&id=<?php echo $manufacturer_id;?>&user_id=<?php echo $model->id;?>&image='+image+'&lx='+lx+'&ly='+ly+'&lw='+lw+'&lh='+lh,
                dataType: 'json',
                type:'POST',
                success: function ( data)
                {
                    if ($('#logofile').data('Jcrop')) {
                        $('#logofile').data('Jcrop').destroy();
                    }
                    $("#jc_coords_logo").hide();
                    $('#logofile').attr('src',data.src);
                    $('#logofile').css('width',124);
                    $('#logofile').css('height',124);
                    $('#logouploadmodel-logo').val('');
                    $('#logouploadmodel-logo').show();// made hidden when file selected.
                }
            });
            return true;
        }
        else {
            alert('Please select a Logo crop region then press submit.');
            return false;
        }
    }

    function checkCoordsCover()
    {
        if (parseInt(jQuery('#cw').val())>0) {
            cx = $("#cx").val();
            cy = $("#cy").val();
            cw = $("#cw").val();
            ch = $("#ch").val();
            image = $("#coverfile").attr('src');
            image = image.split('/');
            image = image[image.length-1];
            $.ajax({
                url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=manufacturers/crop-image&id=<?php echo $manufacturer_id;?>&user_id=<?php echo $model->id;?>&image='+image+'&cx='+cx+'&cy='+cy+'&cw='+cw+'&ch='+ch,
                dataType: 'json',
                type:'POST',
                success: function ( data)
                {
                    if ($('#coverfile').data('Jcrop')) {
                        $('#coverfile').data('Jcrop').destroy();
                    }
                    $("#jc_coords_cover").hide();
                    $('#coverfile').attr('src',data.src);
                    $('#coverfile').css('width',800);
                    $('#coverfile').css('height','auto');
                    $('#coveruploadmodel-cover').val('');
                    $('#coveruploadmodel-cover').show();// made hidden when file selected.
                }
            });
            return true;
        }
        else {
            alert('Please select a Cover crop region then press submit.');
            return false;
        }
    }


</script>