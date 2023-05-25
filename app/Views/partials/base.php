<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Ogani Template">
  <meta name="keywords" content="Ogani, unica, creative, html">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <title><?= $title ?> basket store</title>

  <!-- Google Font -->
  
  <!-- Css Styles -->
 
</head>

<body>
  <!-- Page Preloder -->
  <div id="preloder">
    <div class="loader"></div>
  </div>

  <!-- Navbar -->
  <?= $this->include("partials/navbar") ?>

  <!-- Header -->
  <?= $this->include("partials/header") ?>

  <!-- Content -->
  <?= $this->renderSection("content") ?>

  <!-- Footer -->
  <?= $this->include("partials/footer") ?>

  <!-- Js Plugins -->
   
  

</body>

</html>