<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class Dealerlistuploadmodel extends Model
{
    /**
     * @var UploadedFile
     */
    //public $imageFile;
    public $dealerlist;

    public function rules()
    {
        return [
            [['dealerlist'], 'file', 'skipOnEmpty' => true, 'extensions' => 'xlsx, xls, csv'],
        ];
    }


}
?>