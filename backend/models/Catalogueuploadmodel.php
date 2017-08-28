<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Catalogueuploadmodel extends Model
{
    /**
     * @var UploadedFile
     */
    //public $imageFile;
    public $catalogue;

    public function rules()
    {
        return [
            [['catalogue'], 'file', 'skipOnEmpty' => true, 'extensions' => 'pdf'],
        ];
    }


}
?>