<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use common\models\Ticket;

/** @var yii\web\View $this */
/** @var common\models\Ticket $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Tickets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="ticket-view">

    <!-- Header Section -->
    <div class="mb-5">
        <div class="d-flex align-items-center gap-3 mb-3">
            <i class="fas fa-ticket-alt fa-2x text-primary"></i>
            <div>
                <h1 class="mb-0"><?= Html::encode($this->title) ?></h1>
                <small class="text-muted">Ticket ID: #<?= $model->id ?></small>
            </div>
        </div>

        <!-- Status Badge -->
        <div>
            <?php if ($model->status == Ticket::STATUS_RESOLVED): ?>
                <span class="badge bg-success fs-6"><i class="fas fa-check-circle me-2"></i>Resolved</span>
            <?php else: ?>
                <span class="badge bg-warning fs-6"><i class="fas fa-exclamation-circle me-2"></i>Open</span>
            <?php endif; ?>
        </div>
    </div>

    <!-- Action Buttons -->
    <div class="d-flex gap-2 mb-4">
        <?= Html::a('<i class="fas fa-edit me-2"></i>Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('<i class="fas fa-trash-alt me-2"></i>Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </div>

    <!-- Ticket Details Card -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-body p-4">

            <!-- Title Section -->
            <div class="mb-4">
                <h5 class="text-muted text-uppercase fw-bold mb-2">
                    <i class="fa-duotone fa-solid fa-align-center text-primary me-2"></i>Title
                </h5>
                <p class="fs-5 mb-0"><?= Html::encode($model->title) ?></p>
            </div>

            <hr class="my-4">

            <!-- Description Section -->
            <div class="mb-4">
                <h5 class="text-muted text-uppercase fw-bold mb-2">
                    <i class="fas fa-file-alt text-primary me-2"></i>Description
                </h5>
                <p class="mb-0 lh-lg"><?= Html::encode($model->description) ?></p>
            </div>

            <hr class="my-4">

            <!-- Metadata Grid -->
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="d-flex flex-column">
                        <h6 class="text-muted text-uppercase fw-bold mb-2">
                            <i class="fas fa-calendar-alt text-primary me-2"></i>Created
                        </h6>
                        <p class="mb-0"><?= Yii::$app->formatter->asDatetime($model->created_at) ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex flex-column">
                        <h6 class="text-muted text-uppercase fw-bold mb-2">
                            <i class="fas fa-sync-alt text-primary me-2"></i>Last Updated
                        </h6>
                        <p class="mb-0"><?= Yii::$app->formatter->asDatetime($model->updated_at) ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Back Button -->
    <div class="text-center">
        <?= Html::a('<i class="fas fa-arrow-left me-2"></i>Back to Tickets', ['index'], ['class' => 'btn btn-outline-secondary']) ?>
    </div>

</div>