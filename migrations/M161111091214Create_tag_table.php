<?php

namespace yuncms\tag\migrations;

use yii\db\Migration;

class M161111091214Create_tag_table extends Migration
{
    public function up()
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
            'frequency' => $this->integer()->notNull()->defaultValue(0)->comment('Frequency'),
        ], $tableOptions);
    }

    public function down()
    {
        $this->dropTable('{{%tag}}');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
