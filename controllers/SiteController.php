<?php

namespace app\controllers;

use app\models\Realty;
use Kint;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * @inheritdoc
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
     * @inheritdoc
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
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return string
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
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAddUri()
    {
        if(rand(1, 2) == 1) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    public function actionDeleteUri()
    {
        if(rand(1, 2) == 1) {
            echo 'true';
        } else {
            echo 'false';
        }
    }

    /**
     *
     */
    public function actionFavorites()
    {
        $query = Realty::find()
            ->select(['realty.id'])
//            ->innerJoin('favorites', '`favorites`.`realtyId` = `realty`.`id`')
//            ->where(['favorites.userId' => '2'])
//            ->with('favorites')
//            ->asArray()
//            ->all();
            ->innerJoin('favorites', '`realty`.`id` = `favorites`.`realtyId`')
            ->where(['favorites.userId' => '1'])
            ->asArray()
            ->all();
//SELECT r.*
//
//FROM realty r
//
//LEFT JOIN favorites f ON r.id = f.realtyId
//
//WHERE f.userId = 1
//    ;
        print_r($query);
        echo '<br>';
        Kint::dump($query);
    }
}
