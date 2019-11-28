<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Sales */
/* @var $product common\models\Products */
$product = $model->getProduct()->one();
$cat = $product->getCategory0()->one()->name;
$type = $product->getType0()->one()->name;
$this->title = "$cat $type";
?>
<div class="sales-view">
    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'product_id',
                'value' => "$cat $type",
            ],
            [
                'attribute' => 'buyer_id',
                'value' => $model->getBuyer()->one()->fullname,
            ],
            'count',
            'total_cost',
            'transportation_costs',
            'carry_method',
            'status',
        ],
    ])
    ?>
</div>