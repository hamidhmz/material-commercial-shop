<?php
use yii\helpers\Url;
/* @var $this yii\web\View */
$this->title = 'Index';
?>
<div class="site-productDetials">
  <section class="container margin-top-20 bg-white circle-top-5 circle-bottom-5 md-shadow-z-1">
	<?php
        $category3=$product->getCategory0()->one();
         $type3=$product->getType0()->one();
        $image=$product->getGalleries()->orderBy(['id' => SORT_DESC])->one();
        ?>
	<div class="col-sm-5">
		<div class="product-detial-img">
                    <img src="<?=  Url::to(['/uploads/'.($image?$image->address:'logo.png')])?>" alt="نام محصول" class="img-responsive" />
		</div>
	</div>

	<div class="col-sm-7">
		<div class="title-v1  ">
			<i class="fa fa-calendar-check-o fa-2x"></i>
                        <h2 class="padding-bottom-10 padding-top-10" >  جزییات و مشخصات <span class="font-blue"><?= $category3->name.' '.$product->model?></span></h2>
		</div>
		<div class=" row bg-white padding-10 ">
			<div class="product-name">
				<h3><?= $category3->name.' '.$product->model?>   </h3>
			</div>
			<div class="product-desc-detial">
				<p><?= $product->description?></p>
			</div>
			 <div class="label-product">
			 	<strong><i class="fa fa-money"></i>   قیمت <?= $type3->name?>: <span>  <?= $product->price .' '?>تومان  </span></strong>
			 </div>
			 <a href="<?= Url::to(['/site/order','id' => $product->id])?>" class="btn btn-success pull-right margin-top-20">برای درخواست سفارش کلیک کنید </a>
		</div>
	</div><div style="clear: both;"></div>
	<!-- comments -->
	
</section>
</div>