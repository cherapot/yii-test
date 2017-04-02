<?php

use yii\db\Migration;

class m170402_083102_create_table_user extends Migration
{
    public function up()
    {
    	$this->createTable('user', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull(),
            'email' => $this->string(),
        ]);

    }

    public function down()
    {
        echo "m170402_083102_create_table_user cannot be reverted.\n";
        $this->dropTable('post');
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
