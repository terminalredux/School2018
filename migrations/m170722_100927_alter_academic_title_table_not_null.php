<?php

use yii\db\Migration;

class m170722_100927_alter_academic_title_table_not_null extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
       $academicTitleTable = '{{%academic_title}}';
       $this->alterColumn($academicTitleTable, 'short', 'VARCHAR(50) NULL');
       $this->alterColumn($academicTitleTable, 'full', 'VARCHAR(255) NULL');
       $this->alterColumn($academicTitleTable, 'order', 'INTEGER(11) NULL');
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m170722_100927_alter_academic_title_table_not_null cannot be reverted.\n";
        return false;
    }
}
