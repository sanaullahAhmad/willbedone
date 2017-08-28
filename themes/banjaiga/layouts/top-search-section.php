<?php
use backend\models\Categories;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$themeUrl = Yii::$app->request->getBaseUrl(true) . "/../../themes/banjaiga";
$ssl = explode('/',$_SERVER['SERVER_PROTOCOL']);
$site_base_url = $ssl[0].'://'.$_SERVER['SERVER_NAME'].Yii::$app->request->getBaseUrl(true);
?>
<div class="top-search-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center explore-heading">
                <h3 class="section-heading">Explore Banjaiga and get matched to the best </br>
                    Architects, Contractors or Materials Suppliers for your project.</h3>
                <form class="navbar-form" role="search" style="margin-bottom:40px" method="get" action="">
                    <div class="input-group add-on col-sm-8 col-md-8">
                        <input name="r" value="site/category" type="hidden">
                        <input class="form-control search_keywords" type="text" name="search_keywords" id="search_keywords" value="<?php if(isset($_GET['search_keywords'])){ echo $_GET['search_keywords'];}?>"  placeholder="Search here - Architects, Vendors, Manufacturers, Material Suppliers....">
                        <select class="selectpicker" name="id" id="header_categories">
                            <option value="">Categories</option>
                            <?php
                            $Categories    = Categories::find()->where(['parent'=>'0'])->all();
                            if($Categories){
                                foreach ($Categories as $cat){
                                    ?>
                                    <option value="<?= $cat->id;?>" <?php if(isset($_GET['search_keywords']) && isset($_GET['id']) && $cat->id==$_GET['id']){ echo "selected";}?>><?= $cat->category;?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="input-group-btn submit-srch">
                        <button class="btn btn-default submit-btn-search" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>