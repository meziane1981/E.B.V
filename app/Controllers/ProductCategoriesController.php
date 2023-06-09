<?php

namespace App\Controllers;

use CodeIgniter\Validation\Validation;
use Config\Services;

class ProductCategoriesController extends BaseController
{
    public function create()
    {
        if ($this->request->getMethod() == "get") {
            return view("product_categories/product_categories");
        } elseif ($this->request->getMethod() == "post") {
            $validation = Services::validation();

            if (! $this->validate([
                'name' => 'required|max_length[128]',
                'image' => 'uploaded[image]|max_size[image,1024]|ext_in[image,png,jpg,gif]',
            ])) {
                return redirect()->back()->withInput()->with('errors', $validation->getErrors());

            } else {
                // Le formulaire est valide, vous pouvez traiter les données ici
            }
        }
    }
}

