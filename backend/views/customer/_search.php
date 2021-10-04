<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\CustomerSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_customer') ?>

    <?= $form->field($model, 'nama_customer') ?>

    <?= $form->field($model, 'alamat') ?>

    <?= $form->field($model, 'id_kabupaten') ?>

    <?= $form->field($model, 'nomor_telepon') ?>

    <?php // echo $form->field($model, 'email') ?>

    <?php // echo $form->field($model, 'npwp') ?>

    <?php // echo $form->field($model, 'nama_kontak') ?>

    <?php // echo $form->field($model, 'limit_kredit') ?>

    <?php // echo $form->field($model, 'total_kredit') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
