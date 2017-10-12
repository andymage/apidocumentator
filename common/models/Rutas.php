<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "rutas".
 *
 * @property integer $id
 * @property integer $id_proyecto
 * @property string $nombre
 * @property string $url
 * @property string $descripcion
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Requests[] $requests
 * @property Proyectos $idProyecto
 */
class Rutas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'rutas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_proyecto'], 'required'],
            [['id_proyecto'], 'integer'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['nombre', 'url', 'descripcion'], 'string', 'max' => 255],
            [['id_proyecto'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::className(), 'targetAttribute' => ['id_proyecto' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proyecto' => 'Id Proyecto',
            'nombre' => 'Nombre',
            'url' => 'Url',
            'descripcion' => 'Descripcion',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequests()
    {
        return $this->hasMany(Requests::className(), ['id_ruta' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProyecto()
    {
        return $this->hasOne(Proyectos::className(), ['id' => 'id_proyecto']);
    }
}
