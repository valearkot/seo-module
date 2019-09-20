<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 15:00
 */

namespace valearkot\yii2module\models;


use yii\base\Model;
use Yii;

class Description extends Model
{
    public $url;
    public $title;
    public $keywords;
    public $description;

    public function rules()
    {
        return [
            [['url', 'title', 'keywords',  'description'], 'required']
        ];
    }

    /**
     * add new description and url
     * @return bool
     */
    public function add()
    {
        $site = new Site();
        //Chek site source language and save title
        if (array_key_exists(Yii::$app->sourceLanguage, $this->title)) {
            if ($this->title[Yii::$app->sourceLanguage] != null) {
                $source_message = new SourceMessage();
                $source_message->category = 'app';
                $source_message->message = $this->title[Yii::$app->sourceLanguage];
                $source_message->save();
                $id_title = $source_message->id;
            }
        }
        //Save title in other language
        foreach ($this->title as $key => $value) {
            if ($key != Yii::$app->sourceLanguage && $value != null) {
                $message = new Message();
                $message->id = $id_title;
                $message->language = $key;
                $message->translation = $value;
                $message->save();
            }
        }

        //Chek site source language and save keywords
        if (array_key_exists(Yii::$app->sourceLanguage, $this->keywords)) {
            if ($this->keywords[Yii::$app->sourceLanguage] != null) {
                $source_message = new SourceMessage();
                $source_message->category = 'app';
                $source_message->message = $this->keywords[Yii::$app->sourceLanguage];
                $source_message->save();
                $id_keywords = $source_message->id;
            }
        }
        //Save keywords in other language
        foreach ($this->keywords as $key => $value) {
            if ($key != Yii::$app->sourceLanguage && $value != null) {
                $message = new Message();
                $message->id = $id_keywords;
                $message->language = $key;
                $message->translation = $value;
                $message->save();
            }
        }

        //Chek site source language and save description
        if (array_key_exists(Yii::$app->sourceLanguage, $this->description)) {
            if ($this->description[Yii::$app->sourceLanguage] != null) {
                $source_message = new SourceMessage();
                $source_message->category = 'app';
                $source_message->message = $this->description[Yii::$app->sourceLanguage];
                $source_message->save();
                $id_message = $source_message->id;
            }
        }
        //Save descritption in other language
        foreach ($this->description as $key => $value) {
            if ($key != Yii::$app->sourceLanguage && $value != null) {
                $message = new Message();
                $message->id = $id_message;
                $message->language = $key;
                $message->translation = $value;
                $message->save();
            }
        }

        //Save information for site
        $site->title =$id_title;
        $site->keywords =$id_keywords;
        $site->description =$id_message;
        $site->url = $this->url;
        $site->save();
        return true;
    }

    /**
     * update description  and title for url
     * @param $id
     * @return bool
     */
    public function update($id)
    {
        $site = Site::findOne(['id' => $id]);
        $source_message = SourceMessage::findOne(['id'=>$site->description]);
        $source_title = SourceMessage::findOne(['id'=>$site->title]);

        //Update information for title in source language
        if (array_key_exists(Yii::$app->sourceLanguage, $this->title)) {
            if ($this->title[Yii::$app->sourceLanguage] != null) {
                $source_title->category = 'app';
                $source_title->message = $this->title[Yii::$app->sourceLanguage];
                $source_title->update();
            }
            //Update title for translit
            foreach ($this->title as $key => $value) {
                if ($key != Yii::$app->sourceLanguage && $value != null) {
                    $message = Message::findOne(['id' => $site->title, 'language' => $key]);
                    $message->translation = $value;
                    $message->update();
                }
            }

        }

        //Update information for keywords in source language
        if (array_key_exists(Yii::$app->sourceLanguage, $this->keywords)) {
            if ($this->keywords[Yii::$app->sourceLanguage] != null) {
                $source_title->category = 'app';
                $source_title->message = $this->keywords[Yii::$app->sourceLanguage];
                $source_title->update();
            }
            //Update keywords for translit
            foreach ($this->keywords as $key => $value) {
                if ($key != Yii::$app->sourceLanguage && $value != null) {
                    $message = Message::findOne(['id' => $site->keywords, 'language' => $key]);
                    $message->translation = $value;
                    $message->update();
                }
            }

        }

        //Update information for text in source language
        if (array_key_exists(Yii::$app->sourceLanguage, $this->description)) {
            if ($this->description[Yii::$app->sourceLanguage] != null) {
                $source_message->category = 'app';
                $source_message->message = $this->description[Yii::$app->sourceLanguage];
                $source_message->update();
            }
            //Update text for translit
            foreach ($this->description as $key => $value) {
                if ($key != Yii::$app->sourceLanguage && $value != null) {
                    $message = Message::findOne(['id' => $site->description, 'language' => $key]);
                    $message->translation = $value;
                    $message->update();
                }
            }

        }

        $site->url = $this->url ;
        $site->save();
        return true;
    }
}