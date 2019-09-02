<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Site */

$this->title = 'Create Site';
$this->params['breadcrumbs'][] = ['label' => 'Sites', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_create_form', [
        'model' => $model,
        'all_description' => $all_description
    ]) ?>

</div>
