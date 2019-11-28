<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Buyers */

$this->title = Yii::t('app', 'Create Buyers');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Buyers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="buyers-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
