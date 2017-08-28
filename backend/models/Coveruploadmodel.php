<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Coveruploadmodel extends Model
{
    /**
     * @var UploadedFile
     */
    //public $imageFile;
    public $cover;

    public function rules()
    {
        return [
            [['cover'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg'],
        ];
    }


}
?>