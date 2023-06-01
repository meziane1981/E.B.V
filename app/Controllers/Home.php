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
use CodeIgniter\Validation\Validation;
use Config\Services;

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
        $session = session();
        
        if ($this->request->getMethod() == "get") {
            echo view('login');
        } elseif ($this->request->getMethod() == "post") {
            $validation = \Config\Services::validation();
    
            // Validation
            if ($validation->run($this->request->getPost(), 'login')) {
                // Les règles de validation ont été respectées
                // Effectuez ici les actions nécessaires pour l'authentification de l'utilisateur
                
                $email = $this->request->getVar("email");
                $password = $this->request->getVar("password");
    
                $model = new ModelsUserModel();
                $record = $model->where('email', $email)->first();
    
                if (!empty($record) && password_verify($password, $record['password'])) {
                    // L'utilisateur est authentifié avec succès
                    // Vous pouvez stocker les informations de l'utilisateur dans la session si nécessaire
    
                    $sess_data = [
                        'name'     => $record['username'],
                        'email'    => $record['email'],
                        'user_type'=> $record['user_type'],
                        'loginned' => true,
                    ];
    
                    $session->set($sess_data);
    
                    if ($record['user_type'] == 'user') {
                        // Redirection vers la page utilisateur
                        return redirect()->to(base_url('user_dashboard'));
                    } elseif ($record['user_type'] == 'admin') {
                        // Redirection vers la page admin
                        return redirect()->to(base_url('admin_dashboard'));
                    }
                } else {
                    // Les informations de connexion sont incorrectes
                    $validation->setError('password', 'Identifiants invalides.');
                }
            }
    
            // Les règles de validation n'ont pas été respectées ou les informations de connexion sont incorrectes
            return view('login', ['validation' => $validation]);
        }
    }
    public function logout() 
    {
        $session=session();
        session_unset();
        session_destroy();
        return redirect()->to(base_url());
    }
    
 }





                //     public function login()
                // {
                //     $session = session();
                    
                //     if ($this->request->getMethod() == "get") {
                //         echo view('login');
                //     } elseif ($this->request->getMethod() == "post") {
                //         $validation = \Config\Services::validation();

                //         // Validation
                //         if ($validation->run($this->request->getPost(), 'login')) {
                //             // Les règles de validation ont été respectées
                //             // Effectuez ici les actions nécessaires pour l'authentification de l'utilisateur
                            
                //             $email = $this->request->getVar("email");
                //             $password = $this->request->getVar("password");

                //             $model = new ModelsUserModel();
                //             $record = $user = $model
                //             ->where('email', $email)
                //             ->first();
                //             //$session->session();
                //              if (! is_null($record)){
                //                 // les information se trouve dans la base de données
                                
                //                 $sess_data = [
                //                     'name'  => $record['username'],
                //                     'email'  => $record['email'],
                //                     'user_type'=> $record['user_type'],
                //                     'loginned'=> 'loginned',
                                    
                //                 ];
                //                 $session->set($sess_data);
                //                 if ($record['user_type'] == 'user') {
                //                     // aller au user page
                //                     $url="user_dashboard";

                //                 } 
                //                elseif ($record['user_type'] == 'admin') {
                //                 // aller au admin page 
                //                 $url="admin_dashboard";
                                
                //                }
                //                return redirect()->to(base_url($url));
                //             }
                //             if ($user && password_verify($password, $user['password'])) {
                //                 // L'utilisateur est authentifié avec succès
                //                 // Vous pouvez stocker les informations de l'utilisateur dans la session si nécessaire
                                
                //                 $session->set("failed_message", "l'enregistrement ne correspond pas, réessayez autre fois");
                //                 $session->markAsFlashdata("failed_message");


                //                 return redirect()->to('dashboard/user_dashboard');
                //             } else {
                //                 // Les informations de connexion sont incorrectes
                //                 $validation->setError('password', 'Identifiants invalides.');

                //                 return view('login', ['validation' => $validation]);
                //             }
                //         } else {
                //             // Les règles de validation n'ont pas été respectées
                //             return view('login', ['validation' => $validation]);
                //         }
                //     }
                // }
                    
                


  
    //    public function login()
    //    {
    //             $session = session();
                                                                                                                                
    //                 if ($this->request->getMethod() == "get") {
    //                     echo view('login');
    //                 } 
    //                 elseif ($this->request->getMethod() == "post") {
    //                     $validation = \Config\Services::validation();

    //                     // Validation
    //                     if ($this->validate([
    //                         'email' => 'required|valid_email',
    //                         'password' => 'required',
    //                     ])) {
    //                         // Les règles de validation ont été respectées
                            
                            
    //                         //return redirect()->to('dashboard/user_dashboard'); 
    //                     } else {
    //                         // Les règles de validation n'ont pas été respectées
    //                         return redirect()->back()->withInput()->with('validation', $validation);
    //                     }
    //                 }
    //     }   
      

    // public function login()
    // {
    //     $session = session();

    //     if ($this->request->getMethod() == "get") {
    //         echo view('login');
    //     } elseif ($this->request->getMethod() == "post") {
    //         $validation = \Config\Services::validation();

    //         // Validation
    //         if ($validation->run($this->request->getPost(), 'login')) {
    //             // Les règles de validation ont été respectées
    //             // Effectuez ici les actions nécessaires pour l'authentification de l'utilisateur

    //             $email = $this->request->getVar("email");
    //             $password = $this->request->getVar("password");

    //             $model= new ModelsUserModel();
    //             $user = $model->where('email', $email)->first();

    //             if ($user && password_verify($password, $user['password'])) {
    //                 // L'utilisateur est authentifié avec succès
    //                 // Vous pouvez stocker les informations de l'utilisateur dans la session si nécessaire
    //                 $session->set('user_id', $user['id']);

    //                 return redirect()->to('dashboard/user_dashboard'); // Remplacez 'dashboard' par l'URL de la page de tableau de bord après la connexion
    //             } else {
    //                 // Les informations de connexion sont incorrectes
    //                 $validation->setError('password', 'Identifiants invalides.');

    //                 return redirect()->back()->withInput()->with('validation', $validation);
    //             }
    //         } else {
    //             // Les règles de validation n'ont pas été respectées
    //             return redirect()->back()->withInput()->with('validation', $validation);
    //         }
    //     } else {
    //         $validation = \Config\Services::validation();
    //         echo view('login', ['validation' => $validation]);
    //     }
    // }
    

        
    
                                                                                    //     public function login()
                                                                                    // {
                                                                                    //     $session = session();

                                                                                    //     if ($this->request->getMethod() == 'get') {
                                                                                    //         return view('login');
                                                                                    //     } elseif ($this->request->getMethod() == 'post') {
                                                                                    //         $validation = \Config\Services::validation();

                                                                                    //         if ($validation->run($this->request->getPost(), 'login')) {
                                                                                    //             // Les données de validation sont valides
                                                                                    //             $email = $this->request->getPost('email');
                                                                                    //             $password = $this->request->getPost('password');

                                                                                    //             // Effectuer l'authentification en vérifiant les informations de connexion
                                                                                    //             // Exemple : vérification de la correspondance dans la base de données
                                                                                    //             $userModel = new UserModel();
                                                                                    //             $user = $userModel->where('email', $email)->first();

                                                                                    //             if ($user && password_verify($password, $user['password'])) {
                                                                                    //                 // Authentification réussie, enregistrer les informations utilisateur dans la session
                                                                                    //                 $session->set([
                                                                                    //                     'user_id' => $user['id'],
                                                                                    //                     'username' => $user['username'],
                                                                                    //                     // Autres informations utilisateur que vous souhaitez enregistrer
                                                                                    //                 ]);

                                                                                    //                 // Redirection vers le tableau de bord ou une autre page appropriée
                                                                                    //                 return redirect()->to('/dashboard');
                                                                                    //             } else {
                                                                                    //                 // Identifiants de connexion incorrects
                                                                                    //                 $session->setFlashdata('error_message', 'Identifiants de connexion incorrects.');
                                                                                    //                 return redirect()->back()->withInput();
                                                                                    //             }
                                                                                    //         } else {
                                                                                    //             // Les données de validation sont invalides
                                                                                    //             return redirect()->back()->withInput()->with('validation', $validation);
                                                                                    //         }
                                                                                    //     }
                                                                                    // }




                                                                          
                                                                                                                                                                            
               

        

