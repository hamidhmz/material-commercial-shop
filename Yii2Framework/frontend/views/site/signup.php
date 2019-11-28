<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */
use yii\helpers\Html;
$this->title = Yii::t('app', 'Signup');
$error = '';
if ($model->getFirstError('username')) {
    $error = $model->getFirstError('username');
}
else if ($model->getFirstError('email')) {
    $error = $model->getFirstError('email');
}
else if ($model->getFirstError('password')) {
    $error = $model->getFirstError('password');
}
?>
<div class="site-signup">
    <!-- Content Start -->
    <!-- Start Pages Title  -->
    <section id="page-title" class="page-title-style2 ">
        <div class="color-overlay"></div>
        <div class="container inner-img">
            <div class="row">
                <div class="Page-title">
                    <div class="col-md-12 text-center">
                        <div class="title-text">
                            <h2 class="page-title font-white font-lg">برای بهرمندی ازامکانات بیشتر در سایت عضو شوید </h2>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="breadcrumb-trail breadcrumbs">
                            <span class="trail-begin"><a href="#">خانه</a></span>
                            <span class="sep">/</span> <span class="trail-end">ثبت نام</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Pages Title  -->
    <main class="main-content">
        <div class="login-block">
            <?= $error ? "<span style='color: red;'>$error</span>" : '' ?>
            <h1>حساب کاربری خود را ایجاد کنید</h1>
            <form method="post">
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>"/>
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user font-blue"></i></span>
                        <input type="text" class="form-control" name="SignupForm[fullname]" placeholder="نام و نام خانوادگی" value="<?= $model->fullname ?>"/>
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user font-blue"></i></span>
                        <input type="text" class="form-control" name="SignupForm[address]" placeholder="آدرس" value="<?= $model->address ?>"/>
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user font-blue"></i></span>
                        <input type="text" class="form-control" name="SignupForm[phone]" placeholder="اطلاعات تماس" value="<?= $model->phone ?>"/>
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-user font-blue"></i></span>
                        <input type="text" class="form-control" name="SignupForm[username]" placeholder="نام کاربری" value="<?= $model->username ?>"/>
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-envelope-o font-blue"></i></span>
                        <input type="text" class="form-control" name="SignupForm[email]" placeholder="ایمیل" value="<?= $model->email ?>"/>
                    </div>
                </div>
                <hr class="hr-xs">
                <div class="form-group">
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-unlock font-blue"></i></span>
                        <input type="password" class="form-control" name="SignupForm[password]" placeholder="رمز عبور" value="<?= $model->password ?>">
                    </div>
                </div>
                <button class="btn btn-primary btn-block" type="submit">ثبت نام </button>
            </form>
        </div>
        <div class="login-links">
            <p class="text-center">آیا حساب کاربری دارید <a class="txt-brand" href="user-login.html">وارد شوید</a></p>
        </div>
    </main>
    <!-- Content End -->
</div>