<?php

namespace app\models;

use yii\db\ActiveRecord;

class Users extends ActiveRecord
{

    public function getOrders() {
        return $this->hasMany(Orders::className(), ['user_id' =>'id']);
    }

    public function rules()
    {
        return [
            ['name', 'required', 'message' => 'Name must be provided.'],
            ['name', 'unique'],
        ];
    }
}
