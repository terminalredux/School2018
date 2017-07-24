<?php

use yii\db\Migration;

class m170724_104935_create_table_building extends Migration
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
        
        $this->createTable('{{%building}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'name' => $this->string(100)->notNull(),
            'street' => $this->string(50)->notNull(),
            'street_number' => $this->string(10)->notNull(),
            'city' => $this->string(50)->notNull(),
            'postcode' => $this->string(6)->notNull(),
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
        echo "m170724_104935_create_table_building cannot be reverted.\n";
        return false;
    }
}
