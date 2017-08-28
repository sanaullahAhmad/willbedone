<?php
$yearslist= array();
for($i=2000; $i<=2025; $i++)
{
    $yearslist[$i]=$i;
}
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use dosamigos\fileupload\FileUploadUI;


/* @var $this yii\web\View */
/* @var $model backend\models\Projects */

$this->title = 'Update Project'. $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Projects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id, 'user_id' => $model->user_id, 'user_vendors_id' => $model->user_vendors_id, 'user_vendors_id1' => $model->user_vendors_id1, 'user_builders_id' => $model->user_builders_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="projects-update">

    <h1><?= Html::encode($this->title) ?></h1>
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    <?php $form = ActiveForm::begin(['id' => 'form-create', 'options' => ['enctype' => 'multipart/form-data']]); ?>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Update Product</a></li>
        <li><a data-toggle="tab" href="#menu1">Select Manufacturers</a></li>
        <li><a data-toggle="tab" href="#menu2">Select Contractors</a></li>
        <li><a data-toggle="tab" href="#menu4">Select Images</a></li>
        <li><a data-toggle="tab" href="#menu5">Products</a></li>
    </ul>
    <?php //echo "<pre>";print_r($model);exit;?>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <?php //echo $this->render('_form', ['model' => $model,]); ?>
            <?php echo  $form->field($model, 'title') ?>
            <?php echo  $form->field($model, 'category')->dropdownList($cat_row, ['prompt'=>'Select']); ?>
            <?php echo  $form->field($model, 'keywords') ?>
            <?php //echo  $form->field($model, 'starting_year') ?>
            <?php //echo  $form->field($model, 'ending_year') ?>
            <?php echo  $form->field($model, 'starting_year')->dropdownList($yearslist, ['prompt'=>'Select']); ?>
            <?php echo  $form->field($model, 'ending_year')->dropdownList($yearslist, ['prompt'=>'Select']); ?>
            <?php   if(is_numeric($model->country)){ echo  $form->field($model, 'country')->dropdownList($count_row, ['prompt'=>'Select']); } else { echo $form->field($model, 'country');}?>
            <?php echo  $form->field($model, 'city') ?>

            <?php echo  $form->field($model, 'status')->dropdownList([
                '1' => 'Active',
                '0' => 'InActive'
            ],
                ['prompt'=>'Select']
            ); ?>
            <?php echo  $form->field($model, 'post_date') ?>
            <?php echo  $form->field($model, 'user_id')->dropdownList($user_row, ['prompt'=>'Select']); ?>
            <?php echo  $form->field($model, 'user_vendors_id')->dropdownList($vendors_row, ['prompt'=>'Select']); ?>
            <?php echo  $form->field($model, 'user_vendors_id1')->dropdownList($manufacturers_row, ['prompt'=>'Select']); ?>
            <?php echo  $form->field($model, 'user_builders_id')->dropdownList($builders_row, ['prompt'=>'Select']); ?>
        </div>
        <div id="menu1" class="tab-pane fade">
            <h3>Select Vendor</h3>
            <div class="form-group paddleftright">
                <label class="control-label" >Select Vendors</label>
            </div>
        </div>
        <div id="menu2" class="tab-pane fade">
            <h3>Select Category</h3>
        </div>
        <div id="menu4" class="tab-pane fade"><h3>Select Images</h3>
            <div class="form-group product-image-upload">
                <?= FileUploadUI::widget([
                    'model' => $ProjectPicturesmodel,
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
                    if($ProjectPicsmodel){
                        foreach ($ProjectPicsmodel as $row)
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
                                    <input type="radio" name="featured" value="<?= $row->file?>" <?php //if($model->featured_image==$row->file){?>checked<?php //}?>>
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
            <h3>Select Vendor</h3>
            <div class="form-group paddleftright">
                <label class="control-label" >Select Vendors</label>
            </div>
        </div>
    </div>
    <div class = "form-group">
        <?php echo  Html::submitButton('Submit', ['class' => 'btn btn-primary',
            'name' => 'button']) ?>
    </div>
    <?php ActiveForm::end(); ?>

</div>
