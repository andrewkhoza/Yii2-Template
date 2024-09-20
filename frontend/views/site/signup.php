<?php
use yii\helpers\Html;
use kartik\form\ActiveForm;
use yii\helpers\ArrayHelper;
use frontend\widgets\Alert;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap4\ActiveForm */
/* @var $model \frontend\models\SignupForm */

$this->title = 'Signup | '.Yii::$app->params['siteName'];
$this->params['topmenu'] = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;

?>

<div class="col-12 signup-bg" style="background-image: url('<?= \Yii::$app->request->baseUrl ?>/images/login-bg.jpeg');">
        <div class="auth-bg p-4 d-flex" style="position: relative;height: 100vh;">
            <div class="col-xxl-6 col-lg-8 col-md-8 offset-xxl-3 offset-lg-2 offset-md-2 col-12 pt-5" style="z-index: 2;">
                <div class="d-flex card" style="background-color: #fff;border: 1px solid #0E0A31;border-radius: 16px;">
                    <div class="w-100  card-header  p-1" style="text-align: center;border-top-left-radius: 14px;border-top-right-radius: 14px;border-color: #0E0A31;border: none;-webkit-box-shadow: 0 0.2rem 0.5rem rgb(18 38 63 / 30%);box-shadow: 0 0.2rem 0.5rem rgb(18 38 63 / 30%);background: #0E0A31;background: linear-gradient(90deg, #0E0A31) 31%, rgba(240,224,177,1) 100%);">
                        <a href="<?= \Yii::$app->request->baseurl ?>/">
                            <!-- <img src="<?= \Yii::$app->request->baseurl ?>/images/signup-bg.jpg" alt="" height="80"> -->
                        </a>
                    </div>
                    <div class="w-100  card-body">
                        <div class="d-flex p-5 pt-1 pb-2 flex-column h-100">
                            <div class="auth-content my-auto">
                                <div>
                                    <div>
                                        <div class="logo m-b-10">
                                            <h5 class="font-medium">Create Account</h5>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <?= Alert::widget() ?>
                                            </div>
                                        </div>
                                        <!-- Form -->
                                        <div class="row">
                                            <div class="col-12">
                                                <?php $form = ActiveForm::begin(['id' => 'loginform', 'options' => ['class' => 'form-horizontal m-t-20']]); ?>
                                                    <div class="row">
                                                        <div class="col-12 mb-2">
                                                            <?= $form->field($model, 'email')->textInput(['class' => 'form-inp form-control form-control-lg', 'placeholder' => 'Email'])->label(false) ?>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                            <?= $form->field($model, 'password', [
                                                                'addon' => ['append' => ['content'=>'<i class="fa fa-eye reveal-password" style="cursor:pointer;"></i>']]
                                                            ])->passwordInput(['class' => 'form-inp form-control form-control-lg', 'placeholder' => 'Password'])->label(false) ?>
                                                        </div>
                                                        <div class="col-12 mb-2">
                                                            <?= $form->field($model, 'password2', [
                                                                'addon' => ['append' => ['content'=>'<i class="fa fa-eye reveal-password-confirm" style="cursor:pointer;"></i>']]
                                                            ])->passwordInput(['class' => 'form-inp form-control form-control-lg', 'placeholder' => 'Confirm Password'])->label(false) ?>
                                                        </div>
                                                    </div>  
                                                
                                                    <div class="form-group text-center ">
                                                        <div class="col-xs-12">
                                                            <?= Html::submitButton('CREATE ACCOUNT', ['class' => 'btn btn-block btn-lg btn-info', 'name' => 'signup-button']) ?>
                                                        </div>
                                                    </div>
                                                <?php ActiveForm::end(); ?>
                                            </div>
                                        </div>
                                        <div class="row under-login" style="margin-top: 15px;">
                                            <div class="col-sm-12 text-center">
                                                <a class="signup-text" href="<?= \Yii::$app->request->baseurl ?>/site/login">Already have an account?</a>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                