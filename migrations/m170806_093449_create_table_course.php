<?php

use yii\db\Migration;

class m170806_093449_create_table_course extends Migration
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
        
        $this->createTable('{{%course}}', [
            'id' => $this->integer(11)->notNull()->append('AUTO_INCREMENT PRIMARY KEY'),
            'course_basic_id' => $this->integer(11)->notNull(),
            'course_type_id' => $this->integer(11)->notNull(),
            'major_id' => $this->integer(11)->notNull(),
            'ects' => $this->smallInteger(6)->notNull(),
            'total_hours' => $this->smallInteger(6)->notNull(),
            'status' => $this->smallInteger(6)->notNull()->defaultValue('1'),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
        ], $tableOptions);
        
         $this->addForeignKey('fk-course-course_basic_id', '{{%course}}', 'course_basic_id', '{{%course_basic}}', 'id');
         $this->addForeignKey('fk-course-course_type_id', '{{%course}}', 'course_type_id', '{{%course_type}}', 'id');
         $this->addForeignKey('fk-course-major_id', '{{%course}}', 'major_id', '{{%major}}', 'id');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170806_093449_create_table_course cannot be reverted.\n";
        return false;
    }
}
