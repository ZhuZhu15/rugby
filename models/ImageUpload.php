<?php 

namespace app\models;

use Yii;
use yii\base\Model;


class ImageUpload extends Model 
{

    public $name;

    public function rules()
    {
    return [
        [['name'], 'string']
     ];
    }



}