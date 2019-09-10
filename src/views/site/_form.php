<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url')->textarea(['rows' => 6]) ?>
    <?php foreach ($all_title as $key => $value):?>
        <?= $form->field($model, 'title['.$key.']')->textarea(['rows' => 6,'value'=>$value])->label($key) ?>
    <?php endforeach;?>
    <?php foreach ($all_description as $key => $value):?>
        <?= $form->field($model, 'description['.$key.']')->textarea(['rows' => 6,'value'=>$value])->label($key) ?>
    <?php endforeach;?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
