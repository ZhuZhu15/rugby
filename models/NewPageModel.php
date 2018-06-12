<?php 

namespace app\models;

use Yii;
use yii\base\Model;


class NewPageModel extends Model 
{
    public $a;
    public $b;

    public function rules()
    {
        return [
           [['a', 'b'], 'integer']
        ];
    }

    public function Sum()
    {
    	$c = $this->a + $this->b;

    	return $c;
    }

    public function Minus()
    {
    	$c = $this->a - $this->b;

    	return $c;
    }
}