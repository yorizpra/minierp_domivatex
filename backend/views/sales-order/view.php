<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\SalesOrder */

//$this->title = $model->id_sales_order;
$this->title = 'Detail '.'Sales Order';
$this->params['breadcrumbs'][] = ['label' => 'Sales Order', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body sales-order-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_sales_order], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_sales_order], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'tanggal_order',
            'nomor_sales_order',
            'nomor',
            'month',
            'year',
            'invoice_total',
            'bayar_total_bayar',
            'bayar_cara',
            'bayar_uang_muka',
            'bayar_bukti',
            'status_order',
            'created_date',
            'created_ip_address',
            ],
        ]) ?>

    </div>
</div>
