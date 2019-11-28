<?php
namespace common\models;
use Yii;
/**
 * This is the model class for table "products".
 *
 * @property integer $id
 * @property string $model
 * @property integer $category
 * @property integer $type
 * @property integer $weight
 * @property integer $price
 * @property string $description
 *
 * @property Gallery[] $galleries
 * @property Types $type0
 * @property Categories $category0
 * @property Sales[] $sales
 */
class Products extends \yii\db\ActiveRecord {
    public static function tableName() {
        return 'products';
    }
    public function rules() {
        return [
                [['model','count', 'category', 'type', 'weight', 'price', 'description'], 'required'],
                [['category','count', 'type', 'weight', 'price'], 'integer'],
                [['description'], 'string'],
                [['model'], 'string', 'max' => 255],
                [['type'], 'exist', 'skipOnError' => true, 'targetClass' => Types::className(), 'targetAttribute' => ['type' => 'id']],
                [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Categories::className(), 'targetAttribute' => ['category' => 'id']],
        ];
    }
    public function attributeLabels() {
        return [
            'id' => Yii::t('app', 'ID'),
            'model' => Yii::t('app', 'Model'),
            'category' => Yii::t('app', 'Category'),
            'type' => Yii::t('app', 'Type'),
            'weight' => Yii::t('app', 'Weight'),
            'price' => Yii::t('app', 'Price'),
            'description' => Yii::t('app', 'Description'),
            'count' => Yii::t('app', 'count'),
        ];
    }
    public function getGalleries() {
        return $this->hasMany(Gallery::className(), ['product_id' => 'id']);
    }
    public function getType0() {
        return $this->hasOne(Types::className(), ['id' => 'type']);
    }
    public function getCategory0() {
        return $this->hasOne(Categories::className(), ['id' => 'category']);
    }
    public function getSales() {
        return $this->hasMany(Sales::className(), ['product_id' => 'id']);
    }
    public function getImage() {
        $url = '';
        $image = $this->getGalleries()->orderBy(['id' => SORT_DESC])->one();
        if ($image) {
            $url = str_replace('/admin/', '/', Yii::$app->urlManager->createAbsoluteUrl(['/uploads/' . $image->address]));
        }
        return $url;
    }
}