<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 21:50
 */

namespace app\models;

use yii\db\ActiveRecord;

class Orders extends ActiveRecord
{

    public  function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['id' => 'product_id']);
    }

    public function rules()
    {
        return [
            [['quantity','date','user_id','product_id'], 'required',],
        ];
    }

    public function extraFields()
    {
        return ['product','user'];
    }
}