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
    public $description;

    public function rules()
    {
        return [
            [['url', 'description'], 'required']
        ];
    }
    //add new description and url
    public function add()
    {
        $site = new Site();
        $source_message = new SourceMessage();
        //Chek site source language and save
        if (array_key_exists(Yii::$app->sourceLanguage, $this->description)) {
            if ($this->description[Yii::$app->sourceLanguage] != null) {
                $source_message->category = 'app';
                $source_message->message = $this->description[Yii::$app->sourceLanguage];
                $source_message->save();
                $id_message = Yii::$app->db->getLastInsertID();
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
        $site->description =$id_message ;
        $site->url = $this->url;
        $site->save();
        return true;
    }
    //update description for url
    public function update($id)
    {
        $site = Site::findOne(['id' => $id]);
        $source_message = SourceMessage::findOne(['id'=>$site->description]);
        //Update information for text in source language
        if (array_key_exists(Yii::$app->sourceLanguage, $this->description)) {
            if ($this->description[Yii::$app->sourceLanguage] != null) {
                $source_message->category = 'app';
                $source_message->message = $this->description[Yii::$app->sourceLanguage];
                $source_message->update();
            }

        }

        //Update text for translit
        foreach ($this->description as $key => $value) {
            if ($key != Yii::$app->sourceLanguage && $value != null) {
                $message = Message::findOne(['id' => $site->description, 'language' => $key]);
                $message->id = $id_message;
                $message->language = $key;
                $message->translation = $value;
                $message->update();
            }
        }


        $site->url = $this->url ;
        $site->save();
        return true;
    }
}