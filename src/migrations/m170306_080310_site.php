<?php
use yii\db\Migration;
class m170306_083010_tests extends Migration
{
    public function safeUp()
    {
        $tableOptions = null;
        //Опции для mysql
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';
        }
        //Создание таблицы IP пользователей
        $this->createTable('site', [
            'id' => $this->primaryKey(),
            'url' => $this->text()->notNull(),
            'description' => $this->text()->notNull(),
        ], $tableOptions);
    }
    public function safeDown()
    {
        $this->dropTable('site');
    }
}