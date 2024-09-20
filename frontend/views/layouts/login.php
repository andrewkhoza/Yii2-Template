<?php
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\assets\FeatherIconsAsset;
use phpnt\metismenu\MetisMenuAsset;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\BootstrapAsset;


AppAsset::register($this);
FeatherIconsAsset::register($this);
MetisMenuAsset::register($this);
BootstrapAsset::register($this);


?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" dir="ltr">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="alternate" href="http://<?= Yii::$app->params['alternateURL'] ?>/" hreflang="en-za" />
    
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= \Yii::$app->request->baseurl ?>/images/favicon.ico" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="<?= \Yii::$app->request->baseurl ?>/css/login.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= \Yii::$app->request->baseurl ?>/css/web.css" id="app-style" rel="stylesheet" type="text/css" />
    
</head>
<body>
    <?php $this->beginBody() ?>
    <div class="auth-page">
        <div class="container-fluid p-0">
            <?= $content ?>
        </div>
    </div>

        
        
    <?php $this->endBody() ?>    
    <?php
        $this->registerJs('$("#side-menu").metisMenu();');
        $this->registerJs('feather.replace();');
    ?>

    <script>
        $( document ).ready(function() {
            $(".btn-submits").click(function(){
                console.log( "click!" );
                $("#signup-form").submit();
            });
            $('.reveal-password').click(function(){
                var ischeck = $('#signupform-password').attr('type');
                if(ischeck == 'text'){
                    $('#signupform-password').attr('type','password');
                }else{
                    $('#signupform-password').attr('type','text');
                }
            });
            $('.reveal-password-confirm').click(function(){
                var ischeck = $('#signupform-password2').attr('type');
                if(ischeck == 'text'){
                    $('#signupform-password2').attr('type','password');
                }else{
                    $('#signupform-password2').attr('type','text');
                }
            });
            $('.reveal-password2').click(function(){
                var ischeck = $('#loginform-password').attr('type');
                if(ischeck == 'text'){
                    $('#loginform-password').attr('type','password');
                }else{
                    $('#loginform-password').attr('type','text');
                }
            });
            $('.reveal-password3').click(function(){
                var ischeck = $('#resetpasswordform-password').attr('type');
                if(ischeck == 'text'){
                    $('#resetpasswordform-password').attr('type','password');
                }else{
                    $('#resetpasswordform-password').attr('type','text');
                }
            });
            $('.reveal-password4').click(function(){
                var ischeck = $('#resetpasswordform-password2').attr('type');
                if(ischeck == 'text'){
                    $('#resetpasswordform-password2').attr('type','password');
                }else{
                    $('#resetpasswordform-password2').attr('type','text');
                }
            });
        });
    </script>
                
    
</body>
</html>
<?php $this->endPage() ?>
