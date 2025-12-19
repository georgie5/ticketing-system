<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%tickets}}`.
 */
class m251218_162958_create_tickets_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%tickets}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'description' => $this->text()->notNull(),
            'status' => $this->smallInteger()->defaultValue(0), // 0 = Open, 1 = Resolved
            'created_at' => $this->dateTime()->notNull()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime(),
            'created_by' => $this->integer()->notNull(),
        ]);

        // Index for faster queries
        $this->createIndex(
            'idx-tickets-created_by',
            '{{%tickets}}',
            'created_by'
        );

        // Foreign key constraint
        $this->addForeignKey(
            'fk-tickets-created_by',
            '{{%tickets}}',
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
        $this->dropForeignKey('fk-tickets-created_by', '{{%tickets}}');
        $this->dropIndex('idx-tickets-created_by', '{{%tickets}}');
        $this->dropTable('{{%tickets}}');
    }
}
