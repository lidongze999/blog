<?php

namespace frontend\widgets\chat;

use frontend\models\FeedForm;
use Yii;
use yii\base\Widget;

/**
 *留言板组件
 * @package frontend\widgets\banner
 */
class ChatWidget extends Widget
{
    public $items = [];

    public function init()
    {

    }

    public function run()
    {
        $feed = new FeedForm();
        $data['feed'] = $feed->getList();
        return $this->render('index', ['data' => $data]);
    }
}