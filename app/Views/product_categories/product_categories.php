<?= $this->extend('private_layout')?>
<?= $this->section('content')?>


            <div class="row">
                 <div class="col-lm-5 mx-auto">
                 <div class="mb-2">
                                <h2>Ajouter les Catégories de Produits</h2>
                            </div>
                    <div class="card">
                        <div class="card-body">
                            <form action="<?=base_url('admin/product_categories')?>" method="post" enctype="multipart/form-data">
                            
                                <div class="mb-2">
                                    <label for="name">Nom de la Produits</label>
                                    <input type="text" class="form-control" name="name" id="name" value="<?= old('name')?>">
                                </div>
                                
                                <div class="mb-2">
                                    <label for="image">Image de la Categories</label>
                                    <input type="file" class="form-control" name="image" id="image">
                                </div>

                                <div class="mb-2 text-center">
                                    <input type="submit" name="save" value="Enregistrer" class="btn btn-primary">
                                </div>

                                
                            </form>



                        </div>
                    </div>


                 </div>
            </div>
   























<?= $this->endSection( )?>