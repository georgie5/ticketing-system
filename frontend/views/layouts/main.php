<?php


/** @var \yii\web\View $this */
/** @var string $content */

use common\widgets\Alert;
use frontend\assets\AppAsset;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <?php $this->registerCsrfMetaTags() ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <style>
        /* Custom scrollbar for a cleaner look */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #c1c1c1;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        body {
            background-color: #f8f9fa;
        }

        /* Floating Navbar Styles */


        .navbar-nav .nav-link {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            margin: 0 5px;
            color: #6c757d;
            transition: all 0.2s ease;
            font-size: 1.1rem;
        }

        .navbar-nav .nav-link:hover {
            background-color: rgba(13, 110, 253, 0.1);
            color: #0d6efd;
            transform: translateY(-2px);
        }

        .navbar-nav .nav-link.active {
            background-color: #0d6efd;
            color: white !important;
            box-shadow: 0 4px 10px rgba(13, 110, 253, 0.3);
        }

        /* Logout Button Styling */
        .logout-btn {
            width: 42px;
            height: 42px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            background: transparent;
            color: #dc3545;
            /* Danger color */
            border-radius: 50%;
            transition: all 0.2s;
            font-size: 1.1rem;
        }

        .logout-btn:hover {
            background-color: rgba(220, 53, 69, 0.1);
            transform: translateY(-2px);
        }

        */
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="fixed-top d-flex justify-content-center mt-3 floating-nav-container">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="fa-solid fa-ticket text-secondary me-2"></i>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand navbar-light bg-white shadow rounded-pill px-4 floating-nav col-11 col-md-6',
            ],
            'innerContainerOptions' => ['class' => 'container-fluid'],
            'togglerOptions' => ['class' => 'd-none'],
        ]);

        $menuItems = [];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = [
                'label' => '<i class="fas fa-user-plus"></i>',
                'url' => ['/site/signup'],
                'encode' => false,
                'linkOptions' => [
                    'title' => 'Signup',
                    'data-bs-toggle' => 'tooltip',
                    'data-bs-placement' => 'bottom'
                ]
            ];
            $menuItems[] = [
                'label' => '<i class="fas fa-sign-in-alt"></i>',
                'url' => ['/site/login'],
                'encode' => false,
                'linkOptions' => [
                    'title' => 'Login',
                    'data-bs-toggle' => 'tooltip',
                    'data-bs-placement' => 'bottom'
                ]
            ];
        } else {
            // Tickets Link (Added for logged in users)
            $menuItems[] = [
                'label' => '<i class="fas fa-clipboard-list"></i>',
                'url' => ['/ticket/index'],
                'encode' => false,
                'linkOptions' => [
                    'title' => 'My Tickets',
                    'data-bs-toggle' => 'tooltip',
                    'data-bs-placement' => 'bottom'
                ]
            ];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto align-items-center'],
            'items' => $menuItems,
        ]);

        if (!Yii::$app->user->isGuest) {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex align-items-center ms-2'])
                . Html::submitButton(
                    '<i class="fas fa-power-off"></i>',
                    [
                        'class' => 'logout-btn',
                        'title' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'data-bs-toggle' => 'tooltip',
                        'data-bs-placement' => 'bottom'
                    ]
                )
                . Html::endForm();
        }
        NavBar::end();
        ?>
    </header>

    <!-- Added extra padding-top to account for the floating navbar -->
    <main role="main" class="flex-shrink-0" style="padding-top: 100px;">
        <div class="container">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 text-muted text-center small">
        <div class="container">
            <p class="mb-0">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>
        </div>
    </footer>

    <?php $this->endBody() ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</body>

</html>
<?php $this->endPage();
