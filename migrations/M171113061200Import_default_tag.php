<?php

namespace yuncms\tag\migrations;

use yii\db\Migration;
use yuncms\tag\models\Tag;

class M171113061200Import_default_tag extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $tags = ['php', 'java', 'c++', 'go', 'js', 'asp'];
        foreach ($tags as $tag) {
            $model = new Tag(['name' => $tag]);
            $model->scenario = Tag::SCENARIO_CREATE;
            $model->save();
        }
    }

    public function safeDown()
    {
        $tags = ['php', 'java', 'c++', 'go', 'js', 'asp'];
        foreach ($tags as $tag) {
            $model = Tag::findOne(['name' => $tag]);
            $model->delete();
        }
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171113061200Import_default_tag cannot be reverted.\n";

        return false;
    }
    */
}
