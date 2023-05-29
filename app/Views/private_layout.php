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
    <?= $this->renderSection('content')?>
    <script src= "<?= base_url('assets/js/main.js') ?>"></script>
</body>
</html>