<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \frontend\models\SignupForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Create Account';
$this->context->layout = 'auth';
?>

<section class="text-center">
    <div class="container">
        <div class="row g-0 align-items-center justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-8 mb-4">
                <div class="card cascading-right auth-card shadow-lg" style="backdrop-filter: blur(30px);">
                    <div class="card-body p-4">
                        <h2 class="fw-bold mb-2">Create Your Account</h2>
                        <p class="text-muted mb-4">Join our support platform</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'form-signup',
                            'options' => ['class' => 'auth-form']
                        ]); ?>

                        <div class="mb-4">
                            <?= $form->field($model, 'username', [
                                'template' => '{input}{error}'
                            ])->textInput([
                                'autofocus' => true,
                                'class' => 'form-control form-control-lg auth-input',
                                'placeholder' => 'Choose a username',
                            ])->label(false) ?>
                        </div>

                        <div class="mb-4">
                            <?= $form->field($model, 'email', [
                                'template' => '{input}{error}'
                            ])->textInput([
                                'type' => 'email',
                                'class' => 'form-control form-control-lg auth-input',
                                'placeholder' => 'Email address',
                            ])->label(false) ?>
                        </div>

                        <div class="mb-4">
                            <?= $form->field($model, 'password', [
                                'template' => '{input}{error}'
                            ])->passwordInput([
                                'class' => 'form-control form-control-lg auth-input',
                                'placeholder' => 'Create a password',
                            ])->label(false) ?>
                        </div>

                        <div class="d-grid mb-3">
                            <?= Html::submitButton('Sign Up', [
                                'class' => 'btn btn-primary btn-lg auth-btn',
                                'name' => 'signup-button'
                            ]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                        <hr class="my-4">

                        <p class="text-muted mb-0">
                            Already have an account?
                            <?= Html::a('Sign in here', ['/site/login'], ['class' => 'auth-link fw-bold']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>