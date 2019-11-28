<?php
/* @var $this yii\web\View */
/* @var $model common\models\Products */
$this->title = Yii::t('app', 'Create Products');
?>
<div class="products-create">
    <?= $this->render('_form', ['model' => $model, 'types' => $types, 'categories' => $categories]) ?>
</div>