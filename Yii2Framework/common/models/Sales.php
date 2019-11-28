<?php

namespace common\models;

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
 * @property integer $transportation_costs
 * @property integer $carry_method
 * @property integer $user_id
 * @property string $ip
 *
 * @property User $user
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
            [['product_id', 'count', 'ip'], 'required'],
            [['product_id', 'buyer_id', 'count', 'total_cost', 'status', 'transportation_costs', 'carry_method', 'user_id'], 'integer'],
            [['ip'], 'string', 'max' => 15],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'id' => Yii::t('app', 'ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'buyer_id' => Yii::t('app', 'Buyer ID'),
            'count' => Yii::t('app', 'Count'),
            'total_cost' => Yii::t('app', 'Total Cost'),
            'status' => Yii::t('app', 'Status'),
            'transportation_costs' => Yii::t('app', 'Transportation Costs'),
            'carry_method' => Yii::t('app', 'Carry Method'),
            'user_id' => Yii::t('app', 'User ID'),
            'ip' => Yii::t('app', 'Ip'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
