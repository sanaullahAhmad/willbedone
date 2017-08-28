<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\LapsAsset;
use backend\assets\AppAsset;
//use backend\widgets\Alert;

/* @var $this \yii\web\View */
/* @var $content string */

LapsAsset::register($this);

$this->title='Banjaiga |  The Best ARCHITECTS, CONTRACTORS & 
MATERIAL SUPPLIERS in Pakistan';
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
        
        
<!--         Bootstrap core CSS 
        <link href="dist/css/bootstrap.css" rel="stylesheet">
        
         Boostrap Theme 
        <link href="css/theme-base.css" rel="stylesheet">
        <link href="css/boostrap-overrides.css" rel="stylesheet">
        <link href="css/theme.css" rel="stylesheet">
        
         Ez mark
        <link rel="stylesheet" href="assets/css/ezmark.css">
        
         Font Awesome
        <link href="assets/css/font-awesome.css" rel="stylesheet">
        
         Animate
        <link href="assets/css/animate-custom.css" rel="stylesheet">-->
        
<!--         Bootstrap core JavaScript 
        <script src="assets/js/jquery.js"></script>
        <script src="dist/js/bootstrap.js"></script>
        
         HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries 
        [if lt IE 9]>
        <script src="assets/js/html5shiv.js"></script>
        <script src="assets/js/respond.min.js"></script>
        <![endif]-->

  </head>
  <body class="bg-med">
       <?php $this->beginBody() ?>

        <?= $content ?>
        
      <span class="clearfix">
    
        <!-- Plugins & Custom -->
        <!-- Placed at the end of the document so the pages load faster -->
        <!-- EzMark -->
<!--        <script src="assets/js/jquery.ezmark.js"></script>
        <script type="text/javascript">
			$(function() {
				$('.custom-check input').ezMark()
			});	
		</script>
        
		 Custom 
		<script src="assets/js/script.js"></script>-->

  </span>
  <?php $this->endBody() ?> <div class="modal fade" id="SendInformatioModal" role="dialog">
           <div class="modal-dialog">

               <!-- Modal content-->
               <div class="modal-content">
                   <div class="modal-header">
                       <button type="button" class="close" data-dismiss="modal">&times;</button>
                       <h4 class="modal-title">Information</h4>
                   </div>
                   <div class="modal-body">
                       <p>Write Information here.</p>
                       <textarea name="sendInfoTextarea"></textarea>
                   </div>
                   <div class="modal-footer">
                       <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                   </div>
               </div>

           </div>
       </div>
  </body>
 </html>
 <?php $this->endPage() ?>

