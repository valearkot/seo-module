<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\runtime\tmpextensions\mymodule\src\models\Site */

$this->title = 'Create new meta tags';
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_create_form', [
        'model' => $model,
        'language' => $language
    ]) ?>

</div>
