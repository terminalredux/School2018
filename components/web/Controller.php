<?php

namespace app\components\web;
use yii\web\Controller as YiiController;

class Controller extends YiiController
{
    use \app\components\traits\FlashMessage;
}