<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public function getOrders() {
        return $this->hasMany(Orders::className(), ['user_id' =>'id']);
    }
}
