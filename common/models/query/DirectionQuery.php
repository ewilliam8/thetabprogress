<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Direction]].
 *
 * @see \common\models\Direction
 */
class DirectionQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Direction[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Direction|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function creator ($userId)
    {
        return $this->andWhere(['created_by' => $userId]);
    }
}
