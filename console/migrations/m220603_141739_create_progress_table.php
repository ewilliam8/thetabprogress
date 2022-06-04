<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%progress}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%direction}}`
 * - `{{%user}}`
 */
class m220603_141739_create_progress_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%progress}}', [
            'id' => $this->primaryKey(),
            'direction_id' => $this->integer(11)->notNull(),
            'value' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11)->notNull(),
        ]);

        // creates index for column `direction_id`
        $this->createIndex(
            '{{%idx-progress-direction_id}}',
            '{{%progress}}',
            'direction_id'
        );

        // add foreign key for table `{{%direction}}`
        $this->addForeignKey(
            '{{%fk-progress-direction_id}}',
            '{{%progress}}',
            'direction_id',
            '{{%direction}}',
            'id',
            'CASCADE'
        );

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-progress-created_by}}',
            '{{%progress}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-progress-created_by}}',
            '{{%progress}}',
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
        // drops foreign key for table `{{%direction}}`
        $this->dropForeignKey(
            '{{%fk-progress-direction_id}}',
            '{{%progress}}'
        );

        // drops index for column `direction_id`
        $this->dropIndex(
            '{{%idx-progress-direction_id}}',
            '{{%progress}}'
        );

        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-progress-created_by}}',
            '{{%progress}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-progress-created_by}}',
            '{{%progress}}'
        );

        $this->dropTable('{{%progress}}');
    }
}
