<?php

use yii\helpers\Url;
use common\models\Sales;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
//$sales = Sales::find()
//        ->select('sales.total_cost, concat(categories.name, products.model) as product_id')
//        ->innerJoin('products', 'sales.product_id=products.id')
//        ->innerJoin('categories', 'products.category=categories.id')
//        ->where(['sales.ip' => ])
//        ->orderBy(['sales.id' => SORT_ASC])
//        ->all();
$sales = Yii::$app->getDb()->createCommand("
    SELECT `sales`.`total_cost` as `cost`, concat(concat(categories.name, ' '), `products`.`model`) AS `name`
    FROM `sales`
    INNER JOIN `products` ON sales.product_id=products.id
    INNER JOIN `categories` ON products.category=categories.id
    WHERE `sales`.`status`=1 and (user_id=" . Yii::$app->user->id . " OR ip='" . $_SERVER['REMOTE_ADDR'] . "')
    ORDER BY `sales`.`id`
")->queryAll();
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
                    <div class="dash-right-img">

                    </div>
                    <div class="margin-top-10 margin-bottom-10">
                        <p class="box-center text-center"><?= Yii::$app->user->identity->username ?></p>

                    </div>
                    <div class="dash-right-link">
                        <ul>
                            <li class=""><a href="<?= Url::to(['/site/profile']) ?>"><i class="fa fa-home"></i>داشبورد</a></li>
                            <li class=""><a href="<?= Url::to(['/site/profile-buy']) ?>"><i class="fa fa-shopping-bag"></i>خرید های من</a></li>
                            <li class="active"><a href="<?= Url::to(['/site/profile-order']) ?>"><i class="fa fa-shopping-cart"></i>سفارش های من</a></li>
                            <li><a href="<?= Url::to(['/site/logout']) ?>"><i class="fa fa-power-off"></i>خروج</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-sm-8 margin-right-10 bg-white circle-top-5 md-shadow-z-1">
                <div class="title-v1  ">
                    <i class="fa fa-shopping-cart fa-2x"></i>
                    <h1 class="padding-bottom-10 padding-top-10 font-lg" >سفارشات من</h1>
                </div>
                <article class="padding-10">
                    <p>تعداد سفارشات خود را با جزییات مشاهده نمایید.</p>
                        <?php
                        if ($sales) {
                            ?>
                    <table class="table">
                            <thead>
                            <th>نام محصول</th>
                            <th>قیمت</th>
                            </thead>
                            <?php
                            foreach ($sales as $index => $sale) {
                                ?>
                                <tbody>
                                    <tr>
                                        <td><?= $sale['name'] ?></td>
                                        <td><?= $sale['cost'] ?></td>
                                        <td colspan="2" class="text-center">
                                            <a class="btn btn-success btn-sm" href="<?= Url::to(['/site/payment']) ?>">تکمیل خرید</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>



                                <?php
                            } else {
                                ?>

                            <td colspan="2" class="text-center">--&nbsp;محصولی سفارش داده نشده است&nbsp;--</td>

                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </article>
            </div>
        </div>


    </div>
    <!-- Main container end -->




    <!-- Content Start -->
</div>