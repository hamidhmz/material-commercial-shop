<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sales".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $buyer_id
 * @property integer $count
 * @property integer $total_cost
 * @property integer $status
 *
 * @property Buyers $buyer
 * @property Products $product
 */
class Sales extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'count', 'total_cost'], 'required'],
            [['product_id', 'buyer_id', 'count', 'total_cost', 'status'], 'integer'],
            [['buyer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Buyers::className(), 'targetAttribute' => ['buyer_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'buyer_id' => 'Buyer ID',
            'count' => 'Count',
            'total_cost' => 'Total Cost',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBuyer()
    {
        return $this->hasOne(Buyers::className(), ['id' => 'buyer_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }
}
