<?php

use yii\db\Migration;

class m170402_083132_create_table_favorites extends Migration
{
    public function up()
    {
        $this->createTable('favorites', [
            'id' => $this->primaryKey(),
            'userId' => $this->integer()->notNull(),
            'realtyId' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-favorites-realty',
            'favorites',
            'realtyId',
            'realty',
            'id',
            'CASCADE'
        );

        $this->addForeignKey(
            'fk-favorites-user',
            'favorites',
            'userId',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        echo "m170402_083132_create_table_favorites cannot be reverted.\n";

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
