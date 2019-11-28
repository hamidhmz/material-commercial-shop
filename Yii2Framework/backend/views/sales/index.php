<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\SalesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Sales');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'product_id',
                'value' => function ($model) {
                    $product = $model->getProduct()->one();
                    $cat = $product->getCategory0()->one()->name;
                    $type = $product->getType0()->one()->name;
                    return "$cat $type";
                },
            ],
            [
                'attribute' => 'buyer_id',
                'value' => function ($model) {
                    return $model->getBuyer()->one()->fullname;
                },
            ],
            'count',
            'total_cost',
            // 'transportation_costs',
            // 'carry_method',
            // 'status',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}'
            ],
        ],
    ]); ?>
</div>
