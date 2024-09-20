<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AppSettings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="app-settings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'inactive_time')->textInput() ?>

    <?= $form->field($model, 'email_admin')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'send_emails')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
