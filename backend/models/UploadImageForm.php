<?php
namespace app\models;
use yii\base\Model;
use yii\web\UploadedFile;

class UploadImageForm extends Model {
    public $image;
    public function rules() {
        return [
            [['image'], 'file', 'skipOnEmpty' => false, 'extensions' => 'jpg, png', 'maxFiles' => 4],
        ];
    }
    public function upload() {
        if ($this->validate()) {
            $this->image->saveAs('../uploads/' . $this->image->baseName . '.' .
                $this->image->extension);
            return true;
        } else {
            return false;
        }
    }
}
?>