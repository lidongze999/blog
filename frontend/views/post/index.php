<?php

use frontend\widgets\post\PostWidget;
use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;
?>
<div class="row">
    <div class="col-lg-9">
        <?=PostWidget::widget()?>
    </div>
    <div class="col-lg-3">
        <div class="create-post">
            <a href="http://localhost:8888/blog/frontend/web/post/create" class="btn btn-primary">创建文章</a>
        </div>
        <!-- 热门浏览 -->
        <?=HotWidget::widget()?>
        <!-- 标签云组件 -->
        <?= TagWidget::widget() ?>
    </div>
</div>
