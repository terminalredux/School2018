<?php

use yii\db\Migration;

class m170724_120344_create_table_room_type_building extends Migration
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
        
        $this->createTable('{{%room_type_building}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'building_id' => $this->integer(11)->notNull(),
            'room_type_id' => $this->integer(11)->notNull(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
        $this->addForeignKey('fk-room_type_building-building_id', '{{%room_type_building}}', 'building_id', '{{%building}}', 'id');
        $this->addForeignKey('fk-room_type_building-room_type_id', '{{%room_type_building}}', 'room_type_id', '{{%room_type}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170724_120344_create_table_room_type_building cannot be reverted.\n";
        return false;
    }
}
