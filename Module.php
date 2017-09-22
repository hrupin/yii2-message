<?php
namespace hrupin\message;

use yii\base\Module as BaseModule;

class Module extends BaseModule
{
    const VERSION = '0.0.1';
    public $modelMap = [];
    public $userModel;
    public $urlPrefix = 'message';
    public $debug = false;
    public $moderateReviews = true;

}