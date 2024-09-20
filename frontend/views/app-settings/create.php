<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AppSettings $model */

$this->title = 'Create App Settings';
$this->params['breadcrumbs'][] = ['label' => 'App Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="app-settings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
