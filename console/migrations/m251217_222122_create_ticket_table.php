<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ticket}}`.
 */
class m251217_222122_create_ticket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%ticket}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text(),
            'status' => $this->smallInteger()->defaultValue(0), // 0 = Open, 1 = Resolved
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer()->notNull(),
        ]);

        // Index for faster queries
        $this->createIndex(
            'idx-ticket-created_by',
            '{{%ticket}}',
            'created_by'
        );

        // Foreign key constraint
        $this->addForeignKey(
            'fk-ticket-created_by',
            '{{%ticket}}',
            'created_by',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk-ticket-created_by', '{{%ticket}}');
        $this->dropIndex('idx-ticket-created_by', '{{%ticket}}');
        $this->dropTable('{{%ticket}}');
    }
}
