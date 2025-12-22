<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create Account';
$this->params['layout'] = 'auth';
?>

<div class="site-signup auth-form">
    <div class="auth-header">
        <div class="auth-icon">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M16 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                <circle cx="12" cy="7" r="4"></circle>
                <line x1="12" y1="12" x2="12" y2="18"></line>
                <line x1="9" y1="15" x2="15" y2="15"></line>
            </svg>
        </div>
        <h1><?= Html::encode($this->title) ?></h1>
        <p class="auth-subtitle">Join our help desk support platform</p>
    </div>

    <?php $form = ActiveForm::begin([
        'id' => 'form-signup',
        'options' => ['class' => 'auth-form-body']
    ]); ?>

    <div class="form-group auth-field">
        <?= $form->field($model, 'username')->textInput([
            'autofocus' => true,
            'class' => 'form-control auth-input',
            'placeholder' => 'Choose a username'
        ])->label(false) ?>
    </div>

    <div class="form-group auth-field">
        <?= $form->field($model, 'email')->textInput([
            'class' => 'form-control auth-input',
            'placeholder' => 'Email address',
            'type' => 'email'
        ])->label(false) ?>
    </div>

    <div class="form-group auth-field">
        <?= $form->field($model, 'password')->passwordInput([
            'class' => 'form-control auth-input',
            'placeholder' => 'Create a password'
        ])->label(false) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Create Account', ['class' => 'btn btn-login btn-block w-100', 'name' => 'signup-button']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="auth-footer">
        <p class="auth-signup-text">
            Already have an account? <?= Html::a('Login here', ['site/login'], ['class' => 'auth-signup-link']) ?>
        </p>
    </div>
</div>