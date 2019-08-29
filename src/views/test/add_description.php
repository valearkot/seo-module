<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

$form = ActiveForm::begin();
?>

<?=$form->field($model,'url')->textInput();?>
<?=$form->field($model,'description')->textarea();?>

<?= Html::submitButton('Send', ['class' => 'btn btn-primary']) ?>

<?php ActiveForm::end();?>
