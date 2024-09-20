<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "app_settings".
 *
 * @property int $id
 * @property int $inactive_time
 * @property string|null $email_admin
 * @property int $send_emails
 */
class AppSettings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'app_settings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['inactive_time', 'send_emails'], 'integer'],
            [['email_admin'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'inactive_time' => 'Inactive Time',
            'email_admin' => 'Email Admin',
            'send_emails' => 'Send Emails',
        ];
    }
}
