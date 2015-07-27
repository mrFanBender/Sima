<?php

use yii\db\Schema;
use yii\db\Migration;

class m150722_142731_changes extends Migration
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
    }

    public function down()
    {
        echo "m150722_142731_changes cannot be reverted.\n";

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
