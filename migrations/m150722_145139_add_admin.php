<?php

use yii\db\Schema;
use yii\db\Migration;

class m150722_145139_add_admin extends Migration
{
    public function up()
    {
        $this->insert('User',[
            'name'=>'Rustam',
            'surname'=>'Habibullin',
            'login'=>'admin',
            'password'=>'admin']);
    }

    public function down()
    {
        
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
