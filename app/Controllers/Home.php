<?php
// namespace App\Controllers;

// class Home extends BaseController
// {
//     public function index()
//     {
//          return view('welcome_message');
       
        
//     }

//     public function register()


//     {
//      $validation = \Config\Services::validation();
//      //get 
//      if ($this->request->getMethod() =="get") 
//      {
//           echo view('register');
//      }
//      else if($this->request->getMethod() =="post")
//      {
//              if($this->validate([
//                "username"=>"required",
//                "email"=>"required|valid_email",
//                "password"=>"required|min_length[5]|max_length[20]",
//                "cpassword"=>"matches[password]",
//               ])) {
//                     // envoyé le formulaire
//                $username=$this->request->getVar("username");
//                $email=$this->request->getVar("email");
//                $password=$this->request->getVar("password");
//                //$cpassword->$this->request->getVar("cpassword");
//                           echo "username: $username";

//              }
//              else{
//                //return redirect()->back()->withInput();
//                return redirect()->back()->withInput();
//                //->with('validation', $validation);

//              }
           


//      }
        
//     }
//     public function login()
//     {
//          return view('login');
       
        
//     }
// }

// namespace App\Controllers;

// class Home extends BaseController
// {
//     public function index()
//     {
//         return view('welcome_message');
//     }

//     public function register()
//     {
//         if ($this->request->getMethod() == "get") {
//             echo view('register');
//         } else if ($this->request->getMethod() == "post") {
//             $validation = $this->validate([
//                 "username" => "required",
//                 "email" => "required|valid_email",
//                 "password" => "required|min_length[5]|max_length[20]",
//                 "cpassword" => "matches[password]",
//             ]);

//             if (!$validation) {
//                 return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
//             }
// envoyé le formulaire
//             $username = $this->request->getVar("username");
//             $email = $this->request->getVar("email");
//             $password = $this->request->getVar("password");

//             echo "Username: $username";
//         }
//     }

//     public function login()
//     {
//         return view('login');
//     }
// }

namespace App\Controllers;
use App\Model\UserModel;
use App\Models\UserModel as ModelsUserModel;

class Home extends BaseController
{
    public function index()
    {
        return view('welcome_message');
    }

    public function register()
    {
        $validation = \Config\Services::validation();

        if ($this->request->getMethod() === 'get') {
            echo view('register', ['validation' => $validation]);
        } else if ($this->request->getMethod() === 'post') {
            if ($this->validate([
                "username" => "required",
                "email" => "required|valid_email",
                "password" => "required|min_length[5]|max_length[20]",
                "cpassword" => "matches[password]",
            ])) {
               // envoyé le formulaire
                $username = $this->request->getVar("username");
                $email = $this->request->getVar("email");
                $password = $this->request->getVar("password");

               // maintenant enregistrez les données ds la BD

               $data=[
                    "username"=>$username,
                    "email"=>$email,
                    "password"=>$password,

               ];

               $model= new ModelsUserModel();
               $model->insert($data);

               $session=session();
               $session->set("success_message", "l'utilisateur enregistré avec succès");
               $session->markAsFlashdata("success_message");
               return view("register");

            } else {
                return redirect()->back()->withInput()->with('validation', $validation);
            }
        }
    }

    public function login()
    {
        return view('login');
    }
}

