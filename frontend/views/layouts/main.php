<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::t('common', 'MyLookBook'),
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    $leftMenus = [
        ['label' => '首页', 'url' => ['/site/index']],
        ['label' => '文章', 'url' => ['/post/index']],
        ['label' => '探索', 'url' => ['/explore/index']],
    ];
    //如果是游客 显示登录注册
    if (Yii::$app->user->isGuest) {
        $rightMenus[] = ['label'=>Yii::t('common', 'Signup'), 'url' => ['/site/signup']];
        $rightMenus[] = ['label'=>Yii::t('common', 'Login'), 'url' => ['/site/login']];
    } else {
        //如果已经登录 显示头像
        $rightMenus[] = [
            'label' =>'<img src="'.Yii::$app->user->identity->avatar.'"'.Yii::$app->params['avatar']['small'].'" alt="'.Yii::$app->user->identity->username.'">',
            'linkOptions' => ['class'=>'avatar'],
            'items' => [
                ['label'=>'<i class="fa fa-sign-out"></i> 退出',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']],
                ['label'=>'<i class="fa fa-sign-in"></i> 个人中心',
                'url' => ['/site/logout'],
                'linkOptions' => ['data-method' => 'post']]
            ]
        ];
//        $rightMenus[] = '<li>'
//            . Html::beginForm(['/site/logout'], 'post')
//            . Html::submitButton(
//                '<img src="'.\yii\helpers\Url::to("@web/statics/images/avatar/small.jpg",true).'" class="avatar">'.Yii::t('common','退出').' (' . Yii::$app->user->identity->username . ')',
//                ['class' => 'btn btn-link logout']
//            )
//            . Html::endForm()
//            . '</li>';

    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-left'],
        'items' => $leftMenus,
    ]);


    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' =>false,
        'items' => $rightMenus,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
