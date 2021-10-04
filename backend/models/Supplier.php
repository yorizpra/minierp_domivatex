<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "supplier".
 *
 * @property int $id_supplier
 * @property string $name_short
 * @property string $name_company
 * @property string $address
 * @property string $city
 * @property string $state
 * @property string $zip
 * @property string $country
 * @property string $email_address
 * @property string $phone_number
 * @property int $id_type_of_supplier
 * @property string $created_date
 * @property string $created_time
 * @property string $created_ip_address
 * @property int $created_id_user
 * @property int $id_user
 */
class Supplier extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'supplier';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name_short', 'name_company', 'address', 'city', 'state'], 'required'],
            [['id_type_of_supplier', 'created_id_user', 'id_user'], 'integer'],
            [['created_date', 'created_time'], 'safe'],
            [['name_short', 'name_company', 'address', 'email_address'], 'string', 'max' => 250],
            [['city', 'state', 'country', 'phone_number'], 'string', 'max' => 150],
            [['zip'], 'string', 'max' => 200],
            [['created_ip_address'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_supplier' => 'Id Supplier',
            'name_short' => 'Singkatan',
            'name_company' => 'Nama Perusahaan',
            'address' => 'Alamat',
            'city' => 'Kota',
            'state' => 'Propinsi',
            'zip' => 'Kode Pos',
            'country' => 'Negara',
            'email_address' => 'Alamat Email',
            'phone_number' => 'No. HP Kontak',
            'id_type_of_supplier' => 'Tipe Supplier',
            'created_date' => 'Created Date',
            'created_time' => 'Created Time',
            'created_ip_address' => 'Created Ip Address',
            'created_id_user' => 'Created Id User',
            'id_user' => 'Id User',
        ];
    }
}
