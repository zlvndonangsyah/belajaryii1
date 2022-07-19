<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pembeli;

/**
 * PembeliSearch represents the model behind the search form of `app\models\Pembeli`.
 */
class PembeliSearch extends Pembeli
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pembeli', 'kode_pos'], 'integer'],
            [['nama', 'jk', 'alamat', 'kota', 'tgl_lahir'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Pembeli::find();

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
            'id_pembeli' => $this->id_pembeli,
            'kode_pos' => $this->kode_pos,
            'tgl_lahir' => $this->tgl_lahir,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'kota', $this->kota]);

        return $dataProvider;
    }
}
