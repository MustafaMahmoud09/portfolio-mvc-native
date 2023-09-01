<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\ContactAdminModel;
   
   class ContactAdminController extends Controller{
      private ContactAdminModel $contactAdminModel; 
      function __construct(){
                  
                parent::AdminLogin();         
                $this->contactAdminModel = new ContactAdminModel(); 

      }//end construct 

      function showItem(){

           $dataAdmin = Session::get(ADMIN_SESSION_KEY);
           $dataContact = $this->contactAdminModel->getContactAdminById($dataAdmin['id']); 
           parent::view('dashboard'.DS.'contact-controll.php',[
        
                        'dataAdmin'     => $dataAdmin,
                        'dataContact' => $dataContact

           ]);

      }//end showItem

      function delete($id){
               
              $this->contactAdminModel->delete($id);
              parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ContactAdmin/showItem');

      }//end delete

   }//end ContactAdminController
   
?> 