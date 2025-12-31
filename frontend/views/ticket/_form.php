<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="ticket-form ">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <br>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'my-3 btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>