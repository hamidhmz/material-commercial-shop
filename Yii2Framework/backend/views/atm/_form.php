<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Atm */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="atm-form">
    <div class="row">
        <div class="col-md-4">
            <?php $form = ActiveForm::begin(); ?>
            <?= $form->field($model, 'card_number')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'cvv2')->textInput() ?>
            <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'deadtime')->textInput() ?>
            <?= $form->field($model, 'price')->textInput() ?>
            <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>