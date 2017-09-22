<?php

namespace hrupin\message;

use yii\web\AssetBundle;
/**
 * Class MessageAsset
 *
 * @package hrupin\message
 */
class WidgetsMessageAsset extends AssetBundle
{
    /**
     * @inheritdoc
     */
    public $sourcePath = '@vendor/hrupin/yii2-message/assets';

    /**
     * @inheritdoc
     */
    public $js = [
        'js/message.js'
    ];

    /**
     * @inheritdoc
     */
    public $css = [
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