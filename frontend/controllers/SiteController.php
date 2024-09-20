<?php

namespace frontend\controllers;

use Yii;
use yii\base\InvalidArgumentException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use common\models\User;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout',],
                'rules' => [
                    [
                        'actions' => [''],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout', 'signup','ajaxpost'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'ajaxpost' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => \yii\web\ErrorAction::class,
            ],
            'captcha' => [
                'class' => \yii\captcha\CaptchaAction::class,
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->redirect(['logout']);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        $this->layout = 'login';

        if (!\Yii::$app->user->isGuest) {
            if (Yii::$app->user->identity->role == 10){
                return $this->redirect(['/admin/admin-dashboard']);
            }else if (Yii::$app->user->identity->role == 20){
                return $this->redirect(['/user/user-dashboard']);
            }
        }

        $model = new LoginForm();

        if( Yii::$app->request->post() ) {
            $model->load(Yii::$app->request->post());
            $model->username = trim($model->username);
            $model->username = strtolower($model->username);
            if( isset(Yii::$app->request->post()['LoginForm']['rememberMe']) && Yii::$app->request->post()['LoginForm']['rememberMe'] == 'on'){
                $model->rememberMe = 1;
            }else{
                $model->rememberMe = 0;
            }
            $issue = $model->login();            
            if($issue){
                
                if (Yii::$app->user->identity->role == 10){
                    return $this->redirect(['/admin/admin-dashboard']);
                }else  if (Yii::$app->user->identity->role == 20){
                    return $this->redirect(['/user/user-dashboard']);
                }                
            }

            Yii::$app->getSession()->setFlash('warning', 'Sorry, There was an error while completing your request, please try again later or contact our support team.');
            
        }
        

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->redirect(['login']);
    }

   
    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $this->layout ="login";
        $model = new SignupForm();
        $model->statusselect = 1;

        
        if(Yii::$app->request->post()){

            if ($model->load(Yii::$app->request->post())) {

                if ($user = $model->signup(20,10)) {
                    $email = new \frontend\models\Mails();
                    $return = $email->sendEmail(1, $user->id);
                    
                    Yii::$app->session->setFlash('warning', 'A confirmation link has been sent to your email address. Please follow the link to activate your account. Remember to check your spam folder if you can\'t find the email in your inbox.');
                    return $this->redirect(['//site/login']);

                }

                Yii::$app->session->setFlash('warning', 'There was a problem completing your request.');


            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $this->layout = 'login';

        $model = new PasswordResetRequestForm();
        

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidArgumentException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }

}
