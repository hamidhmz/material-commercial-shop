<?php
/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = Yii::t('app', 'Update');
?>
<div class="user-update">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>