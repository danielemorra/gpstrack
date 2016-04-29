<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "utente".
 *
 * @property string $ute_id
 * @property string $ute_username
 * @property string $ute_password_hash
 * @property string $ute_auth_key
 * @property string $ute_access_token
 * @property string $ute_email
 * @property Attivita[] $attivitas
 * @property MezzoTrasporto[] $mezzoTrasportos
 */
class Utente extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'utente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ute_username', 'ute_password_hash'], 'required'],
            [['ute_username', 'ute_email'], 'string', 'max' => 128],
            [['ute_auth_key', 'ute_email'], 'safe'],
            [['ute_password_hash'], 'string', 'max' => 255],
            [['ute_auth_key'], 'string', 'max' => 32],
            [['ute_access_token'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ute_id' => 'Id',
            'ute_username' => 'Utente',
            'ute_password_hash' => 'Password',
            'ute_auth_key' => 'Auth Key',
            'ute_access_token' => 'Access Token',
            'ute_email' => 'Email',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne(['ute_id' => $id]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    public static function findByUsername($username)
    {
        return static::findOne(['ute_username' => $username]);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }

    public function getAuthKey()
    {
        return $this->ute_auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->ute_password_hash);
    }

    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey()
    {
        $this->ute_auth_key = Yii::$app->security->generateRandomString();
    }

    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            if ($this->isNewRecord) {
                $this->ute_auth_key = \Yii::$app->security->generateRandomString();
            }
            return true;
        }
        return false;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAttivitas()
    {
        return $this->hasMany(Attivita::className(), ['ats_utente_id' => 'ute_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMezzoTrasportos()
    {
        return $this->hasMany(MezzoTrasporto::className(), ['mzt_utente_id' => 'ute_id']);
    }
}
