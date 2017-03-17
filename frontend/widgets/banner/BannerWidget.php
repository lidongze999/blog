<?php

namespace frontend\widgets\banner;

use Yii;
use yii\base\Widget;

class BannerWidget extends Widget
{
    public $items = [];
    //获取数据
    public function init()
    {
        if (empty($this->items)) {
            $this->items = [
                [
                    'label' => 'demo',
                    'image_url' => \Yii::$app->params['upload_url']. '/blog/frontend/web/statics/images/banner/banner1.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                    'active' => 'active',
                ],
                [
                    'label' => 'demo',
                    'image_url' => \Yii::$app->params['upload_url'].'/blog/frontend/web/statics/images/banner/banner2.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                ],
                [
                    'label' => 'demo',
                    'image_url' => \Yii::$app->params['upload_url'].'/blog/frontend/web/statics/images/banner/banner3.jpg',
                    'url' => ['site/index'],
                    'html' => '',
                ],
            ];
        }
    }
    //运行
    public function run()
    {
        $data['items'] = $this->items;

        return $this->render('index', ['data' => $data]);
    }
}