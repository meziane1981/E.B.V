<?php
namespace App\Controllers;
use App\Model\UserModel;
use App\Models\UserModel as ModelsUserModel;

class DashboardController extends BaseController
{
    public function user_dashboard()

    {
        // $model= new ModelsUserModel();
        // $users = $model->findall();
        return view('dashboard/user_dashboard');
    }
}