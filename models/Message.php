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

    const MESSAGE_NOT_READ = 1;
    const MESSAGE_READ = 2;
    const MESSAGE_DELETE = 3;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $this->updated_at = time();
            return true;
        }
        return false;
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'phone', 'theme', 'text'], 'required'],
            [['sender', 'recipient', 'status_sender', 'status_recipient', 'parent_id', 'children', 'created_at', 'updated_at'], 'integer'],
            [['text'], 'string'],
            [['theme', 'name'], 'string', 'max' => 500],
            [['email', 'phone'], 'string', 'max' => 50],
            ['created_at', 'default', 'value' => time()],
            ['updated_at', 'default', 'value' => time()],
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

    public function getParent()
    {
        return $this->hasOne(self::className(), ['id' => 'parent_id']);
    }

    public function getChildren()
    {
        return $this->hasMany(self::className(), ['parent_id' => 'id']);
    }

    public function getDate()
    {
        return date('d.m.Y', $this->updated_at);
    }

    /**
     * @inheritdoc
     * @return MessageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MessageQuery(get_called_class());
    }

}