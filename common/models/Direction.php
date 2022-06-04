<?php

namespace common\models;

use Yii;

use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;


/**
 * This is the model class for table "{{%direction}}".
 *
 * @property int $id
 * @property string $title
 * @property string|null $tags
 * @property int|null $status
 * @property int|null $has_thumbnail
 * @property string|null $description
 * @property int|null $created_at
 * @property int|null $updated_at
 * @property int|null $created_by
 *
 * @property User $createdBy
 * @property Progress[] $progresses
 */
class Direction extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%direction}}';
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false,
            ]
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::className(), ['id' => 'created_by']);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['status', 'has_thumbnail', 'created_at', 'updated_at', 'created_by'], 'integer'],
            [['description'], 'string'],
            [['title'], 'string', 'max' => 256],
            [['tags'], 'string', 'max' => 512],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'tags' => 'Tags',
            'status' => 'Status',
            'has_thumbnail' => 'Has Thumbnail',
            'description' => 'Description',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /**
     * Gets query for [[Progresses]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\ProgressQuery
     */
    public function getProgresses()
    {
        return $this->hasMany(Progress::className(), ['direction_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\DirectionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\DirectionQuery(get_called_class());
    }
}
