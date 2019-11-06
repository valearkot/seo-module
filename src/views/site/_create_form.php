<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textInput() ?>
    <?php foreach ($language as $lang):?>
    <label>For <?=$lang?></label>
        <?= $form->field($model, 'title['.$lang.']')->textInput()->label() ?>
        <?= $form->field($model, 'keywords['.$lang.']')->textInput()->label() ?>
        <?= $form->field($model, 'description['.$lang.']')->textarea(['rows' => 6])->label() ?>
    <?php endforeach;?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
