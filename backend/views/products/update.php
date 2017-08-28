<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use dosamigos\fileupload\FileUpload;
use dosamigos\fileupload\FileUploadUI;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use backend\models\SubCategories;
/* @var $this yii\web\View */
/* @var $model backend\models\Products */
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
$this->title = 'Update Product: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id, 'product_categories_id' => $model->product_categories_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
    <h1><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
<?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Update Product</a></li>
        <li><a data-toggle="tab" href="#menu1">Select Vendor</a></li>
        <li><a data-toggle="tab" href="#menu2">Select Category</a></li>
        <li><a data-toggle="tab" href="#menu4">Select Images</a></li>
        <li><a data-toggle="tab" href="#menu5">Catalogues</a></li>
    </ul>
    <?php //echo "<pre>";print_r($model);exit;?>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Update Product</h3>
            <div class="row">
                <div class="col-lg-7">
                    <?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
                    <?= $form->field($model, 'description')->textarea() ?>
                    <?= $form->field($model, 'long_description')->textarea(['rows' => '6']) ?>
                    <?= $form->field($model, 'actual_price')->textInput() ?>
                    <?= $form->field($model, 'banjaiga_price')->textInput() ?>
                    <div class="form-group">
                        <label>Is Multiple <input type="checkbox" value="1" <?php if ($model->is_multiple==1){?> checked <?php } ?> name="is_multiple" style="float:right;margin-left:15px;margin-top:2px;"></label>
                    </div>
                    <?= $form->field($model, 'starting_from')->textInput() ?>

                    <?=  $form->field($model, 'unit_id')->dropdownList($Units,
                        ['prompt'=>'Select Unit', 'id' => 'brands-drop-down']
                    ); ?>
                    <?= $form->field($model, 'sku') ?>
                    <?= $form->field($model, 'sizweight') ?>
                    <?= $form->field($model, 'material') ?>
                    <?= $form->field($model, 'style') ?>

                    <?=  $form->field($model, 'status')->dropdownList([
                        '1' => 'Active',
                        '0' => 'InActive'
                    ],
                        ['prompt'=>'Select']
                    ); ?>

                    <?=  $form->field($model, 'availability')->dropdownList([
                        '1' => 'Availabile',
                        '0' => 'Not Availabile'
                    ],
                        ['prompt'=>'Select']
                    ); ?>
                    <div class="form-group">
                        <label>Is Recomeneded <input type="checkbox" value="1" <?php if ($model->is_recommended==1){?> checked <?php } ?> name="is_recommended" style="float:right;margin-left:15px;margin-top:2px;"></label>
                    </div><!--
                    <?/*=  $form->field($model, 'brand_id')->dropdownList($brand_row,
                        ['prompt'=>'Select Existing Brands', 'id' => 'brands-drop-down']
                    ); */?>
                    <div class="form-group">
                        <label>OR
                            <span class="btn btn-info" onclick='$( ".field-brands-drop-down" ).html( &#39; <label class="control-label" for="brands-drop-down">Brand</label><input type="text" name="new_brand_id" class="form-control" id="products-brand_id" placeholder="New Brand Name" required > &#39; );'>
                                Add New Brand
                            </span>
                        </label>
                    </div>-->
                    <?=  $form->field($model, 'manufacturers_id')->dropdownList($manufacturer_row,
                        ['prompt'=>'Select Manufacturer', 'id' => 'manufacturers-drop-down']
                    ); ?>
                </div>
            </div>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Select Vendor</h3>
            <div class="form-group paddleftright">
                <label class="control-label" >Select Vendors</label>
                <?php
                echo Html::checkboxList('product_vendors_id[]', $vend_selection, $vend_row, ['item'=>function ($index, $label, $name, $checked, $value){
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'label' => $label,
                        'class' => '',
                    ]);
                }]);
                ?>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Select Category</h3>
            <!--<div class="form-group paddleftright">
                <label class="control-label" >Select Categories</label>
                <?php
