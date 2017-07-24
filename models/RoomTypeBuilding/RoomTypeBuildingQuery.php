<?php

namespace app\models\RoomTypeBuilding;

/**
 * This is the ActiveQuery class for [[RoomTypeBuilding]].
 *
 * @see RoomTypeBuilding
 */
class RoomTypeBuildingQuery extends \yii\db\ActiveQuery
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
