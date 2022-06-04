<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%direction}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m220603_135430_create_direction_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%direction}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string(256)->notNull(),
            'tags' => $this->string(512),
            'status' => $this->integer(1),
            'has_thumbnail' => $this->boolean(),
            'description' => $this->text(),
            'created_at' => $this->integer(11),
            'updated_at' => $this->integer(11),
            'created_by' => $this->integer(11),
        ]);

        // creates index for column `created_by`
        $this->createIndex(
            '{{%idx-direction-created_by}}',
            '{{%direction}}',
            'created_by'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-direction-created_by}}',
            '{{%direction}}',
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
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-direction-created_by}}',
            '{{%direction}}'
        );

        // drops index for column `created_by`
        $this->dropIndex(
            '{{%idx-direction-created_by}}',
            '{{%direction}}'
        );

        $this->dropTable('{{%direction}}');
    }
}
