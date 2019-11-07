<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\runtime\tmpextensions\mymodule\src\models\SiteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create new meta tags', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            
            'url:ntext',
            [
                'label' => Yii::t('app', 'Title'),
                'value' =>  function (\valearkot\yii2module\models\Site $model){
                    return $model->titleText['message'];
                },
            ],
            [
                'label' => Yii::t('app', 'Keywords'),
                'value' =>  function (\valearkot\yii2module\models\Site $model){
                    return $model->keywordsText['message'];
                },
            ],
            [
                'label' => Yii::t('app', 'Description'),
                'value' =>  function (\valearkot\yii2module\models\Site $model){
                    return $model->descriptionText['message'];
                },
            ],
            ['class' => 'yii\grid\ActionColumn',
                'header' => 'Action',
                'template' => '{update} {delete}',
                'buttons' => [
                    'update' => function ($url, $model, $key) {
                        return Html::a('', $url, ['class' => 'glyphicon glyphicon-pencil']);
                    },
                    'delet' => function ($url, $model, $key) {
                        return Html::a('', $url, ['class' => 'glyphicon glyphicon-trash']);
                    }
                ],
            ],
        ],
    ]); ?>


</div>
