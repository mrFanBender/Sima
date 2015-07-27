<?php

use yii\db\Schema;
use yii\db\Migration;

class m150722_142946_change2 extends Migration
{
    public function up()
    {
        $this->createTable('User', [
            'id' => 'pk',
            'name' => 'string' . ' NOT NULL',
            'surname' => Schema::TYPE_STRING . ' NOT NULL',
            'login' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
        ]);

        $this->createTable('Post', [
            'id' => 'pk',
            'author_id' => 'string' . ' NOT NULL',
            'text' => 'text',
            'date' => 'date' . ' NOT NULL',
        ]);
        $this->addForeignKey('user_key', 'Post', 'author_id', 'User', 'id');
    }

    public function down()
    {
         $this->dropTable('User');
         $this->dropTable('Post');
        return false;
    }
    
    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }
    
    public function safeDown()
    {
    }
    */
}
