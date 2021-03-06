<?php

namespace hrupin\message;

use yii\web\AssetBundle;
/**
 * Class MessageAsset
 *
 * @package hrupin\message
 */
class MessageAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/hrupin/yii2-message/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/bootstrap-table.js',
        'js//jquery.timeago.js',
        'js/app.js'
    ];

    /**
     * @inheritdoc
     */
    public $css = [
        'css/bootstrap-table.css',
        'css/message.css'
    ];

    /**
     * @inheritdoc
     */
    public $depends = [
        'yii\web\JqueryAsset',
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
        'yii\bootstrap\BootstrapPluginAsset'
    ];
}