<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%tickets}}".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int|null $status
 * @property string $created_at
 * @property string|null $updated_at
 * @property int $created_by
 */
class Ticket extends \yii\db\ActiveRecord
{
    const STATUS_OPEN = 0;
    const STATUS_RESOLVED = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%tickets}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['updated_at'], 'default', 'value' => null],
            [['status'], 'default', 'value' => 0],
            [['title', 'description', 'created_by'], 'required'],
            [['description'], 'string'],
            [['status', 'created_by'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'created_by' => 'Created By',
        ];
    }

    /** 
     * behavior to set created_at and updated_at timestamps
     */
    public function behaviors()
    {
        return [
            [
                "class" => \yii\behaviors\TimestampBehavior::class,
                'value' => new \yii\db\Expression('NOW()'),
                "attributes" => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ["created_at", "updated_at"],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ["updated_at"],
                ],
            ]
        ];
    }

    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets the username of the creator
     * @return string
     */
    public function getCreatorName()
    {
        return $this->createdBy ? $this->createdBy->username : 'Unknown';
    }

    /**
     * Gets the label for the current status.
     * @return string
     */
    public function getStatusLabel()
    {
        return self::getStatusLabels()[$this->status] ?? 'Unknown';
    }

    public static function getStatusLabels()
    {
        return [
            self::STATUS_OPEN => 'Open',
            self::STATUS_RESOLVED => 'Resolved',
        ];
    }

    public function getStatusBadge()
    {
        $badges = [
            self::STATUS_OPEN => '<span class="badge bg-warning">Open</span>',
            self::STATUS_RESOLVED => '<span class="badge bg-success">Resolved</span>',
        ];
        return $badges[$this->status] ?? '<span class="badge bg-secondary">Unknown</span>';
    }
}
