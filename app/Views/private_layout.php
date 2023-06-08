<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?=$this->include("bootstrap")  ?>
    <link rel="stylesheet" href="<?= base_url('assets/css/main.css') ?>">
</head>
<body>
         <?=$this->include("navbar")  ?>
         <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                <h1>Bienvenue dans le tableau de bord d'administrations</h1>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-3">
                <div class="list-group">
                        <a href="<?= base_url('admin/users')?>" class="list-group-item">Users</a>
                        <a href="<?= base_url('admin/product_categories')?>" class="list-group-item">Catégories de Produits</a>
                    </div>

                </div>
                
                <div class="col-sm-9">
                <?= $this->renderSection('content')?>
                </div>
            </div>
         </div>
  
    <script src= "<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>