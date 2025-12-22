<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

$this->title = 'Admin Login';
$this->params['layout'] = 'auth';
?>

<div class="site-login auth-form">
    <div class="auth-header">
        <div class="auth-icon auth-icon-admin">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"></path>
            </svg>
        </div>
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="auth-subtitle">Admin access required</p>
    </div>

    <?php $form = ActiveForm::begin(['id' => 'login-form', 'options' => ['class' => 'auth-form-body']]); ?>

    <div class="form-group auth-field">
        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'class' => 'form-control auth-input',
            'placeholder' => 'Username'
        ])->label(false) ?>
    </div>

    <div class="form-group auth-field">
        <?= $form->field($model, 'password')->passwordInput([
            'class' => 'form-control auth-input',
            'placeholder' => 'Password'
        ])->label(false) ?>
    </div>

    <div class="form-group auth-remember">
        <?= $form->field($model, 'rememberMe')->checkbox([
            'class' => 'form-check-input'
        ])->label('Remember me', ['class' => 'form-check-label']) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Login', ['class' => 'btn btn-login btn-block w-100', 'name' => 'login-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>