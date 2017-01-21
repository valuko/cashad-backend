<?php
/**
 * Created by PhpStorm.
 * User: Victor
 * Date: 19/01/2017
 * Time: 22:32
 */

namespace app\controllers;

use app\models\Orders;
use yii\filters\Cors;
use yii\rest\ActiveController;

class OrderController extends ActiveController
{
    public $modelClass = 'app\models\Orders';

    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);

        return $actions;
    }

    public function actionIndex() {

        $request = \Yii::$app->request;
        $period = $request->get('period');
        $name = $request->get('name');
        $query = Orders::find();

        // Check the period filter
        if ($period == 'today') {
            $query = $query->andOnCondition(['date' => date('Y-m-d')]);
        }
        if ($period == 'week') {
            $query = $query->andWhere('YEARWEEK(date) = YEARWEEK(NOW())');
        }

        // check the search name filter
        if (!empty($name)) {
            $query = $query->joinWith(['product p','user u'])
                ->andWhere(['or', ['like', 'p.name', $name], ['like', 'u.name', $name]]);
        }

        return new \yii\data\ActiveDataProvider([
            'query' => $query,
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return array_merge(parent::behaviors(), [

            // For cross-domain AJAX request
            'corsFilter'  => [
                'class' => Cors::className(),
                'cors' => [
                    // restrict access to
                    'Origin' => ['*'],
                    'Access-Control-Request-Method' => ['GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS'],
                    // Allow only POST and PUT methods
                    'Access-Control-Request-Headers' => ['*'],
                    // Allow only headers 'X-Wsse'
                    'Access-Control-Allow-Credentials' => true,
                    // Allow OPTIONS caching
                    'Access-Control-Max-Age' => 86400,
                    // Allow the X-Pagination-Current-Page header to be exposed to the browser.
                    'Access-Control-Expose-Headers' => [
                        'X-Pagination-Current-Page','X-Pagination-Page-Count',
                        'X-Pagination-Per-Page','X-Pagination-Total-Count',
                    ],
                ],
            ],

        ]);
    }
}