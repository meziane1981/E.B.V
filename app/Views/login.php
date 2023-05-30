<?= $this->extend('public_layout') ?>

<?= $this->section('content') ?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <h2>Se Connecter</h2>
                    <?php $session = session() ?>
                    <?php if (!is_null($session->getFlashdata('success_message'))): ?>
                        <div class="alert alert-success">
                            <?= $session->getFlashdata('success_message'); ?>
                        </div>
                    <?php endif; ?>

                    <?php $validation = \Config\Services::validation(); ?>
                    <form action="<?= base_url('login') ?>" method="post">
                        <div class="mb-2">
                            <label for="email">Émail</label>
                            <input type="email" class="form-control" name="email" value="<?= old("email") ?>">
                            <?php if (isset($validation) && $validation->hasError("email")) : ?>
                                <div class="text-danger"><?= $validation->getError("email") ?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <label for="password">Mot de Passe</label>
                            <input type="password" class="form-control" name="password" value="<?= old("password") ?>">
                            <?php if (isset($validation) && $validation->hasError("password")) : ?>
                                <div class="text-danger"><?= $validation->getError("password") ?></div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-2 text-center">
                            <input type="submit" name="login" value="Se Connecté" class="btn btn-primary">
                        </div>
                    </form>
                    <a href="<?= base_url('register') ?>">Je n'ai pas de compte?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
