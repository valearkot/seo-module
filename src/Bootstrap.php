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
    //A method that is called automatically with every request
    public function bootstrap($app)
    {
        //Routing rules
        $app->getUrlManager()->addRules([
            'test' => 'yii2module/test/index',
        ], false);
        //Add multilingualism
        $app->i18n->translations['valearkot/yii2-module/*'] = [
            'class' => 'yii\i18n\PhpMessageSource',
            'forceTranslation' => true,
            'basePath' => '@vendor/valearkot/yii2-module/src/language',
        ];

        $app->setModule('yii2module', 'valearkot\yii2module\Module');
    }
}