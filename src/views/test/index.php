<?php

use valearkot\yii2module\Module;
use yii\helpers\Url;
?>
<h2><?=Module::t('test', 'Test')?></h2>
<a href="<?=Url::to(['add-description'])?>" class="btn btn-info"><?=Module::t('test', 'Add Description')?></a>
<ul class="list-group">
    <?php

    foreach ($model as $site):?>
    <a href="<?=Url::to(['update-description' , 'id' => $site['id']])?>"><li class="list-group-item"><?=$site['url']?></li></a>
    <?php endforeach;?>
</ul>

