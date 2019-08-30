<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:38
 */

namespace valearkot\yii2module;

use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'valearkot\yii2module\controllers';

    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    public function registerTranslations()
    {
        Yii::$app->i18n->translations['valearkot/yii2module/*'] = [
            'class'          => 'yii\i18n\PhpMessageSource',
            'sourceLanguage' => 'en',
            'basePath'       => '@vendor/valearkot/yii2module/language',

        ];
    }
    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t('valearkot/yii2module/' . $category, $message, $params, $language);
    }

}