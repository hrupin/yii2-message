<?php

namespace hrupin\message\models;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $sender
 * @property integer $recipient
 * @property integer $status_sender
 * @property integer $status_recipient
 * @property integer $parent_id
 * @property integer $children
 * @property string $theme
 * @property string $name
 * @property string $email
 * @property string $phone
 * @property string $text
 * @property integer $created_at
 * @property integer $updated_at
 */
class Message extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sender', 'recipient', 'status_sender', 'status_recipient', 'parent_id', 'children', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['theme', 'name'], 'string', 'max' => 500],
            [['email', 'phone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sender' => 'Sender',
            'recipient' => 'Recipient',
            'status_sender' => 'Status Sender',
            'status_recipient' => 'Status Recipient',
            'parent_id' => 'Parent ID',
            'children' => 'Children',
            'theme' => 'Theme',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'text' => 'Text',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}