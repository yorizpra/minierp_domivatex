<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Customer;

/**
 * CustomerSearch represents the model behind the search form of `backend\models\Customer`.
 */
class CustomerSearch extends Customer
{
    public static function getPagination($request_params)
    {
        $param_val = 'page';
        foreach ($request_params as $key => $value) {
            if (strpos($key, '_tog') !== false) {
                $param_val = $value;
            }
        }
        $pagination = array();
        if ($param_val == 'all') { //returns empty array, which will show all data.
            $pagination = ['pageSize' => false];
        } else if ($param_val == 'page') { //return pageSize as 5
            $pagination = ['pageSize' => 20];
        } else {
            $pagination = ['pageSize' => false];
        }
        return $pagination;  // returns empty array again.
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_customer', 'id_kabupaten', 'limit_kredit', 'total_kredit'], 'integer'],
            [['nama_customer', 'alamat', 'nomor_telepon', 'email', 'npwp', 'nama_kontak'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Customer::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id_customer' => $this->id_customer,
            'id_kabupaten' => $this->id_kabupaten,
            'limit_kredit' => $this->limit_kredit,
            'total_kredit' => $this->total_kredit,
        ]);

        $query->andFilterWhere(['like', 'nama_customer', $this->nama_customer])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'nomor_telepon', $this->nomor_telepon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'npwp', $this->npwp])
            ->andFilterWhere(['like', 'nama_kontak', $this->nama_kontak]);

        $pagination = $this->getPagination($params);

        $dataProvider = new ActiveDataProvider([
            'pagination' => $pagination,
            'query' => $query,
        ]);

        return $dataProvider;
    }
}
