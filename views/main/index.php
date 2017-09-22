<?php

use yii\bootstrap\Tabs;

/* @var $this yii\web\View */
/* @var $all hrupin\message\models\Message */
/* @var $new hrupin\message\models\Message */
/* @var $read hrupin\message\models\Message */

echo Tabs::widget([
    'items' => [
        [
            'label' => Yii::t('message', 'All messages'),
            'content' => $this->render('_messages', ['model' => $all, 'title' => Yii::t('message', 'All messages')]),
            'active' => true
        ],
        [
            'label' => Yii::t('message', 'New messages'),
            'content' => $this->render('_messages', ['model' => $new, 'title' => Yii::t('message', 'New messages')]),
        ],
        [
            'label' => Yii::t('message', 'Read messages'),
            'content' => $this->render('_messages', ['model' => $read, 'title' => Yii::t('message', 'Read messages')]),
        ],
    ],
]);

?>

