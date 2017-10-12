<?php

use yii\db\Migration;

class m171012_223901_foreignkeys extends Migration
{
    public function safeUp()
    {
        $this->createIndex(
            'idx-id_proyecto',
            'rutas',
            'id_proyecto'
        );

        $this->addForeignKey(
            'fk-id_proyecto',
            'rutas',
            'id_proyecto',
            'proyectos',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex(
            'idx-id_ruta',
            'requests',
            'id_ruta'
        );

        $this->addForeignKey(
            'fk-id_ruta',
            'requests',
            'id_ruta',
            'rutas',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    public function safeDown()
    {
        $this->dropForeignKey('fk-id_ruta');
        $this->dropForeignKey('fk-id_proyecto');
        $this->dropIndex('idx-id_proyecto');
        $this->dropIndex('idx-id_ruta');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m171012_223901_foreignkeys cannot be reverted.\n";

        return false;
    }
    */
}
