<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\runtime\tmpextensions\mymodule\src\models\Site */

$this->title = 'Update meta tags: ' . trim($model->url,'/');
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="site-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'all_description' => $all_description,
        'all_title' => $all_title,
        'all_keywords' => $all_keywords,
    ]) ?>

</div>
