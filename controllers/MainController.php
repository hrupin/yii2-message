<?php

namespace hrupin\message\controllers;

use hrupin\message\models\Message;
use Yii;
use yii\base\Controller;

class MainController extends Controller
{

    public function actionIndex(){
        if(!Yii::$app->user->isGuest){
            $class = Yii::$app->getModule('message')->modelMap['Message'];
            $model = Yii::createObject($class::className());
            $allMessage = $model->find()->getAllMessages(Yii::$app->user->id)->all();
            $newMessage = $model->find()->getNewMessages(Yii::$app->user->id)->all();
            $readMessage = $model->find()->getReadMessages(Yii::$app->user->id)->all();
        }
        else{
            return $this->render('error');
        }
        return $this->render('index', [
            'all' => $allMessage,
            'new' => $newMessage,
            'read' => $readMessage
        ]);
    }

    public function actionCorrespondence(){
        $class = Yii::$app->getModule('message')->modelMap['Message'];
        $model = Yii::createObject($class::className());
        $message = $model->find()->where([
            'id' => Yii::$app->request->get('id')
        ])->limit(1)->one();
        $model->sender = Yii::$app->user->id;
        $model->recipient = $message->sender;
        $model->theme = $message->theme;
        $model->parent_id = $message->id;
        $model->status_sender = Message::MESSAGE_READ;
        $model->status_recipient = Message::MESSAGE_NOT_READ;

        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->save()){

            }
        }


        return $this->render('correspondence', [
            'message' => $message,
            'model' => $model
        ]);
    }

    public function actionSend(){
        $class = Yii::$app->getModule('message')->modelMap['Message'];
        $model = Yii::createObject($class::className());
        if(Yii::$app->request->isPost){
            if($model->load(Yii::$app->request->post()) && $model->save()){
                return '<div class="alert alert-success" role="alert">'.Yii::t('message', 'Message send').'</div>';
            }
        }
        return '<div class="alert alert-danger" role="alert">'.Yii::t('message', 'Message not send').'</div>';
    }
}