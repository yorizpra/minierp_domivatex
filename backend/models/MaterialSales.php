<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "material_sales".
 *
 * @property int $id_material_sales
 * @property int $sales_id_sales_order
 * @property int|null $sales_harga_jual
 * @property int|null $sales_created_id_user
 * @property string|null $sales_created_date
 * @property string|null $sales_created_ip_address
 * @property int $id_material_finish
 * @property int $id_material
 * @property int $id_material_kategori1
 * @property int $id_material_kategori2
 * @property int $id_material_kategori3
 * @property int $yard
 * @property string|null $kode
 * @property int $year
 * @property int $no_urut
 * @property string $no_urut_kode
 * @property int $no_splitting
 * @property string $barcode_kode
 * @property string|null $deskripsi
 * @property int $is_packing
 * @property int $id_basic_packing
 * @property int $id_material_in_item_proc
 * @property int $id_material_in
 * @property int $is_join_packing
 * @property string|null $join_info
 * @property int $id_gudang
 * @property int|null $created_id_user
 * @property string|null $created_date
 * @property string|null $created_ip_address
 */
class MaterialSales extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'material_sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sales_id_sales_order', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_urut_kode', 'no_splitting', 'barcode_kode', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'id_gudang'], 'required'],
            [['sales_id_sales_order', 'sales_harga_jual', 'sales_created_id_user', 'id_material_finish', 'id_material', 'id_material_kategori1', 'id_material_kategori2', 'id_material_kategori3', 'yard', 'year', 'no_urut', 'no_splitting', 'is_packing', 'id_basic_packing', 'id_material_in_item_proc', 'id_material_in', 'is_join_packing', 'id_gudang', 'created_id_user'], 'integer'],
            [['sales_created_date', 'created_date'], 'safe'],
            [['sales_created_ip_address', 'created_ip_address'], 'string', 'max' => 64],
            [['kode', 'barcode_kode'], 'string', 'max' => 50],
            [['no_urut_kode'], 'string', 'max' => 20],
            [['deskripsi'], 'string', 'max' => 500],
            [['join_info'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_material_sales' => 'Id Material Sales',
            'sales_id_sales_order' => 'Sales Id Sales Order',
            'sales_harga_jual' => 'Sales Harga Jual',
            'sales_created_id_user' => 'Sales Created Id User',
            'sales_created_date' => 'Sales Created Date',
            'sales_created_ip_address' => 'Sales Created Ip Address',
            'id_material_finish' => 'Id Material Finish',
            'id_material' => 'Id Material',
            'id_material_kategori1' => 'Id Material Kategori1',
            'id_material_kategori2' => 'Id Material Kategori2',
            'id_material_kategori3' => 'Id Material Kategori3',
            'yard' => 'Yard',
            'kode' => 'Kode',
            'year' => 'Year',
            'no_urut' => 'No Urut',
            'no_urut_kode' => 'No Urut Kode',
            'no_splitting' => 'No Splitting',
            'barcode_kode' => 'Barcode Kode',
            'deskripsi' => 'Deskripsi',
            'is_packing' => 'Is Packing',
            'id_basic_packing' => 'Id Basic Packing',
            'id_material_in_item_proc' => 'Id Material In Item Proc',
            'id_material_in' => 'Id Material In',
            'is_join_packing' => 'Is Join Packing',
            'join_info' => 'Join Info',
            'id_gudang' => 'Id Gudang',
            'created_id_user' => 'Created Id User',
            'created_date' => 'Created Date',
            'created_ip_address' => 'Created Ip Address',
        ];
    }
}
