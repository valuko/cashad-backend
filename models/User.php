<?php

namespace app\models;

use yii\db\ActiveRecord;

class User extends ActiveRecord
{

    public function getOrders() {
        return $this->hasMany(Order::className(), ['user_id' =>'id']);
    }
}
