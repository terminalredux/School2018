<?php

namespace app\models\CourseBasic;

/**
 * This is the ActiveQuery class for [[CourseBasic]].
 *
 * @see CourseBasic
 */
class CourseBasicQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return CourseBasic[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return CourseBasic|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
