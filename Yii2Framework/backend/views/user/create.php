<?php
/* @var $this yii\web\View */
/* @var $model backend\models\User */
$this->title = Yii::t('app', 'Create User');
?>
<div class="user-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>