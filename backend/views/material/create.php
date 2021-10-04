<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Material */

$this->title = 'Tambah Data Material';
$this->params['breadcrumbs'][] = ['label' => 'Material', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
