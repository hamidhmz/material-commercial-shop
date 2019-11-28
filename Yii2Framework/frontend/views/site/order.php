<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-order">
    <section class="container margin-top-20 md-shadow-z-1"  style="background-color: rgb(236, 250, 20) !important;border-radius: 5px;">
        <div class="order-slider">
            <div class="order-slider-desc">
                <h1> سبد خرید شما </h1>
                <h3>توصیه میکنیم قبل از سفارش از خرید خود مطمئن باشد .</h3>
            </div>
        </div>

    </section>
    <?php
    $category3 = $product->getCategory0()->one();
    $type3 = $product->getType0()->one();
    $image = $product->getGalleries()->orderBy(['id' => SORT_DESC])->one();
    ?>
    <section class="container margin-top-20 margin-bottom-20 padding-10 bg-white circle-top-5  md-shadow-z-1">
        <div class="title-v1  ">
            <i class="fa fa-calendar-check-o fa-2x"></i>
            <h2 class="padding-bottom-10 padding-top-10" >صفحه سفارش برای <span class="font-blue"><?= $category3->name . ' ' . $product->model ?></span></h2>
        </div>
        <div class="order-table margin-top-20">
            <table class="table">
                <thead>
                <th>نام محصول</th>

                <th>نوع</th>
                <th>قیمت </th>
                <th>مالیات</th>
                <th>زمان رسیدن محصول</th>
                <th>قیمت کل</th>
                </thead>
                <tbody>
                <td><?= $category3->name . ' ' . $product->model ?></td>

                <td><?= $type3->name ?></td>
                <td><?= $product->price ?></td>
                <td>3%</td>
                <td>1روز</td>
                <td><b><?= $product->price + $product->price * 3 / 100 ?> تومان</b></td>
                </tbody>
            </table>
            <div class="products-form">
            <p>مشخصات سفارش</p>
            </div>
        </div>
                <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
        <div class="row">
                <div class="col-md-2">
                    <?= $form->field($model, 'count')->textInput() ?>
                </div>
            </div>
        <div class="margin-top-20">
            <p>در صورت درست بودن جزییات محصول مورد نظر خود میتوانید با زدن دکمه ثبت سفارش و تکمیل مشخصات خود این محصول را دریافت نمایید . </p>
            <p><i class="fa fa-heart font-blue margin-left-10"></i>با تشکر از انتخاب و اعتماد شما .</p>
        </div>

        <div class="center-box ">
            <div class="margin-top-20 margin-bottom-20">
                <button class="btn btn-success margin-left-10">ثبت سفارش</button>
                <a href="<?= Url::to(['/site/product-detials', 'id' => $product->id]) ?>" class="btn btn-danger">انصراف و بازگشت</a>
            </div>

        </div>
                <?php ActiveForm::end(); ?>
    </section>
</div>