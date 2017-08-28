<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserRoles */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Completed Records';
?>
<!-- page content header -->
<div class="row">

    <h1 class="text-center ">SEARCH SOPs</h1>
    <h2 class="text-center text-primary">Search from <b>already generated reports</b> or generate a new one</h2>
    <br>
    <!-- search anything form starts -->
    <?php
    $form = ActiveForm::begin(['options' => [
                    'class' => 'form-signin',
                    'name' => 'nctpform',
                    'id' => 'ncptform'
                ],
                'method' => 'GET',
                'action' => ['search/searchanything']
    ]);
    ?>
    <div class="col-md-12">
        <input placeholder="Search anything and everything" class="search-bar-sop" name="search_anything_query">
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p class="search-now-btn"><a href="javascript::void(0)" onclick="document.getElementById('ncptform').submit();">Search Now</a></p>
        </div>
        <div class="col-md-4">
            <p class="advance-now-btn"><a aria-controls="collapseExample" aria-expanded="false" href="#collapseExample" data-toggle="collapse" class="">Advanced Search</a></p>
        </div>
    </div>
    <?php ActiveForm::end(); ?> <!-- search anything form ends -->

    <div id="collapseExample" class="in" style="height: auto;">
        <div class="clearfix"></div>
        <div class="col-md-12">
            <div class="advance-search-detail">
                <div class="advance-search-detail-table">
                    <div class="col-md-3">
                        <h4 class="advance-search-main-hadding">Advanced Search</h4>
                        <p class="search-type">Search Type</p>
                        <input type="number" class="lg-input" placeholder="Shope" max="5" min="1" name="quantity">
                    </div>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <input type="text" class="lg-input datetimepicker4 " placeholder="Receipt Date">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="lg-input" placeholder="Hospital ID#">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="lg-input" placeholder="SOP CMP #">
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="lg-input" placeholder="Donor ID#">
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-12">
                        <p class="apply-filters-btn"><a href="#!">Apply Filters</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12">
        <div class="search-result-bar">
            <h4>Search Results</h4>
        </div>
    </div>
    <div class="col-md-12">
        <div class="search-result-detail">
            <ul class="search-result-detail-list">
                <li>
                    <div class="col-md-12"> <i class="icon-table icon-2x pull-left"></i> <b> Healthy Donors Between 18 and 45 Years of Age </b>| Last Modified 1/5/2016 | Malcolm
                        <ul class="search-result-detail-more-list">
                            <li><a href="#">Open </a></li>
                            <li><a href="#"> Edit </a></li>
                            <li>
                                <select>
                                    <option>More</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-12"> <i class="icon-table icon-2x pull-left"></i> <b> Healthy Donors Between 18 and 45 Years of Age </b>| Last Modified 1/5/2016 | Malcolm
                        <ul class="search-result-detail-more-list">
                            <li><a href="#">Open </a></li>
                            <li><a href="#"> Edit </a></li>
                            <li>
                                <select>
                                    <option>More</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-12"> <i class="icon-table icon-2x pull-left"></i> <b> Healthy Donors Between 18 and 45 Years of Age </b>| Last Modified 1/5/2016 | Malcolm
                        <ul class="search-result-detail-more-list">
                            <li><a href="#">Open </a></li>
                            <li><a href="#"> Edit </a></li>
                            <li>
                                <select>
                                    <option>More</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-12"> <i class="icon-table icon-2x pull-left"></i> <b> Healthy Donors Between 18 and 45 Years of Age </b>| Last Modified 1/5/2016 | Malcolm
                        <ul class="search-result-detail-more-list">
                            <li><a href="#">Open </a></li>
                            <li><a href="#"> Edit </a></li>
                            <li>
                                <select>
                                    <option>More</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <div class="col-md-12"> <i class="icon-table icon-2x pull-left"></i> <b> Healthy Donors Between 18 and 45 Years of Age </b>| Last Modified 1/5/2016 | Malcolm
                        <ul class="search-result-detail-more-list">
                            <li><a href="#">Open </a></li>
                            <li><a href="#"> Edit </a></li>
                            <li>
                                <select>
                                    <option>More</option>
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </li>
                        </ul>
                    </div>
                </li>
            </ul>
            <p class="load-more-btn"><a href="#!">Load More Reports</a></p>
        </div>
    </div>

    <div class="clearfix"></div>
</div>

