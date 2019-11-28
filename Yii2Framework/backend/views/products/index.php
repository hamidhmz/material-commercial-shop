<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Products');
?>
<div class="products-index">
    <p><?= Html::a(Yii::t('app', 'Create Products'), ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'model',
            [
                'attribute' => 'category',
                'value' => function ($model) {
                    return $model->getCategory0()->one()->name;
                },
            ],
            [
                'attribute' => 'type',
                'value' => function ($model) {
                    return $model->getType0()->one()->name;
                },
            ],
            'weight',
            'price',
            'count',
                        
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
</div>