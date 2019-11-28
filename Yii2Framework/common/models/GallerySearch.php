<?php
namespace common\models;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Gallery;
class GallerySearch extends Gallery {
    public function rules() {
        return [
                [['id', 'product_id'], 'integer'],
                [['address'], 'safe'],
        ];
    }
    public function scenarios() {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params) {
        $query = Gallery::find();
        $dataProvider = new ActiveDataProvider(['query' => $query, 'sort' => ['defaultOrder' => ['id' => SORT_DESC]]]);
        $this->load($params);
        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        $query->andFilterWhere(['id' => $this->id,'product_id' => $this->product_id]);
        $query->andFilterWhere(['like', 'address', $this->address]);
        return $dataProvider;
    }
}