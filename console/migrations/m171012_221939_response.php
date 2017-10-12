<?php

use yii\db\Migration;

class m171012_221939_response extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%requests}}', [
            'id' => $this->primaryKey(),
            'id_ruta' => $this->integer()->notNull(),
            'status' => $this->integer(),
            'tipo' => $this->integer(),
            'headers' => $this->text(),
            'body' => $this->text(),
            'fecha_alta' => $this->dateTime(),
            'fecha_actualizacion' => $this->dateTime(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%requests}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171012_221939_response cannot be reverted.\n";

        return false;
    }
    */
}
