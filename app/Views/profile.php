<?= $this->extend('public_layout')?>
<?= $this->section('content')?>


<div class="container">
    <div class="row">
        <div class="col-sm-12">
        <?php
        use App\Models\UserDetailsModel;
        $model=new UserDetailsModel();
        $session=session();
        $user_id=$session->user_id;
        $record = $model->where('user_id', $user_id)->first();
        //var_dump($record);
        ?>    

            <div class="card my-2">
                <div class="div-card-body">
                <h1>Changer de profile </h1>
                <form action="<?=base_url('profile')?>" method="post">
                         <div class="row">
                            <div class="col">
                                <label for="country">Pays</label>
                                <input type="text" class="form-control" name="country" id="country" value="<?= ! is_null($record)?$record['country']:''?>">
                            </div>
                            <div class="col">
                               <label for="state">Ville</label>
                                <input type="text" class="form-control" name="state" id="state" value="<?= ! is_null($record)?$record['state']:''?>">
                            </div>
                            <div class="col">
                                <label for="district">Département</label>
                                <input type="text" class="form-control" name="district" id="district" value="<?= ! is_null($record)?$record['district']:''?>">
                            </div>
                         </div>
                         <div class="row">
                            <div class="col">
                                <label for="pincode">Code Postale</label>
                                <input type="text" class="form-control" name="pincode" id="pincode" value="<?= ! is_null($record)?$record['pincode']:''?>">
                            </div>
                            <div class="col">
                                <label for="mobile">Numéro de Téléphone</label>
                                <input type="text" class="form-control" name="mobile" id="mobile" value="<?= ! is_null($record)?$record['mobile']:''?>">
                            </div>
                         </div>

                         <div class="row">
                            <div class="col">
                                <label for="local_address">adresse locale</label>
                                <textarea class="form-control" name="local_address" id="local_address" ><?= ! is_null($record)?$record['local_address']:''?></textarea>
                            </div>
                            <div class="col">
                                <label for="permanent_address">adresse permanente</label>
                                <textarea class="form-control" name="permanent_address" id="permanent_address"><?= ! is_null($record)?$record['permanent_address']:''?></textarea>
                                
                            </div>
                         </div>
                         <div class="text-center my-2" >
                            <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
                         </div>
            </form>

                </div>
            </div>

           
           
        </div>
    </div>
</div>

<?= $this->endSection( )?>