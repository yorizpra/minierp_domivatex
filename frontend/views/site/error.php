<?php

/* @var $this yii\web\View */

use yii\web\View;

/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = 'Page Not Found | Ngoprektoko';
?>
<link rel="stylesheet" href="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/css/404.css">
<div class="site-error">
    <body class="bg-purple">

    <div class="stars">
        <div class="custom-navbar">
            <div class="brand-logo">
            </div>
        </div>
        <div class="central-body">
            <img class="image-404" src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/404/404_.svg ?>" width="300px">
            <h3 class="mt-4" style="color: #ffffff">Ups, salah alamat...</h3>
            <br>
            <a href="<?php echo Yii::$app->request->baseUrl; ?>" class="btn-go-home" target="_blank">GO BACK HOME</a>

        </div>
        <div class="objects">
            <img class="object_rocket" src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/404/rocket.svg" width="40px">
            <div class="earth-moon">
                <img class="object_earth" src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/404/earth.svg" width="100px">
                <img class="object_moon" src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/404/moon.svg" width="80px">
            </div>
            <div class="box_astronaut">
                <img class="object_astronaut" src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/404/astronaut.svg"
                     width="140px">
            </div>
        </div>
        <div class="glowing_stars">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>

        </div>

    </div>

    </body>

</div>
