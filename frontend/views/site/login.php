<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var \common\models\LoginForm $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

$this->title = 'Login to Help Desk';
$this->context->layout = 'auth';
?>


<section class="text-center">
    <div class="container">
        <div class="row g-0 align-items-center justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-8 mb-4">
                <div class="card cascading-right auth-card shadow-lg" style="backdrop-filter: blur(30px);">
                    <div class="card-body p-5">
                        <h2 class="fw-bold mb-2">Welcome Back</h2>
                        <p class="text-muted mb-4">Sign in to your account</p>

                        <?php $form = ActiveForm::begin([
                            'id' => 'login-form',
                            'options' => ['class' => 'auth-form'],
                        ]); ?>

                        <div class="mb-4">
                            <?= $form->field($model, 'username', [
                                'template' => '{input}{error}'
                            ])->textInput([
                                'autofocus' => true,
                                'class' => 'form-control form-control-lg auth-input',
                                'placeholder' => 'Username or Email',
                            ])->label(false) ?>
                        </div>

                        <div class="mb-4">
                            <?= $form->field($model, 'password', [
                                'template' => '{input}{error}'
                            ])->passwordInput([
                                'class' => 'form-control form-control-lg auth-input',
                                'placeholder' => 'Password',
                            ])->label(false) ?>
                        </div>

                        <div class="d-flex mb-4">
                            <?= $form->field($model, 'rememberMe')->checkbox([
                                'class' => 'form-check-input auth-checkbox',
                            ]) ?>
                        </div>

                        <div class="d-grid mb-3">
                            <?= Html::submitButton('Sign In', [
                                'class' => 'btn btn-primary btn-lg auth-btn',
                                'name' => 'login-button'
                            ]) ?>
                        </div>

                        <?php ActiveForm::end(); ?>

                        <hr class="my-4">

                        <p class="text-muted mb-0">
                            Don't have an account?
                            <?= Html::a('Sign up here', ['/site/signup'], ['class' => 'auth-link fw-bold']) ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>