
<?php

use yii\helpers\Url;

/* @var $this yii\web\View */
$this->title = Yii::t('app', 'Brand');
?>
<div class="site-index">
    <div class="row">
        <div class="col-lg-3">
            <a href="<?= Url::to(['/user/index']) ?>">
                <div class="  widget lazur-bg p-lg text-center" style="height: 350px">
                    <div class="m-b-md">
                        <i class="fa fa-users fa-4x" style="font-size: 8em;"></i>
                    </div>
                    <h3 class="font-bold ">
                        کاربران
                    </h3>
                    <h3 style="margin-top: 100px">
                        تعداد:<?=$users?>
                    </h3>
                </div>
            </a> 
        </div>
        <div class="col-lg-3">
            <a href="<?= Url::to(['/categories/index']) ?>">
                <div class="widget navy-bg p-lg text-center" style="height: 350px">
                    <div class="m-b-md">
                        <i class="fa fa-tags fa-4x" style="font-size: 8em;"></i>
                    </div>
                    <h3 class="font-bold ">
                        دسته بندی ها
                    </h3>
                    <h3 style="margin-top: 100px">
                        تعداد:<?=$categoris?>
                    </h3>
                </div>
            </a> 
        </div>
        <div class="col-lg-3">
            <a href="<?= Url::to(['/products/index']) ?>" >
                <div class="widget yellow-bg p-lg text-center" style="height: 350px">
                    <div class="m-b-md">
                        <i class="fa fa-shopping-cart fa-5x" style="font-size: 8em;"></i>
                    </div>
                    <h3 class="font-bold ">
                        محصولات
                    </h3>
                    <h3 style="margin-top: 100px">
                        تعداد:<?=$products?>
                    </h3>
                </div>
            </a> 
        </div>
        <div class="col-lg-3">
            <a href="<?= Url::to(['/sales/index']) ?>" >
                <div class="widget red-bg p-lg text-center" style="height: 350px">
                    <div class="m-b-md">
                        <i class="fa fa-money" style="font-size: 8em;"></i>
                    </div>
                    <h3 class="font-bold ">
                        فروش ها
                    </h3>
                    <h3 style="margin-top: 100px">
                        تعداد:<?=$sales?>
                    </h3>
                </div>
            </a> 
        </div>
    </div>
</div>