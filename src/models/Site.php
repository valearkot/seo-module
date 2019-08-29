<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 14:57
 */

namespace valearkot\yii2module\models;


use yii\db\ActiveRecord;

class Site extends ActiveRecord
{
    public static function tableName()
    {
        return 'site';
    }
}