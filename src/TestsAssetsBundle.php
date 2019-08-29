<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:35
 */

namespace valearkot\yii2module;

use yii\web\AssetBundle;
class TestsAssetsBundle extends AssetBundle
{
    public $sourcePath = '@vendor/valearkot/yii2-module/assets';
    public $css = [
        'css/style.css'
    ];
}