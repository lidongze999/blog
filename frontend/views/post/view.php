<?php

use frontend\widgets\hot\HotWidget;
use frontend\widgets\tag\TagWidget;



$this->title = $data['title'];
$this->params['breadcrumbs'][] = ['label' => '文章', 'url' => ['post/index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="row">
    <div class="col-lg-9">
        <div class="page-title">
            <h1><?= $data['title'] ?></h1>
            <a>作者：<?= $data['user_name'] ?></a>
            <span>发布：<?= date('Y-m-d', $data['created_at']) ?></span>
            <span>浏览：<?= isset($data['extend']['browser'])?$data['extend']['browser']:0?>次</span>
        </div>

        <div class="">
            <?= $data['content'] ?>
        </div>

        <div class="">

            <img src="<?= $data['label_img']?>" class="img-responsive img-thumbnail">

        </div>

        <div class="page-tag">
            标签：<?php foreach ($data['tags'] as $tag): ?>
                <span><a href="#"><?= $tag ?></a></span>
            <?php endforeach; ?>
        </div>
    </div>
    <div class="col-lg-3">
        <!-- 热门浏览 -->
        <?=HotWidget::widget()?>

    </div>
</div>