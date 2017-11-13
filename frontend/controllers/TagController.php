<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\frontend\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii\filters\AccessControl;
use yii\data\ActiveDataProvider;
use yii\web\NotFoundHttpException;
use yuncms\tag\models\Tag;

/**
 * Tag controller
 */
class TagController extends Controller
{

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'follow'],
                        'roles' => ['@', '?']
                    ]
                ],
            ],
        ];
    }

    /**
     * 标签列表页
     *
     * @return string
     */
    public function actionIndex()
    {
        Url::remember('', 'actions-redirect');
        $dataProvider = new ActiveDataProvider([
            'query' => Tag::find()->orderBy(['frequency' => SORT_DESC]),
            'pagination' => [
                'defaultPageSize' => 16,
                'pageSize' => 16
            ]
        ]);
        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * @param $name
     * @return string
     */
    public function actionView($name)
    {
        return $this->render('view', [
            'model' => $this->findModel($name),
        ]);
    }

    /**
     * @param string $name
     * @return null|Tag
     * @throws NotFoundHttpException
     */
    public function findModel($name)
    {
        if (($model = Tag::findOne(['name' => $name])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('yii', 'The requested page does not exist.'));
        }
    }
}