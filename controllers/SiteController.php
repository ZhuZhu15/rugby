<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\AboutModel;
use app\models\NewPageModel;
use app\models\Article;
use app\models\ImageUpload;
use app\models\NewsPage;
use yii\data\Pagination;
use yii\web\UploadedFile;
use yii\web\Request;
use yii\db\ActiveRecord;
use yii\db\Query;

class SiteController extends Controller

{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {   

   $pagination = new Pagination([
        'defaultPageSize' => 5,
        'totalCount' => Article::find()->count(),
    ]);
   
       $articles = Article::showArticles($pagination);
       $populars = Article::getPopulars();
       $recents = Article::getRecents();
       

      return $this->render('index', [
            'articles' => $articles,
            'populars' => $populars,
            'recents' => $recents,
            'pagination' => $pagination,
        ]);
   }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        $c = $model->showUserName();
        return $this->render('contact', [
            'model' => $model,
            'c' => $c,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */

    public function actionNewspage() 
    {
        $model = new NewsPage();

        $shownews = $model->showNews(); 
        $id = $shownews['id'];
        $articles = $shownews['articles'];

        $populars = Article::getPopulars();
        $recents = Article::getRecents();

        if ( $model->load(Yii::$app->request->post())){
        $model->writeComment();
        }

        $comments = $model->showComment();
          
        return $this->render('newspage', [
        'id' => $id,
        'articles' => $articles,
        'populars' => $populars,
        'recents' => $recents,
        'model' => $model,
        'comments' => $comments,
        ]);
    }

    public function actionAbout()
    {
        $about = new AboutModel();
        $c = $about->Sum(15,25);
        return $this->render('about', ['d' => $c,
    ]);
    }


    public function actionNewpage() 
    {

        $model = new NewPageModel();
        $c = '';
        $a = '';
        $model->load(Yii::$app->request->post());
        if (Yii::$app->request->post('Minus')) 
            {
                $a = $model->a;
                $c = $model->Minus();
            }
            else if (Yii::$app->request->post('Sum')) 
                {
                    $a = $model->a;
                    $c = $model->Sum();
                }
                return $this->render('newpage', [
                    'model' => $model,
                    'c' => $c,
                    'a' => $a,
                ]);
            } 

            public function actionImageupload() 
            {
        
                $model = new ImageUpload();
                $model->load(Yii::$app->request->post());

                $name = $model->name;
                
                Yii::$app->db->createCommand()->insert('name', [
                'name' => $name,
                ])->execute();

                        return $this->render('imageupload', [
                            'model' => $model,
                            'name' => $name
                        ]);
                    } 
        }


