<?php

namespace valearkot\yii2module\models;

use Yii;

/**
 * This is the model class for table "site".
 *
 * @property int $id
 * @property string $url
 * @property int $title
 * @property int $keywords
 *@property int $description
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
            [['url', 'title', 'keywords', 'description'], 'required'],
            [['url'], 'string'],
            [[ 'title', 'keywords', 'description'], 'integer'],
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
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
        ];
    }
}
