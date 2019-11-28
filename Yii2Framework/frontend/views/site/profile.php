<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-profile">


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
                            <h2 class="page-title font-white">به پنل کاربری خوش آمدید</h2>
                        </div>
                    </div>
                    <div class="col-md-12 text-center">
                        <div class="breadcrumb-trail breadcrumbs">
                            <span class="trail-begin"><a href="index.html">خانه</a></span>
                            <span class="sep">/</span> <span class="trail-end">پنل کاربر</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- End Pages Title  -->

    <!-- Content Start -->
    <div class="row">



        <div class="container  margin-bottom-20">
            <div class="col-sm-3 bg-white circle-top-5 md-shadow-z-1">
                <div class="user-dash-right padding-10">

                    <div class="margin-top-10 margin-bottom-10">
                        <p class="box-center text-center"><?= Yii::$app->user->identity->fullname ?></p>
                    </div>
                    <div class="dash-right-link">
                        <ul>
                            <li class="active"><a href="<?= Url::to(['/site/profile']) ?>"><i class="fa fa-home"></i>داشبورد</a></li>
                            <li class=""><a href="<?= Url::to(['/site/profile-buy']) ?>"><i class="fa fa-shopping-bag"></i>خرید های من</a></li>
                            <li class=""><a href="<?= Url::to(['/site/profile-order']) ?>"><i class="fa fa-shopping-cart"></i>سفارش های من</a></li>
                            <li><a href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-power-off"></i>خروج</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 margin-right-10 bg-white circle-top-5 md-shadow-z-1">
                <div class="title-v1  ">
                    <i class="fa fa-home fa-2x"></i>
                    <h1 class="padding-bottom-10 padding-top-10 font-lg" >داشبورد مدیریت کاربر</h1>
                </div>
                <article class="padding-10 row ">
                    <p>خرید ها و سفارش های خود را ببینید و مدیریت نمایید .</p>
                    <div class="col-lg-5 margin-top-10 " style="background-color: #1ab394;width: 170px;color: #ffffff;text-align: center;margin: 8px;height: 150px;padding: 10px;border-radius: 5px;">
                        <a href="<?= Url::to(['/site/profile-buy']) ?>" style="color: #fff;" class="margin-top-40">
                            <div class="widget navy-bg p-lg text-center" >
                                <div class="m-b-md">
                                    <i class="fa fa-shopping-basket fa-2x" style="margin-top: 15%;" ></i>
                                </div>
                                <h4 class="font-bold ">
                                    خریدها
                                </h4>
                                <h3 style="margin-top: 100px">
                                </h3>
                            </div>
                        </a> 
                    </div>  
                    <div class="col-lg-5 margin-top-10" style="background-color: #23c6c8;width: 170px;color: #ffffff;text-align: center;margin: 8px;height: 150px;padding: 10px;border-radius: 5px;">
                        <a href="<?= Url::to(['/site/profile-order']) ?>" style="color: #fff;" class="margin-top-20">
                            <div class="widget navy-bg p-lg text-center">
                                <div class="m-b-md">
                                    <i class="fa fa-shopping-cart fa-2x" style="margin-top: 15%;"></i>
                                </div>
                                <h4 class="font-bold ">
                                    سفارش ها
                                </h4>
                                <h3 style="margin-top: 100px">
                                </h3>
                            </div>
                        </a> 
                    </div>
                </article>
            </div>
        </div>


    </div>



    <!-- Main container end -->




    <!-- Content Start -->
</div>