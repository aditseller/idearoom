<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "read".
 *
 * @property int $id_read
 * @property string $title
 * @property string $content
 * @property string $channel
 * @property string $tag
 * @property string $created_by
 * @property string $created_at
 * @property string $url
 * @property string $poster
 * @property string $source
 *
 * @property Channel $channel0
 * @property Users $createdBy
 */
class Read extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'read';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'content', 'channel', 'tag'], 'required'],
            [['content'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 150],
            [['channel', 'created_by', 'source'], 'string', 'max' => 100],
            [['tag', 'url', 'poster'], 'string', 'max' => 500],
            [['title'], 'unique'],
            [['channel'], 'exist', 'skipOnError' => true, 'targetClass' => Channel::className(), 'targetAttribute' => ['channel' => 'channel']],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['created_by' => 'fullname']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_read' => 'Id Read',
            'title' => 'Title',
            'content' => 'Content',
            'channel' => 'Channel',
            'tag' => 'Tag',
            'created_by' => 'Created By',
            'created_at' => 'Created At',
            'url' => 'Url',
            'poster' => 'Poster',
            'source' => 'Source',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getChannel0()
    {
        return $this->hasOne(Channel::className(), ['channel' => 'channel']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(Users::className(), ['fullname' => 'created_by']);
    }

    public function beforeSave($insert) {
        
            
        $this->created_at = date("Y-m-d H:i:s");
        $this->created_by = Yii::$app->user->identity->fullname;
        $this->url = 'kjdfsfksjfld';
        
            
            
        
            return parent::beforeSave($insert);
    }
}
