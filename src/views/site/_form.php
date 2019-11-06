<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="site-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url',[
        'template' => '{label}<div class="input-group">
        <span class="input-group-addon" id="basic-addon3">'.Url::base(true).'/</span>
       {input}
    </div>',
    ])->textInput(['class'=>'form-control']) ?>
    <?php foreach ($all_title as $key => $value):?>
        <?= $form->field($model, 'title['.$key.']')->textInput(['value'=>$value])->label() ?>
    <?php endforeach;?>
    <?php foreach ($all_keywords as $key => $value):?>
        <?= $form->field($model, 'title['.$key.']')->textInput(['value'=>$value])->label() ?>
    <?php endforeach;?>
    <?php foreach ($all_description as $key => $value):?>
        <?= $form->field($model, 'description['.$key.']')->textInput(['value'=>$value])->label() ?>
    <?php endforeach;?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
