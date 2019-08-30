<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:38
 */

namespace valearkot\yii2module;

use Yii;
use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    public $controllerNamespace = 'valearkot\yii2module\controllers';

    public static function t($category, $message, $params = [], $language = null)
    {
        return Yii::t( $category, $message, $params, $language);
    }

}