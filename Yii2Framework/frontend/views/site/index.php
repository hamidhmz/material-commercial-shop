<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = 'Index';
?>
<div class="site-index">
    <!-- End Navigation bar -->
    <!-- Content Start -->
    <!-- start static header -->
    <section class="static-section">
        <div class="container">

            <div class="row static-header-content-wrapper">
                <div class="col-md-12 static-header-content">
                    <div class="static-header-text">
                        <h4 class="font-white">اگر به دنبال مصالح خوب و قابل اطمینان هستید به ما بپیوندید </h4>
                        <h1 class="font-white text-center font-hg margin-bottom-30">مصالح ساختمانی عقاب <b style="color: red">سرخ</b> </h1>
                    </div>
                    <div class="search-form-wrap2">
                        <form class="clearfix" action="<?=  Url::to(['/site/search'])?>">
                            <div class="input-field-wrap pull-left">
                                <input class="search-form-input" name="name" placeholder="کلمه ی مورد نظر خود را جستجو کنید .." type="text" />
                            </div>

                            <div class="submit-field-wrap pull-left">
                                <input class="search-form-submit btn-success font-hg" name="key-word" type="submit" value="جستجوی مصالح" />
                            </div>
                        </form>
                    </div>

                </div>
            </div>



        </div>
    </section>
   
    <section id="best-product" class="best-product">
        <div class="container">

            <div class="row">
                <div class="col-md-12 text-center">
                    <h2 class="font-lg"><span class="font-blue">محصول</span> مورد نظرتان را انتخاب کنید</h2>
                </div>
                <!-- col-md-12 -->
            </div>

            <!-- Single product detail -->
            <div class="row">
               
                <!-- product detail -->
                 <?php
                foreach ($categories as $index => $category4) {
                   
                    $image=$category4->image;
                    
                    ?>
                <div class="col-md-3 col-xs-12">
                    <div class="item-block">
                        <header>
                            <a href="#"><img src="<?=  Url::to(['/uploads/'.($image?$image:'logo.png')])?>" alt="" width="190" height="145"></a>
                            <div class="hgroup">
                                <h4><a href="#"><?= $category4->name?></a></h4>
                                <p class="font-md">بهترین محصولات <b style="color: red"><?=$category4->name ?></b> را در سایت ما مشاهده کنید</p>
                                <p class="font-md"></p>
                            </div>

                        </header>

                        <footer style="padding:14px 10px">
<!--                            <p class="status">
                                <span>
                                    <span style="color: #ED1C3B;"><i class="fa fa-star" ></i></span>
                                    <span style="color: #ED1C3B;"><i class="fa fa-star" ></i></span>
                                    <span style="color: #ED1C3B;"><i class="fa fa-star" ></i></span>
                                    <span style="color: #CCCCCC;"><i class="fa fa-star" ></i></span>
                                    <span style="color: #CCCCCC;"><i class="fa fa-star" ></i></span>
                                    <span class="review">
                                        (<span>155</span>)
                                    </span>
                                </span>
                            </p>-->
                           

                            <div class="action-btn pull-right" >
                                <a class="btn btn-info" href="<?= Url::to(['/site/search','name'=>$category4->name])?>">مشاهده بیشتر</a>
                            </div>
                            <div class="pull-left">
                            </div>
                            <div class="clearfix"></div>
                        </footer>
                    </div>
                </div>
                <?php
                }
                ?>
               
            </div>
            <!-- End Single product detail -->
        </div>
    </section>
    <section class="bt-block-home-parallax" style="background-image: url(assets/img/index/reparallax-one.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="lookbook-product">
                        <h2 class="font-hg">با مصالح عقاب <b style="color: red">سرخ</b> بهترین سازه ها را بسازید</h2>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.bt-block-home-parallax -->
    <!-- start featured product -->
    <div class="featured-product">
        <div class="container">
            <div class="row">
                <div class="col-md-12 text-center">

                    <h2 class="font-lg">برخی از <span class="font-blue">شرکت ها و کارخانه های</span> طرف قرارداد ما</h2>
                </div>
                <!-- col-md-12 -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="text-center">
                        <ul class="list-unstyled list-inline row">
                            <li class="col-md-2 " style="width: 150px;margin-left: 80px">
                                <a href=""><img src="<?= Url::to(['/assets/img/comlogo/l1.png'])?>" alt=""></a>
                            </li>
                            <li class="col-md-2" style="width: 150px;margin-left: 80px">
                                <a href=""><img src="<?= Url::to(['/assets/img/comlogo/l2.png'])?>" alt=""></a>
                            </li>
                            <li class="col-md-2" style="width: 150px;margin-left: 80px;margin-top: 19px;">
                                <a href=""><img src="<?= Url::to(['/assets/img/comlogo/l3.png'])?>" alt=""></a>
                            </li>
                            <li class="col-md-3" style="width: 150px;margin-left: 80px">
                                <a href=""><img src="<?= Url::to(['/assets/img/comlogo/l4.png'])?>" alt=""></a>
                            </li>
                            <li class="col-md-2 " style="width: 150px;margin-top: -22px;">
                                <a href=""><img src="<?= Url::to(['/assets/img/comlogo/l5.png'])?>" alt=""></a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
