<?php
namespace backend\helpers;

class Vardump
{
    public static function dd($var)
    {
        echo '<pre>';
        print_r($var);
        echo '</pre>';
        die();
    }
}