/*                echo Html::checkboxList('product_categories_id[]', $cat_selection, $cat_row, ['item'=>function ($index, $label, $name, $checked, $value){
                    return Html::checkbox($name, $checked, [
                        'value' => $value,
                        'label' => $label,
                        'class' => 'parent_category_',
                    ]);
                }]);
                */?>
            </div>-->
            <div class="form-group field-products-product_categories_id required">
                <label class="control-label" for="products-product_categories_id">Categories</label>
                <select id="products-product_categories_id" class="form-control" name="Products[product_categories_id][]" onchange="
                $.get( &quot;index.php?r=products/ajax-subcategory-list&amp;id=&quot;+$(this).val(), function( data ) {
                  $( &quot;#subcategory-list&quot; ).html( data );$( &quot;#sub-subcategory-list&quot; ).html( '' );
                });
            " aria-invalid="true">
                    <option value="">Select</option>
                    <?php
                    $markup='';
                    if($SubCategoriesmodel)
                    {
                        foreach($cat_row as $index=>$value)
                        {
                            $markup.='<option value="'.$index.'"';
                            if(in_array($index,$cat_selection)){ $markup.=' selected';  }
                            $markup.=' >'.$value.'</option>';
                        }
                    }
                    echo $markup;
                    ?>
                </select>
            </div>
            <div class="form-group" id="subcategory-list">
            <?php
            $markup ='<label>Select Subcategory</label><select name="subcategory" class="form-control"><option value="">--Select--</option> ';
            if($SubCategoriesmodel)
            {
                foreach($SubCategoriesmodel as $row)
                {
                    if(in_array($row->id,$cat_selection)){ $markup.='<option value="'.$row->id.'" selected>'.$row->category.'</option>';  }

                }
            }
            $markup.='</select>';
            echo $markup;
            ?>
            </div>
            <!--sub sub category here-->
            <div class="form-group" id="sub-subcategory-list">
                <?php
                $markup ='<label>Select Sub Sub Category</label><select name="sub-subcategory" class="form-control"><option value="">--Select--</option> ';
                if($SubSubCategoriesmodel)
                {
                    foreach($SubSubCategoriesmodel as $row)
                    {
                        if(in_array($row->id,$cat_selection)){ $markup.='<option value="'.$row->id.'" selected >'.$row->category.'</option>';  }
                        /*$markup.='<option value="'.$row->id.'"';
                        if(in_array($row->id,$cat_selection)){ $markup.=' selected';  }
                        $markup.=' >'.$row->category.'</option>';*/
                    }
                }
                $markup.='</select>';
                echo $markup;
                ?>
            </div>
        </div>
        <div id="menu4" class="tab-pane fade">
            <h3>Select Images</h3>
            <div class="form-group product-image-upload">
            <?= FileUploadUI::widget([
                'model' => $ProductPicturesmodel,
                'attribute' => 'file',
                'url' => ['products/image-upload', 'prod_id' => $model->id], // your url, this is just for demo purposes,
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 5000000,
                    /*'minFileSize' => 25000*/
                ],
                // ...
                'clientEvents' => [
                    'fileuploaddone' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                    'fileuploadfail' => 'function(e, data) {
                                console.log(e);
                                console.log(data);
                            }',
                ],
            ]); ?>
                <table role="presentation" class="table table-striped">
                    <tbody class="files">
                    <?php //echo "<pre>";print_r($ProductPicsmodel);exit;
                    if($ProductPicsmodel){
                        foreach ($ProductPicsmodel as $row)
                        {?>
                        <tr class="template-download fade in img_id_<?= $row->id?>">
                            <td>
                            <span class="preview">
                                <a href="../../frontend/web/uploads/products-images/<?= $model->id ?>\<?= $row->file?>" title="<?= $row->file?>" download="<?= $row->file?>" data-gallery="">
                                    <img  src="../../frontend/web/uploads/products-images/<?= $model->id ?>\<?= $row->file?>" >
                                </a>
                            </span>
                            </td>
                            <td>
                                <p class="name">
                                    <a href="../../frontend/web/uploads/products-images/<?= $model->id ?>\<?= $row->file?>" title="<?= $row->file?>" download="<?= $row->file?>" data-gallery=""><?= $row->file?></a>
                                </p>
                            </td>
                            <td>
                                <?php $filepath = dirname(dirname(dirname(__DIR__))).'/frontend/web/uploads/products-images/'.$model->id.'/'.$row->file;?>
                                <span class="size"><?php if(file_exists($filepath)){ echo number_format( filesize($filepath)/1024, 2 ); }?> KB</span>
                            </td>
                            <td>
                                <span>Mark as Featured</span>
                                <input type="radio" name="featured" value="<?= $row->file?>" <?php if($model->featured_image==$row->file){?>checked<?php }?>>
                            </td>
                            <td>
                                <span class="btn btn-danger delete"  onclick="delete_image('<?= $row->file?>','img_id_<?= $row->id ?>')">
                                    <i class="glyphicon glyphicon-trash"></i>
                                    <span>Delete</span>
                                </span>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=494&height=336">
                                    <span>Crop 494-336</span>
                                </a>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=436&height=384">
                                    <span>Crop 436-384</span>
                                </a>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=446&height=300">
                                    <span>Crop 446-300</span>
                                </a>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=332&height=250">
                                    <span>Crop 332-250</span>
                                </a>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=66&height=103">
                                    <span>Crop 66-103</span>
                                </a>
                                <br>
                                <a style="margin: 5px 0; width: 110px;" class="btn btn-info"  href="<?= $site_base_url?>?r=products/update-image&id=<?= $row->id ?>&width=296&height=168">
                                    <span>Crop 296-168</span>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    }?>
                    </tbody>
                </table>
            </div>
        </div>
        <div id="menu5" class="tab-pane fade">
            <h3>More Catalogues</h3>
            <span class="btn btn-info add"  onclick="add_catalogue()">
            <i class="glyphicon glyphicon-plus"></i>
            <span>Add Catalogue</span>
        </span>
            <table role="presentation" class="table table-striped catalogue-table">
                <tbody class="files">
                <tr>
                    <th style="width: 25%;">Name</th>
                    <th>Update Catalogue</th>
                    <th>Catalogue</th>
                    <th>Update Image</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
                <?php
                if($ProductCataloguemodel){
                    foreach ($ProductCataloguemodel as $row)
                    {?>
                        <tr class="template-download fade in catalogue_id_<?= $row->id?>">
                            <td style="width: 25%;">
                                <p class="name">
                                    <input type="text" name="catalogue_name[<?= $row->id ?>]" value="<?= $row->name ?>" class="form-control">
                                </p>
                            </td>
                            <td>
                                <span class="preview">
                                    <input type="file" name="catalogue[<?= $row->id ?>]" accept=".pdf" >
                                </span>
                            </td>
                            <td>
                                <span class="preview vendor-team-img">
                                    <a style="color: blue;" href="../../frontend/web/uploads/product-catalogue/<?= $model->id ?>/<?= $row->catalogue?>" title="<?= $row->catalogue?>"  data-gallery="">
                                        <?= substr($row->catalogue,30)?>
                                    </a>
                                </span>
                            </td>
                            <td>
                                <span class="preview">
                                    <input type="file" name="catalogue_image[<?= $row->id ?>]" accept="image/*" >
                                </span>
                            </td>
                            <td>
                                <span class="preview vendor-team-img">
                                    <img style="width: 150px;" src="../../frontend/web/uploads/product-catalogue/<?= $model->id ?>/<?= $row->catalogue_image?>"/>
                                </span>
                            </td>
                            <td>
                            <span class="btn btn-danger delete"  onclick="delete_catalogue('<?= $row->catalogue?>','<?= $row->catalogue_image?>','<?= $model->id ?>','<?= $row->id ?>')">
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
    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-primary', 'name' => 'create-button']) ?>
    </div>
<?php ActiveForm::end(); ?>
<script>
    //More Catalogue goes here
    function add_catalogue() {
        var ran = "";
        var charset = "abcdefghijklmnopqrstuvwxyz";
        for( var i=0; i < 5; i++ )
            ran += charset.charAt(Math.floor(Math.random() * charset.length));
            $('.catalogue-table') .append('<tr class="template-download fade in catalogue_id_'+ran+'"><td><p class="name"><input type="text" name="catalogue_name['+ran+']"  class="form-control"> </p> </td><td><span class="preview"> <input type="file" name="catalogue['+ran+']"  accept=".pdf"></span></td> <td> </td> <td> <span class="preview"> <input type="file" name="catalogue_image['+ran+']" accept="image/*" > </span> </td> <td> </td> <td><span class="btn btn-danger delete"  onclick="delete_temp_catalogue(&#39;'+ran+'&#39;)"> <i class="glyphicon glyphicon-trash"></i> <span>Delete</span> </span> </td> </tr>');

    }
    function delete_temp_catalogue(ran) {
        $('.catalogue_id_'+ran).remove();
    }
    function delete_catalogue(name, catalogue_image, product_id, row_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=products/catalogue-delete&name='+name+'&catalogue_image='+catalogue_image+'&row_id='+row_id+'&product_id='+product_id,
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.catalogue_id_'+row_id).remove();
            }
        })
    }
    function delete_image(name, img_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=products/image-delete&name='+name+'&prod_id=<?php echo $model->id; ?>',
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.'+img_id).remove();
            }
        })
    }
    window.onload = function() {
        $('.parent_category_').click( function () {
            $('.parent_category_').each( function () {
                var myclass = $(this).val();
                if($(this).prop('checked'))
                {
                    $(".sub_categories_"+myclass).show();
                }
                else {
                    $(".sub_categories_"+myclass+" input[type=checkbox]").attr('checked', false);
                    $(".sub_categories_"+myclass).hide();
                }
            });
        });
    }
</script>