<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);

/* @var $this yii\web\View */
/* @var $model backend\models\Vendors */
$description='';
if($_GET['width']==494 && $_GET['height']== 336){ $description ="for vendor profile Page, top big image";}
if($_GET['width']==436 && $_GET['height']== 384){ $description ="for vendor profile Page, bottom two images";}
if($_GET['width']==446 && $_GET['height']== 300){ $description ="for 'Most Viewed Products' in  profile page";}
if($_GET['width']==332 && $_GET['height']== 250){ $description ="for 'Recommended Products' in  Single Product page";}
if($_GET['width']==66 && $_GET['height']== 103){ $description ="for 'Related Products' in  Single Product page";}
if($_GET['width']==296 && $_GET['height']== 168){ $description ="for 'Other Products' in  Single Product page";}

$this->title = 'Update Image: ' . $_GET['width'].'-'.$_GET['height'] ;
$this->params['breadcrumbs'][] = ['label' => 'Products', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Update';
?>
<H1><?= Html::encode($this->title) ?><b style="font-size: 18px; font-weight: normal;"><?= ' ('.$description.')';?></b></h1>
<div class="container">
    <?= Breadcrumbs::widget([
        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
    ]) ?>
    <?= Alert::widget() ?>
</div>
<?php $form = ActiveForm::begin(['id' => 'registration-form', 'options' => ['enctype' => 'multipart/form-data']]); ?>
<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#menu1">Update Image</a></li>
</ul>
<div class="tab-content">
    <div id="menu1" class="tab-pane fade in active">
        <h3>Update Image</h3>
        <div class="form-group">
            <label>Current Image</label>
            <div>
                <img  src="../../frontend/web/uploads/products-images/<?= $model->products_id;?>/<?= pathinfo($model->file,PATHINFO_FILENAME).'_'.$_GET['width'].'-'.$_GET['height'].'.'.pathinfo($model->file,PATHINFO_EXTENSION)?>" style="max-width: 400px;">
            </div>
        </div>
        <div class="form-group">
            <label>Change Image</label>
            <img id="coverfile"  src="../../frontend/web/uploads/products-images/<?= $model->products_id;?>/<?= $model->file?>" style="max-width: 800px;">

            <div id="jc_coords_cover" >
                <input type="hidden" id="cx" name="cx" />
                <input type="hidden" id="cy" name="cy" />
                <input type="hidden" id="cw" name="cw" />
                <input type="hidden" id="ch" name="ch" />
                <span onclick="return checkCoordsCover();" class="btn btn-info" >Crop Image</span>
            </div>
        </div>
        <div class="form-group ">
            <label>&nbsp;</label>
        </div>
    </div>
</div>
<div class = "form-group">
    <a class="btn btn-primary" onclick="window.history.back();">Go Back</a>
</div>
<?php ActiveForm::end();
//echo "<pre>";print_r($_SERVER);?>
<script>
    window.onload = function() {
        showratio = (800/parseInt(<?= $orignal_width;?>)).toFixed(2);
        cordratio = (parseInt(<?= $orignal_width;?>)/800).toFixed(2);

        showratio_width = (showratio*<?= $_GET['width']?>).toFixed(2);
        showratio_height = (showratio*<?= $_GET['height']?>).toFixed(2);

        cordratio_width = (cordratio*<?= $_GET['width']?>).toFixed(2);
        cordratio_height = (cordratio*<?= $_GET['height']?>).toFixed(2);

        $('#coverfile').css('width',800);
        $('#coverfile').css('height','auto');
        $('#coverfile').Jcrop({
            aspectRatio: showratio_width / showratio_height,
            minSize: [ showratio_width,showratio_height ],
            /*maxSize: [ 1136,388 ],*/
            onSelect: updateCoordsCover,
            setSelect: [0,0,cordratio_width,cordratio_height]
        });
    }
    function updateCoordsCover(c)
    {
        jQuery('#cx').val(c.x*cordratio);
        jQuery('#cy').val(c.y*cordratio);
        jQuery('#cw').val(c.w*cordratio);
        jQuery('#ch').val(c.h*cordratio);
    };


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
                url: '<?php echo Yii::$app->request->getBaseUrl(true); ?>?r=products/crop-image&id=<?= $model->id;?>&product_id=<?= $model->products_id;?>&image='+image+'&cx='+cx+'&cy='+cy+'&cw='+cw+'&ch='+ch+'&width=<?= $_GET['width']?>&height=<?= $_GET['height']?>',
                dataType: 'json',
                type:'POST',
                success: function ( data)
                {
                    if ($('#coverfile').data('Jcrop')) {
                        $('#coverfile').data('Jcrop').destroy();
                    }
                    $('#coverfile').attr('src',data.src);
                    $('#coverfile').css('width',800);
                    $('#coverfile').css('height','auto');
                    $('#jc_coords_cover').hide();//
                    window.history.back();
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
