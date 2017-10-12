<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Requests;

/**
 * RequestsSearch represents the model behind the search form about `common\models\Requests`.
 */
class RequestsSearch extends Requests
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ruta', 'status', 'tipo'], 'integer'],
            [['headers', 'body', 'fecha_alta', 'fecha_actualizacion'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Requests::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_ruta' => $this->id_ruta,
            'status' => $this->status,
            'tipo' => $this->tipo,
            'fecha_alta' => $this->fecha_alta,
            'fecha_actualizacion' => $this->fecha_actualizacion,
        ]);

        $query->andFilterWhere(['like', 'headers', $this->headers])
            ->andFilterWhere(['like', 'body', $this->body]);

        return $dataProvider;
    }
}
