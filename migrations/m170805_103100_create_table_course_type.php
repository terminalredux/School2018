<?php

use yii\db\Migration;

class m170805_103100_create_table_course_type extends Migration
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
        
        $this->createTable('{{%course_type}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'type' => $this->string(100)->notNull(),
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
        echo "m170805_103100_create_table_course_type cannot be reverted.\n";
        return false;
    }
}
