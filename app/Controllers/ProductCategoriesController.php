<?php
namespace App\Controllers;

use CodeIgniter\Debug\Toolbar\Collectors\Views;

// use App\Model\UserModel;
// use App\Models\UserModel as ModelsUserModel;
// use App\Models\UserDetailsModel;
// use CodeIgniter\Validation\Validation;
// use Config\Services;

class ProductCategoriesController extends BaseController
{
      
    public function create(){
        return View('product_categories');

    }
}