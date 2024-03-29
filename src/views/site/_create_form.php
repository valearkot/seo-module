<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>

<div class="site-form">


    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'url',[
        'template' => '{label}<div class="input-group">
        <span class="input-group-addon" id="basic-addon3">'.Url::base(true).'</span>
       {input}
    </div>',
    ])->textInput(['class'=>'form-control']) ?>
    <?php foreach ($language as $lang):?>
    <?php if (count($language) != 1):?>
    <label>For <?=$lang?></label>
    <?php endif;?>
        <?= $form->field($model, 'title['.$lang.']')->textInput()->label() ?>
        <?= $form->field($model, 'keywords['.$lang.']')->textInput()->label() ?>
        <?= $form->field($model, 'description['.$lang.']')->textInput()->label() ?>
    <?php endforeach;?>


    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php
$js = <<<SCRIPT

$(function () { 
    $("[data-toggle='tooltip']").tooltip(); 
});;

$(function () { 
    $("[data-toggle='popover']").popover(); 
});
SCRIPT;
// Register tooltip/popover initialization javascript
$this->registerJs($js);
?>
