<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
/* @var $this yii\web\View */
/* @var $model common\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="products-form">
    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'category')->dropDownList(ArrayHelper::map($categories, 'id', 'name'), ['prompt' => Yii::t('app', 'Select')]) ?>
            <?= $form->field($model, 'type')->dropDownList(ArrayHelper::map($types, 'id', 'name'), ['prompt' => Yii::t('app', 'Select')]) ?>
            <?= $form->field($model, 'model')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'weight')->textInput() ?>
            <?= $form->field($model, 'count')->textInput() ?>
        </div>
        <div class="col-md-8">
            <?= $form->field($model, 'description')->textarea(['rows' => 8]) ?>
            <div class="row">
                <div class="col-md-6">
                    <?= $form->field($model, 'price')->textInput() ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="form-group">
                <label class="control-label">تصاویر</label>
                <?= Html::fileInput('image', null) ?>
            </div>
        </div>
    </div>
    <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    <?php ActiveForm::end(); ?>
</div>