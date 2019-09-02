<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>
    <?php foreach ($language as $lang):?>
        <?= $form->field($model, 'description['.$lang.']')->textarea(['rows' => 6])->label($lang) ?>
    <?php endforeach;?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
