<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
/* @var $this yii\web\View */
/* @var $model common\models\Products */
$this->title = Yii::t('app', 'Category');
?>
<div class="products-view">
    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'model',
            [
                'attribute' => 'category',
                'value' => $model->getCategory0()->one()->name,
            ],
            [
                'attribute' => 'type',
                'value' => $model->getType0()->one()->name,
            ],
            'weight',
            'price',
            'count',
            'description:ntext',
            [
                'label' => 'تصویر',
                'format' => 'raw',
                'value' => Html::img($model->getImage(),['width' => 300])
            ]
        ],
    ]) ?>
</div>