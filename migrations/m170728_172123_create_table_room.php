<?php

use yii\db\Migration;

class m170728_172123_create_table_room extends Migration
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
        
        $this->createTable('{{%room}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'room_type_building_id' => $this->integer(11)->notNull(),
            'number' => $this->string(50)->notNull(),
            'additional_info' => $this->text(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
         $this->addForeignKey('fk-room-room_type_building_id_id', '{{%room}}', 'room_type_building_id', '{{%room_type_building}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170728_172123_create_table_room cannot be reverted.\n";
        return false;
    }
}
