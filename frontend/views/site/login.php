<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use frontend\widgets\Alert;


$this->title = 'Log In | '.Yii::$app->params['siteName'];
$this->params['topmenu'] = 'Log In';
?>                 
<div class="row g-0" >
    <div class="col-xxl-3 col-lg-4 col-md-5" >
        <div class="auth-full-page-content d-flex p-sm-5 p-4" style="background-color:#0E0A31;">
            <div class="w-100" >
                <div class="d-flex flex-column h-100" >
                    <div class="mb-2 mb-md-3 text-center" >
                        <a href="<?= \Yii::$app->request->baseurl ?>/" class="d-block auth-logo">
                        <img src="<?= \Yii::$app->request->baseurl ?>/images/logo.png" alt="" height="100">
                            <br/>
                            <span class="logo-txt login-text">Personal Budget Tracker</span>
                        </a>
                    </div>
                    <div class="auth-content my-auto" >
                        <div class="text-center login-text" >
                            <h5 class="mb-0">Sign in</h5>
                            <br/>
                            <?= Alert::widget() ?>
                        </div>
                        <br/>
                        <?php $form = ActiveForm::begin(['id' => 'loginform', 'validateOnSubmit' => false, 'options' => ['class' => 'form-horizontal m-t-20']]); ?>
                            <div class="">
                                <?= $form->field($model, 'username', [
                                    'options' => ['class'=>'form-floating form-floating-custom mb-4'],
                                    'addon' => ['prepend' => ['content'=>'<i data-feather="users"></i>']]
                                ])->textInput(['class' => 'form-control', 'placeholder' => 'Email'])->label(false) ?>
                                
                            </div>

                            <div class="">
                                <?= $form->field($model, 'password', [
                                    'options' => ['class'=>'form-floating form-floating-custom mb-4'],
                                    'addon' => [
                                        'prepend' => ['content'=>'<i data-feather="lock"></i>'],
                                        'append' => ['content'=>'<i class="mdi mdi-eye-outline font-size-18 text-muted reveal-password2"></i>']
                                    ]
                                ])->passwordInput(['class' => 'form-control pe-5', 'placeholder' => 'Password'])->label(false) ?>
                            </div>
                            <br/>
                            <div class="mb-3">
                                <?= Html::submitButton('Sign In', ['name' => 'login-btn', 'id' => 'login-btn', 'value' => 'login-btn', 'class' => 'btn btn-primary w-100 waves-effect waves-light'/*, 'disabled' => true*/]) ?>
                            </div>
                        <?php ActiveForm::end(); ?>

                        <div class="mt-5 text-center ">
                            <p class="text-muted mb-0 login-text">
                                Don't have an account ? <a href="<?= \Yii::$app->request->baseurl ?>/site/signup" class="text-primary fw-semibold"> Signup now </a>
                            </p>
                        </div>
                        <div class="mt-2 text-center">
                            <p class="text-muted mb-0">
                                <a href="<?= \Yii::$app->request->baseurl ?>/site/request-password-reset" class="text-primary fw-semibold btn btn-default w-100 waves-effect waves-light"> Forgot Password </a>
                            </p>
                        </div>
                    </div>
                    <div class="mt-4 mt-md-5 text-center login-text">
                        <p class="mb-0">All Rights Reserved.<br/>Designed and Developed by <a href="#" target="_blank">Andrew</a>.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xxl-9 col-lg-8 col-md-7" style="background-image: url('<?= \Yii::$app->request->baseUrl ?>/images/login-bg.jpeg');">
       
           
    </div>
   
</div>

