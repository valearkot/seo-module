<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<h1><?= $site['url'] ?></h1>

<?= $form->field($model, 'description')->textarea(['value' => $site['description']]); ?>

<?= Html::submitButton('Change', ['class' => 'btn btn-primary']) ?><br>
<a class="btn btn-primary" href="<?= Url::to(['delete', 'id' => $site['id']]) ?>">Delete</a>

<?php ActiveForm::end(); ?>
