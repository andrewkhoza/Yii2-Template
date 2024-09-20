<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Budgets $model */

$this->title = 'Create Budgets';
$this->params['breadcrumbs'][] = ['label' => 'Budgets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="budgets-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
