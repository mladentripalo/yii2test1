<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Ctry]].
 *
 * @see Ctry
 */
class CtryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Ctry[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Ctry|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}