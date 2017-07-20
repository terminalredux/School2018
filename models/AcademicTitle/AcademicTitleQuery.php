<?php

namespace app\models\AcademicTitle;

/**
 * This is the ActiveQuery class for [[AcademicTitle]].
 *
 * @see AcademicTitle
 */
class AcademicTitleQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return AcademicTitle[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return AcademicTitle|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
