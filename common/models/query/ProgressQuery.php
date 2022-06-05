<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Progress]].
 *
 * @see \common\models\Progress
 */
class ProgressQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \common\models\Progress[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\Progress|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function creator ($userId)
    {
        return $this->andWhere(['created_by' => $userId]);
    }

    public function latest()
    {
        return $this->orderBy(['created_at' => SORT_DESC]);
    }
}
