<?php 

namespace app\models;

use Yii;
use yii\base\Model;


class AboutModel extends Model 

{
	
	public $d;
	public $e;

	public function rules()
    {
        return [
		   [['d', 'e'], 'integer'],
		   [['d', 'e'], 'required']
        ];
    }
	public function Sum($a,$b) {
		$c = $a + $b;
		return $c;
	}
	public function Minus()
	{
	   $minus = $this->d - $this->e;
	   return $minus;
	}
}


