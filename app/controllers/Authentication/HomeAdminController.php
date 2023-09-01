<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
    
   class HomeAdminController extends Controller{
          
           function __construct(){
                    
                   parent::AdminLogin(); 

           }//end construct
           function index(){
                     
                    $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                    parent::view('dashboard'.DS.'index.php',['dataAdmin'=>$dataAdmin]);
             
           }//end index
     
           function logout(){
                    
                   Session::endSession();
                   parent::redirct(AUTHORIZATION_CONTROLLER_REDIRCT.'AuthorizationAdmin/login');
                
           }//end logout

   }//end HomeAdminController

?>