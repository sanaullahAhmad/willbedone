<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'vardump' => array(
            'class' => 'backend\helpers\Vardump'
        )
    ],
];
