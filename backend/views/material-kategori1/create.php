<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialKategori1 */

$this->title = 'Tambah Material Kategori1';
$this->params['breadcrumbs'][] = ['label' => 'Material Kategori1', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-kategori1-create">

		
	    <?= $this->render('_form', [
	        'model' => $model,
	    ]) ?>

	</div>
</div>
