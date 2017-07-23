<?php

namespace app\models\Professor;

/**
 * This is the ActiveQuery class for [[Professor]].
 *
 * @see Professor
 */
class ProfessorQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Professor[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Professor|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
