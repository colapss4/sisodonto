<?= $this->extend('Layout/main.php') ?>

<?= $this->section('title') ?>

<? if (isset($title)) {
    echo $title . ' - ' . env('APP_NAME');
} else {
    echo env('APP_NAME');
} ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<h1>Login</h1>

<?= $this->endSection() ?>