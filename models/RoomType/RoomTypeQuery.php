<?php

namespace app\models\RoomType;

/**
 * This is the ActiveQuery class for [[RoomType]].
 *
 * @see RoomType
 */
class RoomTypeQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RoomType[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RoomType|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
