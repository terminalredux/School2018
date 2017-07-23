<?php

use yii\db\Migration;

class m170723_134603_create_table_room_type extends Migration
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
        
        $this->createTable('{{%room_type}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'type' => $this->string(100)->notNull(),
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
        echo "m170723_134603_create_table_room_type cannot be reverted.\n";
        return false;
    }
}
