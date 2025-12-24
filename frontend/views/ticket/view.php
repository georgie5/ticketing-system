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

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'status',
                'format' => 'raw',
                'value' => function ($model) {
                    if ($model->status == Ticket::STATUS_RESOLVED) {
                        return '<span class="badge bg-success">Resolved</span>';
                    } else {
                        return '<span class="badge bg-danger">Open</span>';
                    }
                },
            ],
            'created_at:datetime', // Shows formatted date like "Dec 23, 2025 3:58 PM"
            'updated_at:datetime',
            // 'created_by' is removed
        ],
    ]) ?>

</div>