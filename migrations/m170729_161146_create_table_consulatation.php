<?php

use yii\db\Migration;

class m170729_161146_create_table_consulatation extends Migration
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
        
        $this->createTable('{{%consultation}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'professor_id' => $this->integer(11)->notNull(),
            'room_id' => $this->integer(11)->notNull(),
            'begin' => $this->integer(11)->notNull(),
            'end' => $this->integer(11)->notNull(),
            'additional_info' => $this->text(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'public' => $this->smallInteger(6)->notNull()->defaultValue('0'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
         $this->addForeignKey('fk-consultation-professor_id', '{{%consultation}}', 'professor_id', '{{%professor}}', 'id');
         $this->addForeignKey('fk-consultation-room_id', '{{%consultation}}', 'room_id', '{{%room}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170729_161146_create_table_consulatation cannot be reverted.\n";
        return false;
    }
}
