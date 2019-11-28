<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use common\models\Products;
use common\models\Categories;
use common\models\Buyers;
use common\models\Sales;

class SiteController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
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
                //'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions() {
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

    public function actionIndex() {

        $categories = Categories::find()->orderBy(['id' => SORT_DESC])->limit(20)->all();
        return $this->render('index', [
                    'categories' => $categories,
        ]);
    }

    public function actionSearch($name) {
        $categories = Categories::find()->where("name LIKE '%$name%'")->all();
        $products = [];
        foreach ($categories as $index => $category) {
            $products = array_merge($products, $category->getProducts()
                            ->orderBy(['id' => SORT_DESC])
                            ->limit(20)
                            ->all());
        }
        return $this->render('search', [
                    'name' => $name,
                    'products' => $products,
        ]);
    }

    public function actionLogin() {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();

        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        return $this->render('login', ['model' => $model]);
    }

    public function actionLogout() {
        if (Yii::$app->user->isGuest) {

            return $this->goHome();
        }
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionContact() {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending your message.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                        'model' => $model,
            ]);
        }
    }

    public function actionAbout() {
        return $this->render('about');
    }

    public function actionOrder($id) {
        $product = Products::findOne($id);
        $model = new Sales;
        $model->product_id = $id;
        if ($model->load(Yii::$app->request->post())) {
            $model->total_cost = $model->count * ($product->price + $model->transportation_costs + $product->price * 3 / 100);
            if (!Yii::$app->user->isGuest) {
                $model->user_id = Yii::$app->user->id;
            }
            $model->ip = $_SERVER['REMOTE_ADDR'];
            if ($model->save()) {
                return $this->redirect(['/site/payment']);
            }
        }
        return $this->render('order', [
                    'product' => $product,
                    'model' => $model,
        ]);
    }

    public function actionPayment() {
        $model = new Buyers;

        if ($model->load(Yii::$app->request->post())) {
            if ($model->save()) {
                Sales::updateAll(['buyer_id' => $model->id, 'status' => 2], ['status' => 1]);
                return $this->redirect(['/site/dargah']);
            }
        }

        if (!Yii::$app->user->isGuest) {
            $model->fullname = Yii::$app->user->identity->fullname;
            $model->address = Yii::$app->user->identity->address;
            $model->mobile = Yii::$app->user->identity->phone;
        }
        $sales = Sales::find()->where(['status' => 1])->all();
        return $this->render('payment', [
                    'model' => $model,
                    'sales' => $sales
        ]);
    }

    public function actionDargah() {
        return $this->render('dargah', [
        ]);
    }

    public function actionDargahSuccess() {
        $sales = Sales::find()
                ->where(['status' => 2, 'user_id' => Yii::$app->user->id])
                ->orWhere(['status' => 2, 'ip' => $_SERVER['REMOTE_ADDR']])
                ->all();
        foreach ($sales as $index => $sale) {
            $sale->status = 4;
            $sale->save();
        }
        return $this->render('dargahSuccess', [
                    'sales' => $sales,
        ]);
    }

    public function actionProfile() {
        return $this->render('profile', [
        ]);
    }

    public function actionProfileBuy() {
        $sales = Sales::find()
                ->where(['status' => 4, 'user_id' => Yii::$app->user->id])
//                ->orWhere(['status' => 4, 'ip' => $_SERVER['REMOTE_ADDR']])
                ->all();
        return $this->render('profileBuy', [
                    'sales' => $sales,
        ]);
    }

    public function actionProfileOrder() {
        return $this->render('profileOrder', [
        ]);
    }

    public function actionErrorr() {
        return $this->render('errorr', [
        ]);
    }

    public function actionProductDetials($id) {
        $product = Products::findOne($id);
        return $this->render('productDetials', [
                    'product' => $product,
        ]);
    }

    public function actionSignup() {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
                    'model' => $model,
        ]);
    }

    public function actionRequestPasswordReset() {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for the provided email address.');
            }
        }

        return $this->render('requestPasswordResetToken', [
                    'model' => $model,
        ]);
    }

    public function actionResetPassword($token) {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
                    'model' => $model,
        ]);
    }

}
