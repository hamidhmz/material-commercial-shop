<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Categories */
$this->title = Yii::t('app', 'Update');
?>
<div class="categories-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>