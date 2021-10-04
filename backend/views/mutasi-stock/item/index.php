<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\MutasiStockItemSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Mutasi Stock Item';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="box">
    <div class="box-body mutasi-stock-item-index">

        
        <p>
            <?= Html::a('Tambah Barang', ['create-item', 'ip'=>$ip], ['class' => 'btn btn-success btn-sm']) ?>
        </p>

                <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
            <?= GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],
                    [
                        'attribute' => 'id_material_finish',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish)) {
                                return $data->materialFinish->kode;
                            } else {
                                return "--";
                            }
                        },

                    ],
                    [
                        //'attribute' => 'id_material',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish->mater)) {
                                return $data->materialFinish->mater->nama;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_material', $dataListMaterial, ['class' => 'form-control']),
                    ],
                    [
                        //'attribute' => 'id_material_kategori1',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish->materialKategori1)) {
                                return $data->materialFinish->materialKategori1->nama;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori1', $dataListMaterialKategori1, ['class' => 'form-control']),
                    ],
                    [
                        //'attribute' => 'id_material_kategori2',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish->materialKategori2)) {
                                return $data->materialFinish->materialKategori2->nama;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori2', $dataListMaterialKategori2, ['class' => 'form-control']),
                    ],
                    [
                        //'attribute' => 'id_material_kategori3',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish->materialKategori3)) {
                                return $data->materialFinish->materialKategori3->nama;
                            } else {
                                return "--";
                            }
                        },
                        //'filter'=>Html::activeDropDownList($searchModel, 'id_material_kategori3', $dataListMaterialKategori3, ['class' => 'form-control']),
                    ],
                    //'yard',
                    [
                        
                        //'attribute' => 'yard',
                        'format' => 'raw',
                        'value' => function ($data) {
                            if (isset($data->materialFinish)) {
                                if ($data->materialFinish->is_join_packing){
                                    return $data->materialFinish->yard. '<br>
                                    <span class="label label-warning">['.$data->materialFinish->join_info."]</span>";
                                }else{
                                    return $data->materialFinish->yard;
                                }
                            }else{
                                return "--";
                            }
                        },

                    ],

                    [
                        'label' => 'Hapus',
                        'format' => 'raw',

                        'value' => function ($data) use ($ip) {
                            //$ic = EncryptionDB::staticEncryptor('encrypt', $data->id_pelanggaran);
                            return Html::a(
                                '<i class="fa fa-fw fa-trash"></i>',
                                ['mutasi-stock/delete-item', 'id_item' => $data->id_mutasi_stock_item, 'id_parent' => $ip],
                                ['class' => 'btn btn-danger btn-xs']
                            );
                        }
                    ],
                    //'keterangan',

                    //['class' => 'yii\grid\ActionColumn'],
            ],
        ]); ?>
        <div class="callout callout-warning">
            <h4>Cetak Surat Jalan</h4>

            <p>Pastikan data-data sudah lengkap dan benar. Jika anda sudah cetak surat jalan maka sudah tidak bisa diubah lagi</p>

            <?= Html::a('Cetak Surat Jalan', ['cetak-surat-jalan', 'ip'=>$ip], ['class' => 'btn btn-danger btn-sm']) ?>
        </div>

    </div>
</div>
