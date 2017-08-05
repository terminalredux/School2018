<?php

use yii\db\Migration;

class m170805_091429_create_table_major extends Migration
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
        
        $this->createTable('{{%major}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'department_id' => $this->integer(11)->notNull(),
            'name' => $this->string(100)->notNull(),
            'description' => $this->text(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
         $this->addForeignKey('fk-major-department_id', '{{%major}}', 'department_id', '{{%department}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170805_091429_create_table_major cannot be reverted.\n";
        return false;
    }
}
