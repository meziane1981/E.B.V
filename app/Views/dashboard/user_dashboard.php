<?= $this->extend('private_layout')?>
<?= $this->section('content')?>

<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Liste des utilisateurs enregistrés</h2>
            <table class="table table-dark table table-bordered">
                <thead>
                    <tr>
                        <th>Pseudo</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?=$user['username']; ?></td>
                        <td><?=$user['email']; ?></td>
                    <?php endforeach; ?>
                    </tr>
                </tbody>

            </table>
        </div>
    </div>
</div>
<?= $this->endSection( )?>