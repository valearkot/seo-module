<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property int $id
 * @property string $url
 * @property string $description
 */
class Site extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['url', 'description'], 'required'],
            [['url', 'description'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Url',
            'description' => 'Description',
        ];
    }
}
