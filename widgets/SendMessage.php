<?php

namespace hrupin\message\widgets;

use Yii;
use yii\base\Widget;
use hrupin\message\WidgetsMessageAsset;
use hrupin\message\models\Message;
use yii\base\InvalidConfigException;

/**
 * Class Message
 *
 * @package hrupin\message\widgets
 */
class SendMessage extends Widget
{
    /**
     * @var integer
     */
    public $idRecipient;

    /**
     * @var integer
     */
    public $idSender;

    /**
     * @var string
     */
    public $theme;

    /**
     * @var string
     */
    public $name;

    /**
     * @var string
     */
    public $email;

    /**
     * @var string
     */
    public $phone;

    /**
     * Initializes the widget params.
     */
    public function init()
    {
        parent::init();
        if ($this->idRecipient === null) {
            throw new InvalidConfigException(Yii::t('reviews', 'The "idRecipient" property must be set.'));
        }

        if($this->idSender === null){
            $this->idSender = 0;
        }

        if($this->theme === null){
            $this->theme = Yii::t('message', 'No theme');
        }

        if($this->name === null){
            $this->name = Yii::t('message', 'No name');
        }

        if($this->email === null){
            $this->email = Yii::t('message', 'No email');
        }

        if($this->phone === null){
            $this->phone = Yii::t('message', 'No phone');
        }

    }
    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted
     */
    public function run()
    {
        $this->registerAssets();
        $class = Yii::$app->getModule('message')->modelMap['Message'];
        $model = Yii::createObject($class::className());
        $model->sender = $this->idSender;
        $model->recipient = $this->idRecipient;
        $model->theme = $this->theme;
        $model->name = $this->name;
        $model->email = $this->email;
        $model->phone = $this->phone;
        $model->parent_id = 0;
        $model->children = 0;
        $model->status_sender = Message::MESSAGE_READ;
        $model->status_recipient = Message::MESSAGE_NOT_READ;
        return $this->render('sendMessage',[
            'model' => $model
        ]);
    }

    /**
     * Register assets.
     */
    protected function registerAssets()
    {
        $view = $this->getView();
        $bundle = WidgetsMessageAsset::register($view);
    }
}
