<?php
/* @var $this yii\web\View */
/* @var $model common\models\Products */
$this->title = Yii::t('app', 'Update');
?>
<div class="products-update">
    <?= $this->render('_form', ['model' => $model, 'types' => $types, 'categories' => $categories]) ?>
</div>