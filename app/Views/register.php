<?php $validation = session('validation'); ?>
<?= $this->extend('public_layout')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-5">
                <div class="card-body">
                    <h2>Créer un compte</h2>
                    <?php $session=session(); ?>
                    <?php if(! is_null($session->getFlashdata('success_message'))) ?>
                    <div class="alert alert-success">
                    <?= $session->getFlashdata('success_message');?>
                </div>
                    
                    <?php if (isset($validation)): ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <form action="<?= base_url('register') ?>" method="post">
                        <div class="mb-2">
                            <label for="username">Pseudo</label>
                            <input type="text" class="form-control" name="username" value="<?=old("username")?>">
                            <?php if (isset($validation) && $validation->hasError("username")): ?>
                                <div class="text-danger"><?= $validation->getError("username")?></div> 
                            <?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <label for="email">Émail</label>
                            <input type="email" class="form-control" name="email" value="<?=old("email")?>">
                            <?php if (isset($validation) && $validation->hasError("email")): ?>
                                <div class="text-danger"><?= $validation->getError("email")?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <label for="password">Mot de Passe</label>
                            <input type="password" class="form-control" name="password" value="<?=old("password")?>">
                            <?php if (isset($validation) && $validation->hasError("password")): ?>
                                <div class="text-danger"><?= $validation->getError("password")?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-2">
                            <label for="cpassword">Confirme le Mot de Passe</label>
                            <input type="password" class="form-control" name="cpassword" value="<?=old("cpassword")?>">
                            <?php if (isset($validation) && $validation->hasError("cpassword")): ?>
                                <div class="text-danger"><?= $validation->getError("cpassword")?></div>
                            <?php endif; ?>
                        </div>
                        <div class="mb-2 text-center">
                            <input type="submit" name="register" value="Register" class="btn btn-primary">
                        </div>
                    </form>
                    <a href="<?= base_url('login') ?>">Vous avez déjà un compte?</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection( )?>
