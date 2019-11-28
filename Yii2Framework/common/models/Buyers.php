<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "buyers".
 *
 * @property integer $id
 * @property string $fullname
 * @property string $address
 * @property string $mobile
 * @property integer $token
 *
 * @property Sales[] $sales
 */
class Buyers extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'buyers';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fullname', 'address', 'mobile'], 'required'],
            [['address'], 'string'],
            [['token'], 'integer'],
            [['fullname'], 'string', 'max' => 255],
            [['mobile'], 'string', 'max' => 14],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'fullname' => Yii::t('app', 'Fullname'),
            'address' => Yii::t('app', 'Address'),
            'mobile' => Yii::t('app', 'Mobile'),
            'token' => Yii::t('app', 'Token'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::className(), ['buyer_id' => 'id']);
    }
}
