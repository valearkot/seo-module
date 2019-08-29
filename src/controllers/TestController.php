<?php
/**
 * Created by PhpStorm.
 * User: laptop
 * Date: 29.08.2019
 * Time: 13:17
 */

namespace valearkot\yii2module\controllers;



use valearkot\yii2module\models\Description;
use valearkot\yii2module\models\Site;
use Yii;
use yii\web\Controller;

class TestController extends Controller
{
    public function actionIndex(){
        $model = Site::find()->all();
        return $this->render('index',['model'=>$model]);
    }

    public function actionAddDescription(){
        $model = new Description();
        if (Yii::$app->request->post('Description')) {
            $model->attributes = Yii::$app->request->post('Description');
            if ($model->add()) {
                return $this->redirect(['yii2model/index']);
            }
        }
        return $this->render('add_description',['model' => $model]);
    }

    public function actionUpdateDescription($id){
        $site = Site::findOne(['id'=>$id]);
        $model = new Description();
        if (Yii::$app->request->post('Description')) {
            $model->attributes = Yii::$app->request->post('Description');
            if ($model->update($id)) {
                return $this->redirect(['yii2model/index']);
            }
        }
        return $this->render('update_description',['model' => $model, 'site' => $site]);
    }

    public function actionDelete($id){
        $site = Site::findOne(['id'=>$id]);
        $site->delete();
        return $this->redirect('index');
    }
}