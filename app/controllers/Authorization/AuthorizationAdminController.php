<?php
   
   namespace PORTFOLIO\controllers\Authorization;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\models\Authorization\AuthorizationAdminModel;
   use Rakit\Validation\Validator;   
   use PORTFOLIO\core\Session;
   class AuthorizationAdminController extends Controller{
             private AuthorizationAdminModel $authorizationAdminModel;
             
             function __construct(){
                      
                       $this->authorizationAdminModel = new AuthorizationAdminModel(); 
                       Session::startSession();

             }//end construct
             
             function login(){
                          
                     parent::view('dashboard'.DS.'authorization'.DS.'login.php');   
                     
             }//end login

             function postLogin(){
                           
                       if(isset($_REQUEST['login'])){
                          
                                $validator = new Validator;

                                // make it
                                 $validation = $validator->make($_POST, [
                                               'email'                 => 'required|email',
                                               'password'              => 'required|min:6',
                                 ]);
                  
                                 $validation->validate();
                  
                                 $errors = $validation->errors()->firstOfAll();
                                 
                                 if(empty($errors)){

                                          $data =  $this->authorizationAdminModel->login($_REQUEST['email'],$_REQUEST['password']);                                                                        

                                          if(!empty($data)){

                                                Session::set(ADMIN_SESSION_KEY,$data);                                                      
                                                parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT
                                                                     .'HomeAdmin/index');die;                                         
                                               
                                          }//end if 
                                          
                                 }//end if
                                  
                       }//end if
                             
                             parent::redirct(AUTHORIZATION_CONTROLLER_REDIRCT.'AuthorizationAdmin/login');   
 

             }//end postLogin

   }//end AuthorizationAdminController
   
?> 