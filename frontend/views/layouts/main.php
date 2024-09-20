<?php

/** @var \yii\web\View $this */
/** @var string $content */

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

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <link rel="alternate" href="http://<?= Yii::$app->params['alternateURL'] ?>/" hreflang="en-za" />
    
    <?php $this->head() ?>
    <link rel="shortcut icon" href="<?= \Yii::$app->request->baseurl ?>/images/favicon.ico" type="image/x-icon" />
    <link rel="icon" type="image/png" sizes="32x32" href="<?= \Yii::$app->request->baseurl ?>/images/icon32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= \Yii::$app->request->baseurl ?>/images/icon16x16.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <link href="<?= \Yii::$app->request->baseurl ?>/css/login.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= \Yii::$app->request->baseurl ?>/css/site.css" id="app-style" rel="stylesheet" type="text/css" />
    <link href="<?= \Yii::$app->request->baseurl ?>/css/style.css" id="app-style" rel="stylesheet" type="text/css" />
    
</head>
<body>
<?php $this->beginBody() ?>
<div id="layout-wrapper">
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <?= $content ?>
             </div>
        </div>
        </div>
    </div>
</div>
    <?php $this->endBody() ?>
    <?php
$this->registerJs('feather.replace();');
?>
</body>
</html>
<?php $this->endPage();
