<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace yuncms\tag\models;

use Yii;
use yii\behaviors\AttributeBehavior;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Inflector;

/**
 * Class Tag
 * @property int $id 主键
 * @property string $name TAG名称
 * @property string $title 标题
 * @property string $keywords 关键词
 * @property string $description 描述
 * @property string $slug 标识
 * @property string $letter 首字母
 * @property int $frequency 热度
 */
class Tag extends ActiveRecord
{
    const SCENARIO_CREATE = 'create';

    const SCENARIO_UPDATE = 'update';

    /** @var string Default name regexp */
    public static $nameRegexp = '/^[\x{4e00}-\x{9fa5}\w\+\.\-#]+$/u';

    /**
     * 定义行为
     * @return array
     */
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['slug'] = [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['slug']
            ],
            'value' => function ($event) {
                return Inflector::slug($event->sender->name, '');
            }
        ];
        $behaviors['letter'] = [
            'class' => AttributeBehavior::className(),
            'attributes' => [
                ActiveRecord::EVENT_BEFORE_INSERT => ['letter']
            ],
            'value' => function ($event) {
                return strtoupper(substr($event->sender->slug, 0, 1));
            }
        ];
        return $behaviors;
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        return ArrayHelper::merge($scenarios, [
            self::SCENARIO_CREATE => ['name', 'title', 'keywords', 'description'],
            self::SCENARIO_UPDATE => ['name', 'title', 'keywords', 'description'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%tag}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['name', 'required'],
            ['name', 'match', 'pattern' => static::$nameRegexp],
            ['name', 'string', 'min' => 2, 'max' => 50],
            ['name', 'unique', 'message' => Yii::t('tag', 'This name has already been taken')],
            [['title', 'slug'], 'string', 'max' => 255],
            ['letter', 'string', 'max' => 1],
            [['keywords', 'description'], 'safe'],
            
            [['frequency'], 'integer'],
            ['frequency', 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('tag', 'ID'),
            'name' => Yii::t('tag', 'TAG'),
            'slug' => Yii::t('tag', 'Slug'),
            'title' => Yii::t('tag', 'Title'),
            'keywords' => Yii::t('tag', 'Keyword'),
            'description' => Yii::t('tag', 'Description'),
            'frequency' => Yii::t('tag', 'Frequency'),
            'letter' => Yii::t('tag', 'Letter'),
        ];
    }

    /**
     * @inheritdoc
     * @return TagQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TagQuery(get_called_class());
    }
}
