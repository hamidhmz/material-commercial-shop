<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "atm".
 *
 * @property integer $id
 * @property string $card_number
 * @property integer $cvv2
 * @property string $password
 * @property string $deadtime
 * @property integer $price
 */
class Atm extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'atm';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['card_number', 'cvv2', 'password', 'deadtime'], 'required'],
            [['cvv2', 'price'], 'integer'],
            [['deadtime'], 'safe'],
            [['card_number', 'password'], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'card_number' => Yii::t('app', 'Card Number'),
            'cvv2' => Yii::t('app', 'Cvv2'),
            'password' => Yii::t('app', 'Password'),
            'deadtime' => Yii::t('app', 'Deadtime'),
            'price' => Yii::t('app', 'Price'),
        ];
    }
}
