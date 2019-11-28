<?php
use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model common\models\Categories */
$this->title = Yii::t('app', 'Create Category');
?>
<div class="categories-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>