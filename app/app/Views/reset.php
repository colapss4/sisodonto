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
                    <h3 class="card-title"><?= isset($title) ? $title : 'Redefinir Senha' ?></h3>
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

                    <form action="/reset" method="post">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= set_value('cpf') ?>" required>
                        </div>

                        <div class="mb-3">
                            <button type="submit" class="btn btn-primary">Enviar Email</button>
                        </div>

                    </form>
                    <hr>

                    <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
                        <a class="btn btn-link" href="/register" role="button" style="width: 50%;">Cadastre-se</a>|
                        <a class="btn btn-link" href="/login" role="button" style="width: 50%;">Voltar ao login</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
<br>

<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
    $(document).ready(function() {
        $('#cpf').mask('000.000.000-00');
    });
</script>

<?= $this->endSection() ?>