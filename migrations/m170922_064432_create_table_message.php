<?php

use yii\db\Migration;

class m170922_064432_create_table_message extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'sender' => $this->integer()->notNull()->defaultValue(0),
            'recipient' => $this->integer()->notNull()->defaultValue(0),
            'status_sender' => $this->integer(1)->notNull()->defaultValue(0),
            'status_recipient' => $this->integer(1)->notNull()->defaultValue(0),
            'parent_id' => $this->integer(12)->notNull()->defaultValue(0),
            'children' => $this->integer(1)->notNull()->defaultValue(0),
            'theme' => $this->string(500)->notNull()->defaultValue('No theme'),
            'name' => $this->string(500)->notNull()->defaultValue('Anonymous'),
            'email' => $this->string(50)->notNull()->defaultValue('No email'),
            'phone' => $this->string(50)->notNull()->defaultValue('No phone'),
            'text' => $this->text(),
            'created_at' => $this->integer(12)->notNull()->defaultValue(0),
            'updated_at' => $this->integer(12)->notNull()->defaultValue(0)
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%message}}');
    }
}
