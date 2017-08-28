<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

class LoginWidget extends Widget
{
    public $loginmodel;
    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        return Html::encode($content);
    }
}
?>