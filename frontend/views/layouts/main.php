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
        .floating-nav-container {
            z-index: 1030;
            pointer-events: none;
            /* Allow clicking through the container */
        }

        .floating-nav {
            pointer-events: auto;
            /* Re-enable clicks on the nav itself */
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9) !important;
        }

        .nav-link {
            border-radius: 50px;
            padding: 8px 16px !important;
            transition: all 0.2s;
        }

        .nav-link:hover {
            background-color: rgba(0, 0, 0, 0.05);
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="d-flex flex-column h-100">
    <?php $this->beginBody() ?>

    <header class="fixed-top d-flex justify-content-center mt-3 floating-nav-container">
        <?php
        NavBar::begin([
            'brandLabel' => '<i class="fas fa-ticket-alt text-primary me-2"></i><span class="fw-bold text-dark">' . Yii::$app->name . '</span>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar navbar-expand navbar-light bg-white shadow rounded-pill px-4 floating-nav col-11 col-md-6',
            ],
            'innerContainerOptions' => ['class' => 'container-fluid'],
            'togglerOptions' => ['class' => 'd-none'],
        ]);

        $menuItems = [];

        // Home Link with Icon
        $menuItems[] = [
            'label' => '<i class="fas fa-home">Home</i>',
            'url' => ['/site/index'],
            'encode' => false,
            'linkOptions' => ['class' => 'nav-link text-secondary fs-5', 'title' => 'Home']
        ];

        if (Yii::$app->user->isGuest) {
            $menuItems[] = ['label' => 'Signup', 'url' => ['/site/signup']];
            $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
        }

        echo Nav::widget([
            'options' => ['class' => 'navbar-nav me-auto mb-2 mb-md-0 align-items-center'],
            'items' => $menuItems,
        ]);

        if (!Yii::$app->user->isGuest) {
            echo Html::beginForm(['/site/logout'], 'post', ['class' => 'd-flex align-items-center ms-3'])
                . Html::submitButton(
                    '<i class="fas fa-sign-out-alt"></i>',
                    [
                        'class' => 'btn btn-light text-danger rounded-circle shadow-sm',
                        'title' => 'Logout (' . Yii::$app->user->identity->username . ')',
                        'style' => 'width: 40px; height: 40px; display: flex; align-items: center; justify-content: center;'
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
</body>

</html>
<?php $this->endPage();
