<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 02.09.2019
 * Time: 14:37
 */

namespace valearkot\yii2module\models;


use yii\db\ActiveRecord;

class Message extends ActiveRecord
{
    public static function tableName()
    {
        return 'message'; 
    }
}