<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Products;
class ProductsSearch extends Products {
    public function rules() {
        return [
                [['id', 'category', 'type', 'weight', 'price'], 'integer'],
                [['model', 'description'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = Products::find();
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id, 'category' => $this->category, 'type' => $this->type, 'weight' => $this->weight, 'price' => $this->price]);
        $query->andFilterWhere(['like', 'model', $this->model])->andFilterWhere(['like', 'description', $this->description]);
        return $dataProvider;
    }
}