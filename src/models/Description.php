<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 15:00
 */

namespace valearkot\yii2module;


use yii\base\Model;

class Description extends Model
{
    public $url;
    public $description;

    public function rules()
    {
        return [
            [['url','description'],'require']
        ];
    }
    public function add(){
        $site = new Site();
        $site->url = $this->url;
        $site->description = $this->description;
        $site->save();
        return true;
    }

    public function update($id){
        $site = Site::findOne(['id'=>$id]);
        $site->url = $this->url;
        $site->description = $this->description;
        $site->update();
        return true;
    }
}