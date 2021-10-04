<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */

//$this->title = $model->id_customer;
$this->title = 'Detail '.'Customer';
$this->params['breadcrumbs'][] = ['label' => 'Customer', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="box">
    <div class="box-body customer-view">

                <p>
            <?= Html::a('Update', ['update', 'id' => $model->id_customer], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id_customer], [
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
                'nama_customer',
            'alamat',
            'nomor_telepon',
            'email:email',
            'npwp',
            'nama_kontak',
            'limit_kredit',
            'total_kredit',
            ],
        ]) ?>

    </div>
</div>
