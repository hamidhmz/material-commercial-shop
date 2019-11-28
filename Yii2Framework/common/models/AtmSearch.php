<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Atm;
class AtmSearch extends Atm {
    public function rules() {
        return [
                [['id', 'cvv2', 'price'], 'integer'],
                [['card_number', 'password', 'deadtime'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = Atm::find();
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id, 'cvv2' => $this->cvv2, 'deadtime' => $this->deadtime, 'price' => $this->price]);
        $query->andFilterWhere(['like', 'card_number', $this->card_number])->andFilterWhere(['like', 'password', $this->password]);
        return $dataProvider;
    }
}