<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

NavBar::begin([
    'brandLabel' => Html::img(Url::to(['../assets/img/index/logo.png']),['width' => '50','height' => '50','style'=>'margin-top: -16px;']),
    'brandUrl' => Yii::$app->homeUrl,
    'options' => [
        'class' => 'navbar-inverse navbar-fixed-top',
    ],
]);
$menuItems = [
    ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
];
if (Yii::$app->user->isGuest) {
    $menuItems[] = ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']];
}
else {
    $menuItems[] = ['label' => Yii::t('app', 'Users'), 'url' => ['/user/index']];
    $menuItems[] = ['label' => Yii::t('app', 'Categories'), 'url' => ['/categories/index']];
    $menuItems[] = ['label' => Yii::t('app', 'Products'), 'url' => ['/products/index']];
    $menuItems[] = ['label' => Yii::t('app', 'Sales'), 'url' => ['/sales/index']];
    $menuItems[] = '<li>' . Html::beginForm(['/site/logout'], 'post') . Html::submitButton(Yii::t('app', 'Logout'), ['class' => 'btn btn-link logout']) . Html::endForm() . '</li>';
}
echo Nav::widget([
    'options' => ['class' => 'navbar-nav navbar-right'],
    'items' => $menuItems,
]);
NavBar::end();
?>