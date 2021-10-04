<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "sales_order".
 *
 * @property int $id_sales_order
 * @property string $tanggal_order
 * @property int $id_customer
 * @property int $id_outlet_penjualan
 * @property string|null $nomor_sales_order
 * @property int $nomor
 * @property int $month
 * @property int $year
 * @property int $invoice_total
 * @property int $bayar_total_bayar
 * @property string $bayar_cara
 * @property int $bayar_id_bank_pembayaran
 * @property int $bayar_uang_muka
 * @property string|null $bayar_bukti
 * @property string $status_order
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class SalesOrder extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales_order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tanggal_order', 'id_customer', 'id_outlet_penjualan', 'nomor', 'month', 'year', 'invoice_total', 'bayar_total_bayar', 'bayar_cara', 'bayar_id_bank_pembayaran', 'bayar_uang_muka', 'status_order'], 'required'],
            [['tanggal_order', 'created_date'], 'safe'],
            [['id_customer', 'id_outlet_penjualan', 'nomor', 'month', 'year', 'invoice_total', 'bayar_total_bayar', 'bayar_id_bank_pembayaran', 'bayar_uang_muka', 'created_id_user'], 'integer'],
            [['bayar_cara', 'status_order'], 'string'],
            [['nomor_sales_order', 'bayar_bukti'], 'string', 'max' => 250],
            [['created_ip_address'], 'string', 'max' => 64],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_sales_order' => 'Id Sales Order',
            'tanggal_order' => 'Tanggal Order',
            'id_customer' => 'Id Customer',
            'id_outlet_penjualan' => 'Id Outlet Penjualan',
            'nomor_sales_order' => 'Nomor Sales Order',
            'nomor' => 'Nomor',
            'month' => 'Month',
            'year' => 'Year',
            'invoice_total' => 'Invoice Total',
            'bayar_total_bayar' => 'Bayar Total Bayar',
            'bayar_cara' => 'Bayar Cara',
            'bayar_id_bank_pembayaran' => 'Bayar Id Bank Pembayaran',
            'bayar_uang_muka' => 'Bayar Uang Muka',
            'bayar_bukti' => 'Bayar Bukti',
            'status_order' => 'Status Order',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
