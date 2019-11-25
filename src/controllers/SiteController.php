<?php

namespace valearkot\yii2module\controllers;

use valearkot\yii2module\models\Description;
use valearkot\yii2module\models\Message;
use valearkot\yii2module\models\SourceMessage;
use Yii;
use valearkot\yii2module\models\Site;
use valearkot\yii2module\models\SiteSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SiteController implements the CRUD actions for Site model.
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    
    public $layout = '@app/modules/admin/views/layouts/main.php';

    /**
     * Lists all Site models.
     * @return mixed
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/admin/default');
        }
        $searchModel = new SiteSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Site model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {   
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/admin/default');
        }
        $model = $this->findModel($id);
        $all_description = [];
        $source_message = SourceMessage::find()->where(['id' => $model['description']])->asArray()->one();

        if (!empty($source_message)) {
            $message = Message::find()->where(['id' => $model['description']])->asArray()->all();

            $all_description = !empty($message) ? ArrayHelper::map($message, 'language', 'translation') : [];
            $all_description[Yii::$app->sourceLanguage] = $source_message['message'];
        }
        return $this->render('view', [
            'model' => $this->findModel($id),
            'all_description' => $all_description
        ]);
    }

    /**
     * Creates a new Site model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/admin/default');
        }
        $params = Yii::$app->params;
        $language = $params['language'];
        $model = new Site();
        $description = new Description();

        if (Yii::$app->request->post()) {
            $description->attributes = Yii::$app->request->post('Site');
            if ($description->add()) {
                return $this->redirect('index');
            }
        }

        return $this->render('create', [
            'model' => $model,
            'language' => $language,
        ]);
    }

    /**
     * Updates an existing Site model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        if (Yii::$app->user->isGuest) {
            return $this->redirect('/admin/default');
        }
        $model = $this->findModel($id);
        $all_description = [];
        $all_title = [];
        $all_keywords = [];
        $source_message = SourceMessage::find()->where(['id' => $model['description']])->asArray()->one();
        $source_title = SourceMessage::find()->where(['id' => $model['title']])->asArray()->one();
        $source_keywords = SourceMessage::find()->where(['id' => $model['keywords']])->asArray()->one();

        if (!empty($source_message) && !empty($source_title) && !empty($source_keywords)) {
            $message = Message::find()->where(['id' => $model['description']])->asArray()->all();
            $title = Message::find()->where(['id' => $model['title']])->asArray()->all();
            $keywords = Message::find()->where(['id' => $model['keywords']])->asArray()->all();

            $all_description = !empty($message) ? ArrayHelper::map($message, 'language', 'translation') : [];
            $all_title = !empty($title) ? ArrayHelper::map($title, 'language', 'translation') : [];
            $all_keywords = !empty($title) ? ArrayHelper::map($keywords, 'language', 'translation') : [];
            $all_description[Yii::$app->sourceLanguage] = $source_message['message'];
            $all_title[Yii::$app->sourceLanguage] = $source_title['message'];
            $all_keywords[Yii::$app->sourceLanguage] = $source_keywords['message'];
        }

        $description = new Description();

        if (Yii::$app->request->post()) {
            $description->attributes = Yii::$app->request->post('Site');
            if ($description->update($id)) {
                return $this->redirect('index');
            }

        }

        return $this->render('update', [
            'model' => $model,
            'all_description' => $all_description,
            'all_title' => $all_title,
            'all_keywords' => $all_keywords,
        ]);
    }

    /**
     * Deletes an existing Site model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Site model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Site the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Site::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
