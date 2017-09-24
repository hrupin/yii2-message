<?php

namespace hrupin\message\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Message]].
 *
 * @see Message
 */
class MessageQuery extends ActiveQuery
{

    public function getAllMessages($id){
        return $this->andWhere(['OR', 'sender = '.$id, 'recipient = '.$id])
            ->andWhere(['parent_id' => 0])
            ->orderBy(['status_recipient' => SORT_DESC, 'status_sender' => SORT_DESC, 'id' => SORT_DESC]);
    }

    public function getNewMessages($id){
        return $this->andWhere([
            'OR',
            [
                'sender' => $id,
                'status_sender' => Message::MESSAGE_NOT_READ
            ],
            [
                'recipient' => $id,
                'status_recipient' => Message::MESSAGE_NOT_READ
            ]
        ])->andWhere(['parent_id' => 0]);
    }

    public function getReadMessages($id){
        return $this->andWhere([
            'OR',
            [
                'sender' => $id,
                'status_sender' => Message::MESSAGE_READ
            ],
            [
                'recipient' => $id,
                'status_recipient' => Message::MESSAGE_READ
            ]
        ])->andWhere(['parent_id' => 0]);
    }

    /**
     * @inheritdoc
     * @return Message[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Message|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}