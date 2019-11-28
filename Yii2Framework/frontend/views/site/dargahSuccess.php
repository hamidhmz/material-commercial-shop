<?php

use yii\widgets\ActiveForm;
use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-about">
    <!-- Content Start -->
    <!-- Start Pages Title  -->
    <!-- End Pages Title  -->
    <main class="" style="text-align: -moz-center !important;max-width: none !important">

        <div class="login-block1" style="width: 700px;box-shadow: 5px 10px 25px 2px rgb(50,50,50) !important;
             ">
            <h3 style="color:green">پرداخت شما با موفقیت ثبت گردید</h3>
            <div class="col-sm-8 margin-right-10 margin-top-20 bg-white circle-top-5 md-shadow-z-1" style="width:560px">
                <div class="title-v1  ">
                    <i class="fa fa-shopping-bag fa-2x"></i>
                    <h1 class="padding-bottom-10 padding-top-10 font-lg" >خرید های شما</h1>
                </div>
                <article class="padding-tb-20">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>نام محصول</th>
                                <th>نوع</th>
                                <th>تعداد</th>
                                <th>قیمت کل </th>
                                <th>وضعیت پرداخت</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sales as $index => $sale) {
                                ?>
                                <tr>
                                    <td><?= $sale->getProduct()->one()->getCategory0()->one()->name ?></td>
                                    <td><?= $sale->getProduct()->one()->model ?></td>
                                    <td><?= $sale->count ?></td>
                                    <td><?= $sale->total_cost ?></td>
                                    <td style="color:green">پرداخت تکمیل شد</td>
                                </tr>    
                                <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </article>
            </div>
            <div class="center-box ">
                <div class="margin-top-20 margin-bottom-20">
                    <?php
                    if(!Yii::$app->user->isGuest){
                    ?>
                    <a href="<?= Url::to(['/site/profile-buy']) ?>" class="btn btn-success">مشاهده خریدها</a>
                    <?php
                    }else{
                    ?>
                    <a href="<?= Url::to(['/site/index']) ?>" class="btn btn-success">بازگشت به صفحه اصلی</a>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </div>

        <div class="login-links">
        </div>

    </main>
    <!-- Content Start -->
</div>