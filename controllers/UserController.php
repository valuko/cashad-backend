<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 22:20
 */

namespace app\controllers;

use yii\rest\ActiveController;

class UserController extends ActiveController
{
    public $modelClass = 'app\models\Users';
}