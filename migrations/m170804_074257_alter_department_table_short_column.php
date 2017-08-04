<?php

use yii\db\Migration;

class m170804_074257_alter_department_table_short_column extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
       $departmentTable = '{{%department}}';
       $this->addColumn($departmentTable, 'short_name', 'VARCHAR(50) NOT NULL');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170804_074257_alter_department_table_short_column cannot be reverted.\n";
        return false;
    }
}
