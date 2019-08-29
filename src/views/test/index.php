<?php
use yii\helpers\Url;
?>
<a href="<?=Url::to(['add-description'])?>" class="btn btn-info">Add Description</a>
<ul class="list-group">
    <?php

    foreach ($model as $site):?>
    <a href="<?=Url::to(['update-description' , 'id' => $site['id']])?>"><li class="list-group-item"><?=$site['url']?></li></a>
    <?php endforeach;?>
</ul>

