<?php
/**
 * @link http://www.tintsoft.com/
 * @copyright Copyright (c) 2012 TintSoft Technology Co. Ltd.
 * @license http://www.tintsoft.com/license/
 */

namespace tests\unit\models;

use tests\_fixtures\TagFixture;
use yuncms\tag\models\Tag;

/**
 * Class TagTest
 * @package tests\models
 */
class TagTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        $this->tester->haveFixtures([
            'php' => [
                'class' => SettingsFixture::className(),
                'dataFile' => codecept_data_dir() . 'tag.php'
            ]
        ]);
    }

    public function testFind()
    {
        expect_that(Tag::findOne(['name' => 'php']));
        expect_not(Tag::findOne(['name' => 'pph7']));
    }
}