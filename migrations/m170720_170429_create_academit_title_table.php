<?php

use yii\db\Migration;

/**
 * Handles the creation of table `academit_title`.
 */
class m170720_170429_create_academit_title_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        
        $this->createTable('{{%academic_title}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'short' => $this->string(50)->notNull(),
            'full' => $this->string(255)->notNull(),
            'order' => $this->integer(11)->notNull(),
            'status' => $this->integer(11)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170720_170429_create_academit_title_table cannot be reverted.\n";
        return false;
    }
}
