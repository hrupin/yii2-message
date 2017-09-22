<?php

namespace hrupin\message\widgets;

use hrupin\message\models\Message;
use Yii;
use yii\base\Widget;
use yii\base\InvalidConfigException;
/**
 * Class Reviews
 *
 * @package hrupin\reviews\widgets
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
            $this->theme = '';
        }

        if($this->name === null){
            $this->name = '';
        }

        if($this->email === null){
            $this->email = '';
        }

        if($this->phone === null){
            $this->phone = '';
        }

    }
    /**
     * Executes the widget.
     *
     * @return string the result of widget execution to be outputted
     */
    public function run()
    {
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
}
