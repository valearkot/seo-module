<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:57
 */

namespace valearkot\yii2module;


use Yii;
use yii\base\BootstrapInterface;
class Bootstrap implements BootstrapInterface{
    //Метод, который вызывается автоматически при каждом запросе
    public function bootstrap($app)
    {
        //Правила маршрутизации
        $app->getUrlManager()->addRules([
            'test' => 'yii2module/test/index',
        ], false);
        /*
         * Регистрация модуля в приложении
         * (вместо указания в файле frontend/config/main.php
         */
        $app->setModule('yii2module', 'valearkot\yii2module\Module');
    }
}