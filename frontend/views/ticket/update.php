<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */

$this->title = 'Update Ticket: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ticket-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <br>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>

<!-- Back Button -->
<div class="text-center">
    <?= Html::a('<i class="fas fa-arrow-left me-2"></i>Back to Ticket', ['view', 'id' => $model->id], ['class' => 'btn btn-outline-secondary']) ?>
</div>