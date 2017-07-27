<?php

namespace app\models\RoomTypeBuilding;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[RoomTypeBuilding]].
 *
 * @see RoomTypeBuilding
 */
class RoomTypeBuildingQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return RoomTypeBuilding[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return RoomTypeBuilding|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
