<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:17
 */

namespace valearkot\yii2module\controllers;


use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        return $this->render('index');
    }
}