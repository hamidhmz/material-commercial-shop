<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Sales;

class SalesSearch extends Sales {

    public function rules() {
        return [
            [['id', 'product_id', 'buyer_id', 'count', 'total_cost', 'transportation_costs', 'carry_method', 'status'], 'integer'],
        ];
    }

    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    public function search($params) {
        $query = Sales::find()->where(['status' => 4]);
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id, 'product_id' => $this->product_id, 'buyer_id' => $this->buyer_id, 'count' => $this->count, 'total_cost' => $this->total_cost, 'transportation_costs' => $this->transportation_costs, 'carry_method' => $this->carry_method, 'status' => $this->status]);
        return $dataProvider;
    }

}
