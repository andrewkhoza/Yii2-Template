<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use frontend\widgets\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

$this->title = 'Forgot Password';
$this->params['breadcrumbs'][] = $this->title;
?>
               
<div class="row g-0">
    <div class="col-xxl-3 col-lg-4 col-md-5">
        <div class="auth-full-page-content d-flex p-sm-5 p-4" style="background-color:#0E0A31;">
            <div class="w-100">
                <div class="d-flex flex-column h-100">
                    <div class="mb-2 mb-md-3 text-center">
                        <a href="<?= \Yii::$app->request->baseurl ?>/" class="d-block auth-logo">
                            <img src="<?= \Yii::$app->request->baseurl ?>/images/logo.png" alt="" height="100">
                            <br/>
                            <span class="logo-txt login-text">Personal Budget Tracker</span>
                        </a>
                    </div>
                    <div class="auth-content my-auto">
                        <div class="text-center login-text">
                            <h5 class="mb-0">Forgot Password</h5>
                            <br/>
                            <?= Alert::widget() ?>
                        </div>
                        <br/>
                        <!-- Form -->
                        <div class="row">
                            <div class="col-12">
                                <div class="text-center login-text">
                                    <p>Please enter your email address for your account. We will send you a link to your email address to reset your password.</p>
                                </div>

                                <?php $form = ActiveForm::begin(['id' => 'loginform']); ?>
                                    <?= $form->field($model, 'email')->textInput(['class' => 'form-inp form-control-lg', 'placeholder' => 'Email'])->label(false) ?>
                                   
                                    <br/>
                                    <div class="mb-3">
                                        <?= Html::submitButton('SUBMIT', ['id' => 'forgot-btn', 'class' => 'btn btn-primary w-100 waves-effect waves-light', 'disabled' => true]) ?>
                                    </div>

                                <?php ActiveForm::end(); ?>

                            </div>
                        </div>
            
                        
                        <div class="mt-2 text-center ">
                            <p class="text-muted mb-0 ">
                                <a href="<?= \Yii::$app->request->baseurl ?>/site/login" class="btn btn-default w-100 waves-effect waves-light login-text">
                                    Back to Sign In
                                </a>
                            </p>
                        </div>
                        <div class="mt-2 text-center">
                            <p class="text-muted mb-0 login-text">
                                <a href="<?= \Yii::$app->request->baseurl ?>/site/signup" class="btn btn-default w-100 waves-effect waves-light login-text">
                                    Don't have an account?
                                </a>
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

<?php $this->registerJs("
    $(window).on('load',function () {
        $('#forgot-btn').removeAttr('disabled');
    });
"); ?>