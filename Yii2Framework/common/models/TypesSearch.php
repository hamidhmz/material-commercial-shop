<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Types;
class TypesSearch extends Types {
    public function rules() {
        return [
                [['id'], 'integer'],
                [['name'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = Types::find();
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        return $dataProvider;
    }
}