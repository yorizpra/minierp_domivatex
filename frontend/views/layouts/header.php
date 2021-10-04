<?php

use frontend\widgets\topNavWidget;

?>
<style>
.bg-dark {
    background-color: #004282 !important;
}

.navbar-brand {
    margin-left: 40px;
}

</style>
<header>

    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark"> 
        <a class="navbar-brand" href="<?php echo Yii::$app->request->baseUrl; ?>">PPID-BPOM
            <?php /*
            <img src="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/logo.png" height="80" alt="LOGO">
            */ ?>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <?= topNavWidget::widget(); ?>

    </nav>
</header>
