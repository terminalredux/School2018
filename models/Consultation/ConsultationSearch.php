<?php

namespace app\models\Consultation;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Consultation\Consultation;

/**
 * ConsultationSearch represents the model behind the search form about `app\models\Consultation\Consultation`.
 */
class ConsultationSearch extends Consultation
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'professor_id', 'room_id', 'begin', 'end', 'status', 'public', 'created_at', 'updated_at'], 'integer'],
            [['additional_info'], 'safe'],
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
        $query = Consultation::find();

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
            'professor_id' => $this->professor_id,
            'room_id' => $this->room_id,
            'begin' => $this->begin,
            'end' => $this->end,
            'status' => $this->status,
            'public' => $this->public,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'additional_info', $this->additional_info]);

        return $dataProvider;
    }
}
