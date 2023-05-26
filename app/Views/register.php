<?= $this->extend('public_layout')?>
<?= $this->section('content')?>
<div class="container">
    <div class="row">
        <div class="col-sm-4 mx-auto">
            <div class="card mt-5">

                <div class="card-body">
                    <h2>Créer un compte</h2>
                    <?php $validation=\Config\Services::validation();?>
                    <form action="<?= base_url('register') ?>" method="post">
                        <div class="mb-2">
                            <label for="username">Pseudo</label>
                            <input type="text" class="form-control" name="username" value="<?=old("username") ?>">
                            <div class="text-danger"><?= $validation->getError("username")?></div> 
                        </div>
                        <div class="mb-2">
                            <label for="email">Émail</label>
                            <input type="email" class="form-control" name="email" value="<?=old("email") ?>">
                            <div class="text-danger"><?= $validation->getError("email")?></div>
                        </div>
                        <div class="mb-2">
                            <label for="password">Mot de Passe</label>
                            <input type="password" class="form-control" name="password" value="<?=old("password") ?>">
                            <div class="text-danger"><?= $validation->getError("password")?></div>
                        </div>
                        <div class="mb-2">
                            <label for="cpassword">CConfirme le Mot de Passe</label>
                            <input type="password" class="form-control" name="cpassword" value="<?=old("cpassword") ?>">
                            <div class="text-danger"><?= $validation->getError("cpassword")?></div>
                        </div>
                        <div class="mb-2 text-center">
                        <input type="submit" name ="register" value="Register" class="btn btn-primary">
                        </div>
                    </form>

                    <a href="<?= base_url('login') ?>">Vous avez déjà un compte?</a>

                </div>
            </div>
             
        </div>
    </div>
</div>
<?= $this->endSection( )?>