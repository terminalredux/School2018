<?php

use yii\db\Migration;

class m170804_071209_create_table_department extends Migration
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
        
        $this->createTable('{{%department}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);  
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170804_071209_create_table_department cannot be reverted.\n";
        return false;
    }
}
