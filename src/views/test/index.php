<?php

?>
<button type="button" class="btn btn-info">Add Description</button>
<ul class="list-group">
    <?php use yii\helpers\Url;

    foreach ($model as $site):?>
    <a href="<?=Url::to(['update-description' , 'id' => $site['id']])?>"><li class="list-group-item"><?=$site['url']?></li></a>
    <?php endforeach;?>
</ul>

