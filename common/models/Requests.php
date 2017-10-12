<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property integer $id
 * @property integer $id_ruta
 * @property integer $status
 * @property integer $tipo
 * @property string $headers
 * @property string $body
 * @property string $fecha_alta
 * @property string $fecha_actualizacion
 *
 * @property Rutas $idRuta
 */
class Requests extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_ruta'], 'required'],
            [['id_ruta', 'status', 'tipo'], 'integer'],
            [['headers', 'body'], 'string'],
            [['fecha_alta', 'fecha_actualizacion'], 'safe'],
            [['id_ruta'], 'exist', 'skipOnError' => true, 'targetClass' => Rutas::className(), 'targetAttribute' => ['id_ruta' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_ruta' => 'Id Ruta',
            'status' => 'Status',
            'tipo' => 'Tipo',
            'headers' => 'Headers',
            'body' => 'Body',
            'fecha_alta' => 'Fecha Alta',
            'fecha_actualizacion' => 'Fecha Actualizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuta()
    {
        return $this->hasOne(Rutas::className(), ['id' => 'id_ruta']);
    }
}
