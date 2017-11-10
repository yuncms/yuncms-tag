<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\actions;

use Yii;
use yii\base\Action;
use yii\web\Response;
use yii\base\InvalidConfigException;
use yuncms\tag\models\Tag;

/**
 * Class AutoCompleteAction
 *
 * ```php
 * public function actions()
 * {
 *      return [
 *          'auto-complete' => [
 *              'class' => 'yuncms\tag\actions\AutoCompleteAction',
 *              'clientIdGetParamName'=>'query',
 *              'clientLimitGetParamName'=>'limit',
 *          ]
 *      ];
 * }
 * ```
 *
 * @package yuncms\tag
 */
class AutoCompleteAction extends Action
{
    /**
     * @var string
     */
    public $clientIdGetParamName = 'query';

    /**
     * @var string
     */
    public $clientLimitGetParamName = 'limit';

    /**
     * 获取Tag
     * @return array|Tag[]
     * @throws InvalidConfigException
     */
    public function run()
    {
        Yii::$app->response->format = Response::FORMAT_JSON;
        $param = Yii::$app->request->get($this->clientIdGetParamName);
        if (mb_strlen($param) < 2) {
            if (YII_DEBUG) {
                throw new InvalidConfigException ("Operator '{$this->clientIdGetParamName}' requires two operands.");
            } else {
                return [];
            }
        } else {
            $query = Tag::find();
            $rows = $query->select(['id', 'name', 'name as text', 'frequency'])
                ->where(['like', 'name', $param])
                ->orderBy(['frequency' => SORT_DESC])
                ->limit(Yii::$app->request->get($this->clientLimitGetParamName, 20))
                ->asArray()
                ->all();
            return $rows;
        }
    }
}
