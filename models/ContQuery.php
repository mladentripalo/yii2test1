<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Cont]].
 *
 * @see Cont
 */
class ContQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Cont[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Cont|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}