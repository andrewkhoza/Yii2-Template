<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\AppSettings $model */

$this->title = 'Update App Settings: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'App Settings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="app-settings-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
