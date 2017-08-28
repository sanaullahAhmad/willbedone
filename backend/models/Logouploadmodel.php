<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Logouploadmodel extends Model
{
    /**
     * @var UploadedFile
     */
    //public $imageFile;
    public $logo;

    public function rules()
    {
        return [
            [['logo'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }


}
?>