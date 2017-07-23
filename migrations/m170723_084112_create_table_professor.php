<?php

use yii\db\Migration;

class m170723_084112_create_table_professor extends Migration
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
        
        $this->createTable('{{%professor}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'academic_title_id' => $this->integer(11)->notNull(),
            'firstname' => $this->string(50)->notNull(),
            'middlename' => $this->string(50),
            'lastname' => $this->string(50)->notNull(),
            'gender' => $this->smallInteger(6)->notNull(),
            'website' => $this->string(255),
            'email' => $this->string(255),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
         $this->addForeignKey('fk-professor-academic_title_id', '{{%professor}}', 'academic_title_id', '{{%academic_title}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170723_084112_create_table_professor cannot be reverted.\n";
        return false;
    }
}
