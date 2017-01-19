<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 21:49
 */

namespace app\models;

use yii\db\ActiveRecord;

class Products extends ActiveRecord
{

    public function getOrders()
    {
        return $this->hasMany(Orders::className(), ['product_id' => 'id']);
    }
}