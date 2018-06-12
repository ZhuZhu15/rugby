<?php 

namespace app\models;

use Yii;
use yii\base\Model;
use yii\db\Query;


class NewsPage extends \yii\db\ActiveRecord
{
    public $c = 'hi';
    
    public $name;
    public $email;
    public $comment;
    public $id;

    function __construct() { 
        $this->id = Yii::$app->request->get('id');
    }


    public function rules()
    {
        return [
           [['name', 'email', 'comment'], 'required'],
           [['date'], 'date', 'format' => 'php:Y-m-d'],
           ['email', 'email'],
           [['date'], 'default', 'value' => date('Y-m-d')],
           [['time'], 'time', 'format' => 'php:H:i:s'],
           [['time'], 'default', 'value' => date('H:i:s')],
        ];
    }

    public function showNews() {
        
        $articles = Article::findOne($this->id);
        $articles->viewed = $articles->viewed + 1 ;
        $articles->save();
        return array('id' => $this->id, 'articles' => $articles);

    }

    public function writeComment() {
        
            Yii::$app->db->createCommand()->insert('comment', [
                'Name' => $this->name,
                'Email' => $this->email,
                'Comment' => $this->comment,
                'date' => date('Y-m-d'),
                'time' => date('H:i:s'),
                'id_news' => $this->id,
                ])->execute();
            
    }

    public function showComment() {
        $comments = (new Query())
        ->select(['name','comment','date','time'])
        ->from('comment')
        ->where(['id_news' => $this->id])
        ->all();
        return $comments;
    }
    
}