<?php

namespace yuncms\tag\migrations;

use yii\db\Migration;

class M171113060947Create_tag_table extends Migration
{

    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%tag}}', [
            'id' => $this->primaryKey()->unsigned()->comment('ID'),
            'name' => $this->string(50)->notNull()->unique()->comment('Name'),
            'title' => $this->string(150)->comment('Title'),
            'keywords' => $this->string(255)->comment('Keywords'),
            'description' => $this->text()->comment('Description'),
            'slug' => $this->string(80)->comment('Slug'),
            'letter' => $this->string(1)->comment('Letter'),
            'frequency' => $this->integer()->unsigned()->notNull()->defaultValue(0)->comment('Frequency'),
        ], $tableOptions);
    }

    public function safeDown()
    {
        $this->dropTable('{{%tag}}');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "M171113060947Create_tag_table cannot be reverted.\n";

        return false;
    }
    */
}
