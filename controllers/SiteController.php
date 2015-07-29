<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\RegistryForm;
use app\models\UploadForm;
use app\models\ImageManager;
use app\models\ContactForm;
use app\models\EntryForm;
use yii\web\UploadedFile;
use yii\helpers\Url;

class SiteController extends Controller
{
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

    public function actionIndex()
    {
        $model = new UploadForm();
        $imagemanager = new ImageManager();
        $images = $imagemanager->getImages();

        return $this->render('index', ['model'=>$model, 'images'=>$images]);
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionRegistry()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new RegistryForm();
        if ($model->load(Yii::$app->request->post()) && $model->register()) {
            return $this->goBack();
        } else {
            return $this->render('registry', [
                'model' => $model,
            ]);
        }
    }

  public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->file = UploadedFile::getInstance($model, 'file');

            if ($model->file && $model->validate()) { 
                $model->file->saveAs('uploads/' . $model->file->baseName . '.' . $model->file->extension);
                ImageManager::saveImage(Yii::$app->homeUrl.'uploads/' . $model->file->baseName . '.' . $model->file->extension);
            }
        }
        $this->redirect(Yii::$app->homeUrl.'site/index', TRUE, 301);
    }

    public function actionLike($image_id){
        if(!Yii::$app->user->isGuest){
            ImageManager::setLike($image_id);
        }
        $this->redirect(Yii::$app->homeUrl.'site/index', true, 301);
    }

}
