<?php

namespace app\models\AcademicTitle;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\AcademicTitle\AcademicTitle;

/**
 * AcademicTitleSearch represents the model behind the search form about `app\models\AcademicTitle\AcademicTitle`.
 */
class AcademicTitleSearch extends AcademicTitle
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order', 'status', 'created_at', 'updated_at'], 'integer'],
            [['short', 'full'], 'safe'],
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
        $query = AcademicTitle::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'order' => $this->order,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'short', $this->short])
            ->andFilterWhere(['like', 'full', $this->full]);

        return $dataProvider;
    }
}
