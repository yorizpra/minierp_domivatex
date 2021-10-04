<?php

use frontend\assets\AppAsset;
use yii\helpers\Html;

/* @var $this \yii\web\View */
/* @var $content string */
AppAsset::register($this);
?>


<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <link href="<?php echo Yii::$app->request->baseUrl; ?>/frontend/web/img/favicon.png" rel="icon">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/cookieconsent@3/build/cookieconsent.min.css" />

    <title><?= Html::encode($this->title) ?></title>
    <!-- Favicons -->
        <?php $this->head() ?>

</head>
<body >
<?php $this->beginBody() ?>
<?= $content ?>
<?php /*
<?= $this->render('header') ?>
<?= $content ?>
<?= $this->render('footer') ?>
<!-- FOOTER -->
<?php $this->endBody() ?>


<?php
echo $this->render('_dialog_cookies', [
]);
?>
<button id="back-to-top"  class="back-to-top" title="Go to top"></button>
</body>
</html>
<?php $this->endPage() ?>
*/ ?>

<?php
echo $this->render('_back_to_top', [
]);
?>