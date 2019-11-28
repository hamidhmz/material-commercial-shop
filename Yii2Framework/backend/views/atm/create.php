<?php
/* @var $this yii\web\View */
/* @var $model common\models\Atm */
$this->title = Yii::t('app', 'Create Atm');
?>
<div class="atm-create">
    <?= $this->render('_form', ['model' => $model]) ?>
</div>