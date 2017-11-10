<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\models;

use yii\db\ActiveQuery;

/**
 * This is the ActiveQuery class for [[Tags]].
 *
 * @see Tags
 */
class TagQuery extends ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * 标题不为空的
     * @return $this
     */
    public function titleNotNull()
    {
        return $this->andWhere(['not', ['title' => '']]);
    }

    /**
     * @inheritdoc
     * @return Tag[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Tag|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}