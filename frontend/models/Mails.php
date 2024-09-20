<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use app\models\UserInfo;
use app\models\EmailText;

/**
 * Password reset request form
 */
class Mails extends Model
{
    public $mailid;
    public $userid;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['mailid', 'userid'], 'required'],
        ];
    }

    /**
     * Sends an email with a link, for resetting the password.
     *
     * @return boolean whether the email was send
     */
    public function sendEmail($mailid,$userid)
    {
        $user = User::findOne($userid);
        if(empty($user)){
            return false;
        }
        $userinfo = UserInfo::findOne(['user_id' => $userid]);
        if(empty($userinfo)){
            return false;
        }
        $emailtxt = EmailText::findOne($mailid);
        
        if(empty($emailtxt)){
            return false;
        }
        $message = \Yii::$app->controller->renderPartial('../emails/'.$emailtxt->view,[
            'user'    =>  $user,
            'userinfo'    =>  $userinfo,
            'emailtxt'    =>  $emailtxt,
        ]);
        $subject = str_replace('[[sitename]]', \Yii::$app->params['siteName'], $emailtxt->email_subject);
        
        $mail = \Yii::$app->mailer->compose()
            ->setFrom([\Yii::$app->params['websiteEmail'] => \Yii::$app->params['siteName']])
            ->setTo([$user->email])
            //->setTo([''])
            ->setCC([''])
            ->setSubject($subject)
            ->setHtmlBody($message);
        
        $return = $mail->send();
        
         
        return $return;
        
    }
    
}
