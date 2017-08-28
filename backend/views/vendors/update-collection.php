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

'Update Vendor: ' . $VendorCollectionmodel->title;
$this->params['breadcrumbs'][] = 'Users'/*['label' => 'Users', 'url' => ['index']]*/;
$this->params['breadcrumbs'][] = $VendorCollectionmodel->title;
$this->params['breadcrumbs'][] = 'Update';
?>
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
    </div>
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">Update Collection</a></li>
    </ul>
    <?php //echo "<pre>";print_r($model);exit;?>
    <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
            <h3>Select Images</h3><span>Picture dimensions should be 3:2, i-e &nbsp;&nbsp;&nbsp; Like &nbsp;&nbsp;&nbsp; 1200px-800px</span>
            <div class="form-group product-image-upload">
            <?= FileUploadUI::widget([
                'model' => $UserCollectionsPictures,
                'attribute' => 'file',
                'url' => ['vendors/collection-image-upload', 'prod_id' => $VendorCollectionmodel->id], // your url, this is just for demo purposes,
                'gallery' => false,
                'fieldOptions' => [
                    'accept' => 'image/*'
                ],
                'clientOptions' => [
                    'maxFileSize' => 10000000,
                    /*'minFileSize' => 50000*/
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
                    if($VendorCollectionPicturemodel){
                        foreach ($VendorCollectionPicturemodel as $row)
                        {?>
                        <tr class="template-download fade in img_id_<?= $row->id?>">
                            <td>
                            <span class="preview">
                                <a href="../../frontend/web/uploads/collection-images/<?= $VendorCollectionmodel->id ?>\<?= $row->file?>" title="<?= $row->file?>" download="<?= $row->file?>" data-gallery="">
                                    <img  src="../../frontend/web/uploads/collection-images/<?= $VendorCollectionmodel->id ?>\<?= $row->file?>" >
                                </a>
                            </span>
                            </td>
                            <td>
                                <p class="name">
                                    <a href="../../frontend/web/uploads/collection-images/<?= $VendorCollectionmodel->id ?>\<?= $row->file?>" title="<?= $row->file?>" download="<?= $row->file?>" data-gallery=""><?= $row->file?></a>
                                </p>
                            </td>
                            <td>
                                <?php $filepath = dirname(dirname(dirname(__DIR__))).'/frontend/web/uploads/collection-images/'.$VendorCollectionmodel->id.'/'.$row->file;?>
                                <span class="size"><?php if(file_exists($filepath)){ echo number_format( filesize($filepath)/1024, 2 ); }?> KB</span>
                            </td>
                            <td>
                                <span class="btn btn-danger delete"  onclick="delete_image('<?= $row->file?>','img_id_<?= $row->id ?>')">
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
    <div class="form-group">
        <span class="btn btn-primary"  onclick="history.go(-1);" style="cursor: pointer;"> Go Back</span>
    </div>
<script>
    function delete_image(name, img_id) {
        $.ajax({
            url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=vendors/collection-image-delete&name='+name+'&prod_id=<?php echo $VendorCollectionmodel->id; ?>',
            dataType: 'json',
            type:'POST',
            success: function ( data)
            {
                $('.'+img_id).remove();
            }
        })
    }
</script>