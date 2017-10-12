<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Rutas[] $rutas
 */
class Proyectos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRutas()
    {
        return $this->hasMany(Rutas::className(), ['id_proyecto' => 'id']);
    }
}
