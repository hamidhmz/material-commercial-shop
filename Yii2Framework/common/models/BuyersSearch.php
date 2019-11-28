<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Buyers;
class BuyersSearch extends Buyers {
    public function rules() {
        return [
                [['id', 'token'], 'integer'],
                [['fullname', 'address', 'mobile'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = Buyers::find();
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id,'token' => $this->token]);
        $query->andFilterWhere(['like', 'fullname', $this->fullname])->andFilterWhere(['like', 'address', $this->address])->andFilterWhere(['like', 'mobile', $this->mobile]);
        return $dataProvider;
    }
}