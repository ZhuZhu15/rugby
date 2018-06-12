<?php 

namespace app\models;

use Yii;
use yii\base\Model;


class AboutModel extends Model 

{
	public function Sum($a,$b) {
		$c = $a + $b;
		return $c;
	}
}


