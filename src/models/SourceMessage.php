<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 02.09.2019
 * Time: 14:36
 */

namespace valearkot\yii2module\models;


use yii\db\ActiveRecord;

class SourceMessage extends ActiveRecord
{
    public static function tableName()
    {
        return 'source_message'; 
    }
}