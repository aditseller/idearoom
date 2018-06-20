<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id_user
 * @property string $email
 * @property string $password
 * @property string $fullname
 * @property string $phone
 * @property string $joindate
 * @property int $role
 * @property string $active
 * @property string $authKey
 * @property string $accessToken
 *
 * @property Read[] $reads
 * @property Roles $role0
 */
class Users extends \yii\db\ActiveRecord
{
	public $image;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'password', 'fullname', 'phone'], 'required'],
            [['joindate'], 'safe'],
            [['role'], 'integer'],
            [['active'], 'string'],
            [['email', 'fullname'], 'string', 'max' => 100],
            [['password', 'authKey', 'accessToken'], 'string', 'max' => 500],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['fullname'], 'unique'],
            [['phone'], 'unique'],
            [['role'], 'exist', 'skipOnError' => true, 'targetClass' => Roles::className(), 'targetAttribute' => ['role' => 'id_role']],
			[['image'], 'image','extensions'=>'jpg,png','maxSize' => 5000000, ],
		];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_user' => 'Id User',
            'email' => 'Email',
            'password' => 'Password',
            'fullname' => 'Fullname',
            'phone' => 'Phone',
            'joindate' => 'Joindate',
            'role' => 'Role',
            'active' => 'Active',
            'authKey' => 'Auth Key',
            'accessToken' => 'Access Token',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReads()
    {
        return $this->hasMany(Read::className(), ['created_by' => 'fullname']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRole0()
    {
        return $this->hasOne(Roles::className(), ['id_role' => 'role']);
    }
	
	   public function beforeSave($insert) {
        if(isset($this->password)) {
            
            $this->password = bin2hex($this->password);
            $this->authKey = sha1($this->email);
            $this->accessToken = sha1($this->id_user);
			
		
            
            
        }
            return parent::beforeSave($insert);
    }
}
