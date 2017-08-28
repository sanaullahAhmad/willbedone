
<nav class='navbar navbar-default navbar-custom email-nav'>
    <div class='container'>
        <div class='  text-center col-md-12'> <a href='#!' class='logo-text'><img src='<?php echo Yii::getAlias('@theme'); ?>/img/logo-arow.png'> Review Fox</a> </div>
    </div>
</nav>
<div class='container-fluid email-main-headre'>
    <h2><?= $company_name ?></h2>
    <p class='date-email'><?= $date_from ?> - <?= $date_to ?></p>
    <a href='#!' class='report-link'>View Report Online</a> </div>
<div class='container'>
    <div class='email-main-container'>
        <div class='email-view'>
            <div class='email-content border-botoom'>
                <div class='panel panel-default panel-hadding-panel'>
                    <div class='panel-body email-panel-body'>Review Stats</div>
                </div>
                <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/plus-form.png'> Positive reviews</p>
                <h2><span><img src='<?php echo Yii::getAlias('@theme'); ?>/img/up-arow-icon.png'> +<?= $positiveReviewsPercentage ?>%</span><?= $positiveReviews ?></h2>
            </div>
            <div class='clearfix'></div>
            <div class='email-content'>
                <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/delete-icon.png'> Negative reviews</p>
                <h2><span><img src='<?php echo Yii::getAlias('@theme'); ?>/img/down-arow-icon.png'> -<?= $negativeReviewsPercentage ?>%</span><?= $negativeReviews ?></h2>
            </div>
        </div>
        <div class='email-view'>
            <div class='email-content border-botoom'>
                <div class='panel panel-default panel-hadding-panel'>
                    <div class='panel-body email-panel-body'>Customer Turnout</div>
                </div>
                <p> TOTAL SURVEYS SENT TO CUSTOMERS </p>
                <h2> <?= $surverysSent ?></h2>
            </div>
            <div class='clearfix'></div>
            <div class='email-content'>
                <p>TOTAL RESPONSES FROM SURVEYS</p>
                <h2><?= $surverysResponse ?></h2>
            </div>
        </div>
        <div class='email-view'>
            <div class='panel panel-default panel-hadding-panel'>
                <div class='panel-body email-panel-body'>Top Review Sources</div>
            </div>
            <?php
            foreach ($userSocialSettings as $uss) {
                ?>
                <div class='email-content border-botoom'>
                    <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/thanks-<?php echo $uss->channel; ?>-icon.png' class='with-control'><?php echo $uss->title; ?></p>
                    <?php
                    if (in_array($uss->channel, $siteArray)) {
                        ?>
                        <h2>
                            <?php
                            if (isset($crSites[$uss->channel])) {
                                echo $crSites[$uss->channel];
                            } else {
                                echo '0';
                            }
                            ?>
                        </h2>
                        <?php
                    }
                    ?>

                </div>
                <div class='clearfix'></div>
                <?php
            }
            ?>


        </div>
        <div class='email-view'>
            <div class='email-content border-botoom'>
                <div class='panel panel-default panel-hadding-panel'>
                    <div class='panel-body email-panel-body'>Social Stats</div>
                </div>
                <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/input-fb-icon.png' class='with-control'> new Facebook likes</p>
                <h2><span><img src='<?php echo Yii::getAlias('@theme'); ?>/img/up-arow-icon.png'> +3.25%</span>3</h2>
            </div>
            <div class='clearfix'></div>
            <div class='email-content border-botoom'>
                <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/input-g-icon.png' class='with-control'> New Twitter Followers</p>
                <h2><span><img src='<?php echo Yii::getAlias('@theme'); ?>/img/down-arow-icon-red.png'> +3.25%</span>2</h2>
            </div>
            <div class='clearfix'></div>
            <div class='email-content'>
                <p><img src='<?php echo Yii::getAlias('@theme'); ?>/img/chart-instagram-icon.png' class='with-control cpfbkdxrsepfzuqiphpv'> New instagram Followers</p>
                <h2><span><img src='<?php echo Yii::getAlias('@theme'); ?>/img/up-arow-icon.png'> +3.25%</span>7</h2>
            </div>


        </div>
        <div class='unsubscribe'>
            <ul class='unsubscribe-links'>
                <li><a href='#!'>Sign in </a></li>|
                <li><a href='#!'>unsubscribe</a></li>
            </ul>

            <p class='update-email'>This message was sent to jose@omegamasonry.com<br>
                If you would like to update your email address, please<a href='#!'> click here.</a>
            </p>

            <p class='copy-right'>&copy;2017 Review Fox, Inc. | All Rights Reserved.</p>

            <ul class='privacy-policy'>
                <li><a href='#!'>Privacy Policy </a></li> |
                <li><a href='#!'> Terms and Conditions</a></li>
            </ul>
        </div>
    </div>
</div>

