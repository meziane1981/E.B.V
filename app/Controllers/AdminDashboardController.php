<?php
namespace App\Controllers;
use App\Model\UserModel;
use App\Models\UserModel as ModelsUserModel;

class AdminDashboardController extends BaseController
{
    public function index()

    {
        
      return view('admin_dashboard/dashboard');
    }

    public function users()

    {
        $model= new ModelsUserModel();
        $users = $model->findall();
        return view('admin_dashboard/users', ['users'=>$users]);
    }
}