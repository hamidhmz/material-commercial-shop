<?php
use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel common\models\AtmSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = Yii::t('app', 'Atms');
?>
<div class="atm-index">
    <p><?= Html::a(Yii::t('app', 'Create Atm'), ['create'], ['class' => 'btn btn-success']) ?></p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'card_number',
            'cvv2',
            'password',
            'deadtime',
            'price',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]) ?>
</div>