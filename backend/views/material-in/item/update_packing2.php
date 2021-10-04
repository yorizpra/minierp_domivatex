<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MaterialInItemProc */

$this->title = 'Update data packing';
$this->params['breadcrumbs'][] = ['label' => 'Material In Item Proc', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
	<div class="box-body material-in-item-proc-create">

		
	    <?= $this->render('_form_packing2', [
	        'model' => $model,
	        'id_parent' =>$id_parent,
	    ]) ?>

	</div>
</div>
