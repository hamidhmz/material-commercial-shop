<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-search">

    <section class="static-section-search" style="height: 240px;">
        <div class="container">

            <div class="row static-header-content-wrapper">
                <div class="col-md-12 static-header-content">
                    <div class="static-header-text">
                    </div>

                </div>
            </div>



        </div>
    </section>

    <!-- End Navigation bar -->
    <section class="container-fluid margin-top-20 ">
	<?php
        ?>
        <div class="col-sm-3">
            <div class="title-v1 bg-white circle-top-5 md-shadow-z-1 ">
                <i class="fa fa-calendar-check-o fa-2x"></i>
                <h2 class="padding-bottom-10 padding-top-10" >دسته بندی های دیگر </h2>
            </div>
            <div class="product-list row bg-white circle-bottom-5 md-shadow-z-1" style="color:#000 !important">
                <ul>
                    <?php
                    $categories = common\models\Categories::find()->orderBy(['name' => SORT_ASC])->all();
                    foreach ($categories as $index => $category2) {
                        echo '<li><a style="color:#000 !important" href="' . Url::to(['/site/search', 'name' => $category2->name]) . '">' . $category2->name . '</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="title-v1 bg-white circle-top-5 md-shadow-z-1 ">
                <i class="fa fa-search fa-2x"></i>
                <h2 class="padding-bottom-10 padding-top-10" >جستجو برای محصول <span class="font-blue"><?= $name ?></span></h2>
            </div>
            <div class="search-product row bg-white padding-10 padding-top-30 " style="margin-bottom: 18px !important;">
                <?php
                foreach ($products as $index => $product) {
                    $category3=$product->getCategory0()->one();
                    $type3=$product->getType0()->one();
                    $image=$product->getGalleries()->orderBy(['id' => SORT_DESC])->one();
                    
                    ?>
                <div class="product col-sm-3 md-shadow-z-1" style="height: 331px;margin: 2px; width: 230px">
                        <div class="img-product">
                            <img src="<?=  Url::to(['/uploads/'.($image?$image->address:'logo.png')])?>" alt="" class="img-responsive">
                        </div>
                        <div class="desc-product">
                           
                        </div>
                        <div class="label-product">
                            <h4><a href="#"><?= $category3->name.' '.$product->model?></a></h4>
                            <strong class="margin-top-40"><i class="margin-top-40"></i>  قیمت : <span> <?= $product->price ?> تومان</span></strong>
                        </div>
                        <a href="<?= Url::to(['/site/product-detials','id'=>$product->id])?>" class="btn btn-success margin-top-20 margin-bottom-20">جزيیات</a>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </section>

</div>