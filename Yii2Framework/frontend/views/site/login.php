<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
$error = $model->getFirstError('password');
?>
<div class="site-login">
    <!-- Content Start -->
    <!-- Start Pages Title  -->
    <section id="page-title" class="page-title-style2 ">
        <div class="color-overlay"></div>
        <div class="container inner-img">
            <div class="row">
                <div class="Page-title">
                    <div class="col-md-12 text-center">
                        <div class="title-text">
                            <h6 class="font-white">بهترین سرویس ها را از ما بخواهید </h6>
                            <h2 class="page-title font-white">صفحه ورود به سایت</h2>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="breadcrumb-trail breadcrumbs">
                            <span class="trail-begin"><a href="#">خانه</a></span>
                            <span class="sep">/</span> <span class="trail-end">ورود</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pages Title  -->
    <!-- Content Start -->
    <main class="main-content">
        <div class="login-block">
            <?= $error ? "<span style='color: red;'>$error</span>" : '' ?>
            <h1>ورود به اکانت خود</h1>
            <form method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user font-blue"></i></span>
                        <input type="text" class="form-control" name="LoginForm[username]" placeholder="نام کاربری" value="<?= $model->username ?>">
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-lock font-blue"></i></span>
                        <input type="password" class="form-control" name="LoginForm[password]" placeholder="رمز عبور">
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">ورود</button>
            </form>
        </div>
        <div class="login-links margin-top-20 margin-bottom-20">
            <a class="pull-left font-dark font-md" href="user-forget-pass.html">رمز عبور خود را فراموش کرده اید ؟</a>
            <a class="pull-right font-blue font-md" href="user-register.html">ثبت نام کنید</a>
        </div>
    </main>
    <!-- Main container end -->
    <!-- Content Start -->
</div>