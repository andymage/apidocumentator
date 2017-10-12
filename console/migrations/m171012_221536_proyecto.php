<?php

use yii\db\Migration;

class m171012_221536_proyecto extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%proyectos}}', [
            'id' => $this->primaryKey(),
            'nombre' => $this->string(),
            'fecha_alta' => $this->dateTime(),
            'fecha_actualizacion' => $this->dateTime(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%proyectos}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171012_221536_proyecto cannot be reverted.\n";

        return false;
    }
    */
}
