<?php
   
   namespace PORTFOLIO\controllers\User;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\models\User\UserModel;
   use Rakit\Validation\Validator;
   
   class UserController extends Controller{

            private UserModel $userModel;
            
            function __construct(){
                 
                    $this->userModel = new UserModel();   

            }//end construct
            function index($id){
                       
                      $biscDataAdmin = $this->userModel->selectDataAdminById($id);     
                      $skill = $this->userModel->getSkillAdminById($id);
                      $education = $this->userModel->getEducationAdminById($id);
                      $service = $this->userModel->getServiceAdminById($id);
                      $social = $this->userModel->getSocialAdminById($id);
                      $allProject = $this->userModel->getAllDataProduct($id);

                      if(empty($biscDataAdmin)){
                           
                                parent::redirct(ERROR_CONTROLLER_REDIRCT.'Error/notFound');die;

                      }//end if 
                
                     parent::view('portfolio'.DS.'index.php',[
               
                            'biscDataAdmin'  =>  $biscDataAdmin, 
                            'skill'          =>  $skill,
                            'education'      => $education,
                            'service'        => $service,
                            'social'         => $social,  
                            'allProject'     => $allProject  

                     ]);

            }//end index

            function portfolioShow($idAdmin,$id){
                   
                   $biscDataAdmin = $this->userModel->selectDataAdminById($idAdmin); 
                   $social = $this->userModel->getSocialAdminById($idAdmin);
                   $dataProject = $this->userModel->getDataProduct($idAdmin,$id);
                  
                   if(empty($dataProject)){

                        parent::redirct(ERROR_CONTROLLER_REDIRCT.'Error/notFound');die;

                   }
                   
                   parent::view('portfolio'.DS.'portfolio-details.php',[
                              
                            'biscDataAdmin'=> $biscDataAdmin,
                            'social'       => $social,
                            'dataProject' => $dataProject

                   ]);   

            }//end portfolioShow

            function postContact($id){
          
                     $validator = new Validator;
         
      
                     $validation = $validator->make($_POST , [
                                   'name'                  => 'required',
                                   'email'                 => 'required|email',
                                   'subject'                => 'required',
                                   'message'                 => 'required'
                      ]);
           
                       $validation->validate();
                       $validation->fails();
                       $errors = $validation->errors()->firstOfAll();
                      
                       if(empty($errors)){
	
                                 $data = [
                                         
                                      "name"    => $_POST['name'],
                                      "email"   => $_POST['email'],
                                      "subject" => $_POST['subject'],
                                      "message" => $_POST["message"],
                                      "adminId" => $id

                                 ];
                              
                                 $this->userModel->insertContact($data);

                       }//end if
                     
                       parent::redirct(USER_CONTROLLER_REDIRCT.'User/index/'.$id);die;

             }//end postContact

   }//end UserController
   
?> 