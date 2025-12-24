<?php


use common\models\Ticket;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ListView;
use yii\bootstrap5\Modal;
use yii\bootstrap5\ActiveForm;

/** @var yii\web\View $this */
/** @var common\models\TicketSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */
/** @var common\models\Ticket $newTicket */

$this->title = 'Ticket Board';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ticket-index">

    <div class="d-flex justify-content-between align-items-center mb-5">
        <h1 class="display-5 fw-bold text-primary"><?= Html::encode($this->title) ?></h1>

        <?php
        Modal::begin([
            'title' => '<h4 class="m-0">Create New Ticket</h4>',
            'toggleButton' => [
                'label' => '<i class="fas fa-plus me-2"></i>New Ticket',
                'class' => 'btn btn-success btn-lg shadow-sm rounded-pill px-4',
            ],
            'size' => Modal::SIZE_LARGE,
        ]);

        $form = ActiveForm::begin([
            'action' => ['create'],
            'id' => 'create-ticket-form',
        ]); ?>

        <?= $form->field($newTicket, 'title')->textInput(['maxlength' => true, 'placeholder' => 'Brief summary of the issue', 'class' => 'form-control form-control-lg']) ?>

        <?= $form->field($newTicket, 'description')->textarea(['rows' => 6, 'placeholder' => 'Detailed description...', 'class' => 'form-control']) ?>

        <div class="form-group text-end mt-4">
            <?= Html::button('Cancel', ['class' => 'btn btn-light me-2', 'data-bs-dismiss' => 'modal']) ?>
            <?= Html::submitButton('Post Ticket', ['class' => 'btn btn-success px-4']) ?>
        </div>

        <?php ActiveForm::end(); ?>
        <?php Modal::end(); ?>
    </div>

    <?= ListView::widget([
        'dataProvider' => $dataProvider,
        'layout' => "<div class='row g-4'>{items}</div>\n<div class='d-flex justify-content-center mt-5'>{pager}</div>",
        'itemOptions' => ['class' => 'col-md-6 col-lg-4 col-xl-3'], // Bootstrap Grid
        'itemView' => function ($model, $key, $index, $widget) {

            // 1. Status Logic
            $isResolved = $model->status == Ticket::STATUS_RESOLVED;
            $statusBadge = $isResolved
                ? '<span class="badge bg-warnings rounded-pill"><i class="fas fa-check me-1"></i>Resolved</span>'
                : '<span class="badge bg-info rounded-pill"><i class="fas fa-exclamation-circle me-1"></i>Open</span>';

            // 2. Random "Sticky Note" Colors using Bootstrap classes
            $colors = ['warning', 'info', 'light', 'secondary'];
            $color = $colors[$index % count($colors)];

            // Adjust opacity for softer look (Bootstrap 5 utility)
            $bgClass = "bg-{$color} bg-opacity-25";
            if ($color === 'light') $bgClass = "bg-white border"; // Special case for white

            // 3. The "Tape" Effect using Bootstrap Positioning
            $tape = '<div class="position-absolute top-0 start-50 translate-middle bg-white bg-opacity-50 shadow-sm" style="width: 100px; height: 30px; z-index: 1; transform: rotate(-2deg);"></div>';

            $url = Url::to(['view', 'id' => $model->id]);
            $time = Yii::$app->formatter->asDatetime($model->created_at, 'medium');

            return "
            <div class='h-100 position-relative pt-3'>
                <a href='{$url}' class='text-decoration-none text-dark'>
                    <div class='card h-100 shadow-sm border-0 {$bgClass}' style='transition: transform 0.2s;' onmouseover='this.style.transform=\"scale(1.03)\"' onmouseout='this.style.transform=\"scale(1)\"'>
                        
                        <!-- The Tape -->
                        {$tape}

                        <div class='card-body pt-4 d-flex flex-column'>
                            <div class='d-flex justify-content-between align-items-start mb-3'>
                                <small class='text-muted fw-bold'>#{$model->id}</small>
                                {$statusBadge}
                            </div>
                            
                            <h5 class='card-title fw-bold mb-3' style='min-height: 3rem;'>
                                " . Html::encode($model->title) . "
                            </h5>
                            
                            <p class='card-text flex-grow-1 text-secondary' style='display: -webkit-box; -webkit-line-clamp: 4; -webkit-box-orient: vertical; overflow: hidden;'>
                                " . Html::encode($model->description) . "
                            </p>
                            
                            <div class='mt-3 pt-3 border-top border-dark border-opacity-10 d-flex justify-content-between align-items-center'>
                                <small class='text-muted'><i class='far fa-clock me-1'></i>{$time}</small>
                                
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            ";
        },
        'emptyText' => '
            <div class="col-12 text-center py-5">
                <div class="display-1 text-muted mb-3"><i class="far fa-clipboard"></i></div>
                <h3 class="text-muted">No tickets on the board</h3>
                <p class="text-muted">Click "New Ticket" to pin one here!</p>
            </div>
        ',
    ]); ?>



</div>