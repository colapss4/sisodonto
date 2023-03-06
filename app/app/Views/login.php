<?= $this->extend('Layout/main.php') ?>

<?= $this->section('title') ?>

<?= isset($title) ? $title . ' - ' . env('APP_NAME') : env('APP_NAME') ?>

<?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="container">
    <div class="row justify-content-center align-items-center g-2 mb-4" style="margin-top: 2%;">
        <div class="col-sm-12 col-md-8 col-lg-4 col-xl-4">

            <div class="card">
                <div class="card-body">
                    <h3 class="card-title"><?= isset($title) ? $title : 'Login' ?></h3>
                    <!-- <p class="card-text"></p> -->
                    <hr>

                    <?
                    $error = session()->getFlashdata('error');
                    session()->remove('error');
                    if (!is_null($error)) {
                    ?>
                        <div class="alert alert-danger" role="alert"><?= $error ?></div>
                    <? } ?>

                    <?
                    $success = session()->getFlashdata('success');
                    session()->remove('success');
                    if (!is_null($success)) {
                    ?>
                        <div class="alert alert-success" role="alert"><?= $success ?></div>
                    <? } ?>

                    <form action="/login" method="post">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" value="<?= set_value('senha') ?>" minlength="8" maxlength="20" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Entrar</button>
                        </div>

                    </form>
                    <hr>

                    <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
                        <a class="btn btn-link" href="/reset" role="button" style="width: 50%;">Esqueci minha senha</a>|
                        <a class="btn btn-link" href="/register" role="button" style="width: 50%;">Cadastre-se</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<br>

<?= $this->endSection() ?>