<?php
use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-payment">
    <section class="payment-c container-fluid margin-top-20 ">
        <div class="payment-slider container">
            <div class="order-slider-desc" style="color:#fff">
                <h1>تکمیل خرید</h1>
                <h3>برای انجام خرید لطفا مشخصات خود را تایید یا تکمیل نمایید .</h3>
            </div>
        </div>

    </section>

    <section class="container margin-top-20 margin-bottom-20 padding-10 bg-white circle-top-5  md-shadow-z-1">
        <div class="title-v1  ">
            <i class="fa fa-shopping-cart fa-2x"></i>
            <h2 class="padding-bottom-10 padding-top-10" >صفحه سفارش برای <span class="font-blue"></span></h2>
        </div>
        <div class="col-sm-4">
            <div class="order-table margin-top-20">
                <table class="table">
                    <thead>
                    <th>نام محصول</th>
                    <th>هزینه ارسال(تومان)</th>
                    <th>مبلغ پرداختی</th>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($sales as $index => $sale) {
                            ?>
                        <tr>
                            
                        <th><?= $sale->getProduct()->one()->getCategory0()->one()->name .' '.$sale->getProduct()->one()->model  ?></th>
                        <th><?= $sale->transportation_costs ?></th>
                        <th><?= $sale->total_cost ?></th>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row"></div>
        <hr>
        <div class="col-sm-12">
            <h2 class="font-hg">تکمیل اطلاعات کاربر </h2>
            <div class="user-setting margin-top-20 margin-bottom-20">
                <div class="buyers-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'fullname')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'address')->textarea(['rows' => 6]) ?>

                    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>



            </div>
        </div><div class="row"></div>
        <hr>
        <div class="padding-10 bank-radio">
            <h3 class="font-md">درگاه بانکی را انتخاب نمایید</h3>
            <div class="form-group">
                <label class="control-label">ملت :</label>
                <input type="radio" placeholder="" class="" /> 
            </div>
            <div class="form-group">
                <label class="control-label">پارسیان :</label>
                <input type="radio" placeholder="" class="" /> 
            </div>
            <div class="form-group">
                <label class="control-label">ملی :</label>
                <input type="radio" placeholder="" class="" /> 
            </div>
        </div>
        <div class="row"></div>
        <hr>
        <div class="center-box ">
            <div class="margin-top-20 margin-bottom-20">
                <button  class="btn btn-success margin-left-10">پرداخت</button>
                <a href="<?= Url::to(['/site/order']) ?>" class="btn btn-danger">انصراف و بازگشت</a>
                    <?php ActiveForm::end(); ?>

                </div>
            </div>

        </div>
    </section>
</div>