<?= $this->extend('public_layout')?>
<?= $this->section('content')?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h1>Changer de profile </h1>

            <form action="">
                         <div class="row">
                            <div class="col">
                                <label for="country">Pays</label>
                                <input type="text" class="form-control" name="country" id="country">
                            </div>
                            <div class="col">
                               <label for="state">Ville</label>
                                <input type="text" class="form-control" name="state" id="state">
                            </div>
                            <div class="col">
                                <label for="district">Pays</label>
                                <input type="text" class="form-control" name="district" id="district">
                            </div>
                         </div>

            </form>
            <img src="<?= base_url("assets/images/flower.jpg") ?>" alt="">
        </div>
    </div>
</div>

<?= $this->endSection( )?>