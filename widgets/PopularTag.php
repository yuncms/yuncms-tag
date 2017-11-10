<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */
namespace yuncms\tag\widgets;

use Yii;
use yii\base\Widget;
use yuncms\tag\models\Tag;

/**
 * 获取热门tag
 *
 * ````
 * <?= \yuncms\tag\widgets\PopularTag::widget(['limit'=>10,'cache'=>3600]); ?>
 * ````
 */
class PopularTag extends Widget
{
    /**
     * @var int 需要显示的数量
     */
    public $limit = 10;

    /**
     * @var int 缓存时间
     */
    public $cache = 1;

    public $path = '/site/index';

    /** @inheritdoc */
    public function init()
    {
        parent::init();
        $this->registerTranslations();
    }

    /**
     * 注册翻译
     */
    public function registerTranslations()
    {
        if (!isset(Yii::$app->i18n->translations['widgets/*'])) {
            Yii::$app->i18n->translations['widgets/*'] = [
                'class' => 'yii\i18n\PhpMessageSource',
                'sourceLanguage' => 'en-US',
                'basePath' => __DIR__ . '/messages',
                'fileMap' => [
                    'widgets/tag' => 'tag.php',
                ],
            ];
        }
    }

    /** @inheritdoc */
    public function run()
    {
        //首页显示排行榜
        $models = Tag::getDb()->cache(function ($db) {
            return Tag::find()->orderBy(['frequency' => SORT_DESC])->limit($this->limit)->all();
        }, $this->cache);
        return $this->render('popular_tag', [
            'models' => $models,
            'path' => $this->path
        ]);
    }
}