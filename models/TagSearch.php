<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;

/**
 * Class TagSearch
 * @package yuncms\tag
 */
class TagSearch extends Model
{

    /** @var string */
    public $name;

    /** @inheritdoc */
    public function rules()
    {
        return [
            'fieldsSafe' => [['name',], 'safe'],
        ];
    }

    /** @inheritdoc */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('tag', 'TAG'),
            'frequency' => Yii::t('tag', 'Frequency'),
        ];
    }

    /**
     * @param $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Tag::find()->orderBy(['id' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
        $query->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}