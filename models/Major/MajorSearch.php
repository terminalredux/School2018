<?php

namespace app\models\Major;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Major\Major;

/**
 * MajorSearch represents the model behind the search form about `app\models\Major\Major`.
 */
class MajorSearch extends Major
{
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'department_id', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name', 'description', 'department.name'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['department.name']);
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
        $query = Major::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
       $query->joinWith(['department']);
        $dataProvider->sort->attributes['department.name'] = [
            'asc' => ['department.name' => SORT_ASC],
            'desc' => ['department.name' => SORT_DESC],
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'department_id' => $this->department_id,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'department.name', $this->getAttribute('department.name')]);

        return $dataProvider;
    }
}
