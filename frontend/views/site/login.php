<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login to Help Desk';
$this->params['layout'] = 'auth';
?>

<div class="site-login auth-form">
    <div class="auth-header">
        <div class="auth-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
            </svg>
        </div>
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="auth-subtitle">Welcome back! Please login to your account</p>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'auth-form-body'],
    ]); ?>

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

    <div class="auth-footer">
        <p class="auth-signup-text">
            Don't have an account? <?= Html::a('Sign up here', ['site/signup'], ['class' => 'auth-signup-link']) ?>
        </p>
    </div>
</div>