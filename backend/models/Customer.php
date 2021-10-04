<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id_customer
 * @property string $nama_customer
 * @property string $alamat
 * @property int $id_kabupaten
 * @property string|null $nomor_telepon
 * @property string|null $email
 * @property string|null $npwp
 * @property string|null $nama_kontak
 * @property int|null $limit_kredit
 * @property int|null $total_kredit
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nama_customer', 'alamat', 'id_kabupaten'], 'required'],
            [['id_kabupaten', 'limit_kredit', 'total_kredit'], 'integer'],
            [['nama_customer', 'alamat', 'nomor_telepon', 'email', 'npwp', 'nama_kontak'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_customer' => 'Id Customer',
            'nama_customer' => 'Nama Customer',
            'alamat' => 'Alamat',
            'id_kabupaten' => 'Id Kabupaten',
            'nomor_telepon' => 'Nomor Telepon',
            'email' => 'Email',
            'npwp' => 'Npwp',
            'nama_kontak' => 'Nama Kontak',
            'limit_kredit' => 'Limit Kredit',
            'total_kredit' => 'Total Kredit',
        ];
    }
}
