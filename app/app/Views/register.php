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
                    <h3 class="card-title"><?= isset($title) ? $title : 'Cadastro' ?></h3>
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

                    <form action="/register" method="post">

                        <?= csrf_field() ?>

                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome</label>
                            <input type="text" name="nome" id="nome" class="form-control" value="<?= set_value('nome') ?>" minlength="10" maxlength="128" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" value="<?= set_value('email') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefone" class="form-label">WhatsApp</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="<?= set_value('telefone') ?>" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha1" class="form-label">Senha</label>
                            <input type="password" class="form-control" name="senha1" id="senha1" value="<?= set_value('senha1') ?>" minlength="8" maxlength="20" required>
                        </div>

                        <div class="mb-3">
                            <label for="senha2" class="form-label">Confirmar Senha</label>
                            <input type="password" class="form-control" name="senha2" id="senha2" value="<?= set_value('senha2') ?>" minlength="8" maxlength="20" required>
                        </div>

                        <div class="mb-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" name="cpf" id="cpf" value="<?= set_value('cpf') ?>" required>
                        </div>

                        <div class="mb-3">

                            <button type="submit" class="btn btn-primary">Confirmar</button>
                        </div>

                    </form>
                    <hr>

                    <div class="btn-group" role="group" aria-label="Basic example" style="width: 100%;">
                        <a class="btn btn-link" href="/reset" role="button" style="width: 50%;">Esqueci minha senha</a>|
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
        $('#telefone').mask('(00) 00000-0000');
        $('#cpf').mask('000.000.000-00');
    });
</script>

<?= $this->endSection() ?>