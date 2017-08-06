<?php

namespace app\models\Course;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Course\Course;

/**
 * CourseSearch represents the model behind the search form about `app\models\Course\Course`.
 */
class CourseSearch extends Course
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'course_basic_id', 'course_type_id', 'major_id', 'ects', 'total_hours', 'status', 'created_at', 'updated_at'], 'integer'],
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
        $query = Course::find();

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
            'course_basic_id' => $this->course_basic_id,
            'course_type_id' => $this->course_type_id,
            'major_id' => $this->major_id,
            'ects' => $this->ects,
            'total_hours' => $this->total_hours,
            'status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        return $dataProvider;
    }
}
