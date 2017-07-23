<?php

namespace app\models\Professor;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Professor\Professor;

/**
 * ProfessorSearch represents the model behind the search form about `app\models\Professor\Professor`.
 */
class ProfessorSearch extends Professor
{
   
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'academic_title_id', 'gender', 'status', 'created_at', 'updated_at'], 'integer'],
            [['firstname', 'middlename', 'lastname', 'website', 'email', 'academicTitle.short'], 'safe'],
        ];
    }
    
    /**
     * @inheritdoc
     */
    public function attributes()
    {
        return array_merge(parent::attributes(), ['academicTitle.short']);
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
        $query = Professor::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $query->joinWith(['academicTitle']);
        $dataProvider->sort->attributes['academicTitle.short'] = [
            'asc' => ['academic_title.short' => SORT_ASC],
            'desc' => ['academic_title.short' => SORT_DESC],
        ];
        
        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
      
        $query->andFilterWhere([
            'id' => $this->id,
            'academic_title_id' => $this->academic_title_id,
            'gender' => $this->gender,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'firstname', $this->firstname])
            ->andFilterWhere(['like', 'middlename', $this->middlename])
            ->andFilterWhere(['like', 'lastname', $this->lastname])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'academic_title.short', $this->getAttribute('academicTitle.short')]);
      
        return $dataProvider;
    }
}
