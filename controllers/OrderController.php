<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 22:32
 */

namespace app\controllers;

use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    public $modelClass = 'app\models\Orders';
}