<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 22:27
 */

namespace app\controllers;

use yii\rest\ActiveController;

class ProductController extends ActiveController
{
    public $modelClass = 'app\models\Products';
}