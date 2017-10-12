<?php

use yii\db\Migration;

class m171012_221932_rutas extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%rutas}}', [
            'id' => $this->primaryKey(),
            'id_proyecto' => $this->integer()->notNull(),
            'nombre' => $this->string(),
            'url' => $this->string(),
            'descripcion' => $this->string(),
            'fecha_alta' => $this->dateTime(),
            'fecha_actualizacion' => $this->dateTime(),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%rutas}}');
    }
}
