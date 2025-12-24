<?php

/** @var \yii\web\View $this */
/** @var string $content */

use backend\assets\AppAsset;
use yii\bootstrap5\Html;

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
</head>

<body class="d-flex flex-column h-100 auth-body">
    <?php $this->beginBody() ?>

    <main role="main" class="flex-grow-1 d-flex align-items-center justify-content-center">
        <div class="container">
            <?= $content ?>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-light border-top">
        <div class="container text-center text-muted">
            <small>&copy; <?= date('Y') ?> Admin Panel. All rights reserved.</small>
        </div>
    </footer>

    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage() ?>