<?php

use yii\db\Migration;

class m170402_083124_create_table_relty extends Migration
{
    public function up()
    {
        $this->createTable('realty', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'info' => $this->string(),
        ]);
    }

    public function down()
    {
        echo "m170402_083124_create_table_relty cannot be reverted.\n";
        $this->dropTable('realty');
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
