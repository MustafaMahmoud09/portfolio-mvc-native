<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
     use PORTFOLIO\models\Authentication\SocialAdminModel;
     use Rakit\Validation\Validator; 
   
   class SocialAdminController extends Controller{
                private SocialAdminModel $socialAdminModel;

                function __construct(){
                          
                           parent::AdminLogin();
                           $this->socialAdminModel = new SocialAdminModel();

                }//end construct

                function index(){

                         $dataAdmin = Session::get(ADMIN_SESSION_KEY);         
                         parent::view('dashboard'.DS.'social-add.php',['dataAdmin'=>$dataAdmin]);     
                
               }//end index

               function postAdd(){

                     if(isset($_POST['addSocial'])){

                                $validator = new Validator;
                    
                 
                                $validation = $validator->make($_POST + $_FILES, [
                                             'title'         => 'required',
                                              'link'           => 'required',
                                 ]);
                    
                                  $validation->validate();
                                  $validation->fails();
                                  $errors = $validation->errors()->firstOfAll();

                                  if(empty($errors)){
                                             
                                                $data =[
                                                     'title'         => $_POST['title'],
                                                     'link'           => $_POST['link'],
                                                     'adminId'        => Session::get(ADMIN_SESSION_KEY)['id']
                                                ];

                                                $this->socialAdminModel->insertSocial($data); 

                                  }//end if
                     
                        }//end if

                     parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
     
           }

           function showItem(){

               $dataAdmin = Session::get(ADMIN_SESSION_KEY);
               $dataSocial = $this->socialAdminModel->getSocialById($dataAdmin['id']); 
     
               parent::view('dashboard'.DS.'social-controll.php',[
           
                           'dataAdmin'     => $dataAdmin,
                           'dataSocial' => $dataSocial

              ]);

         }//end showItem

         function delete($id){
                         
              $this->socialAdminModel->delete($id);
              parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SocialAdmin/showItem');

        }//end delete

         function update($id){
                        
                   $dataSocial = $this->socialAdminModel->getSocialByIdSocial($id);  
                   $dataAdmin = Session::get(ADMIN_SESSION_KEY);
              
                  if(!empty($dataSocial)){
                         
                        parent::view('dashboard'.DS.'social-update.php',[
                     
                             'dataSocial'    =>$dataSocial,
                             'dataAdmin'    =>$dataAdmin

                       ]
                      );die;      

                  }//end if

                 parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SocialAdmin/showItem');  

         }//end update

         function postUpdate($id){

             if(isset($_POST['updateSocial'])){
  
                      $validator = new Validator;
          
       
                      $validation = $validator->make($_POST , [
 
                                   'title'         => 'required',
                                    'link'         => 'required',
                                  
                       ]);
          
                        $validation->validate();
                        $validation->fails();
                        $errors = $validation->errors()->firstOfAll();
                     
                        if(empty($errors)){
                                   
                                      $where =[
                                           
                                            'id'     => $id    
 
                                      ];
                                      $data =[
                                           'title'         => $_POST['title'],
                                           'link'           => $_POST['link'],
                                           'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                     ];
                                    
                                     $this->socialAdminModel->updateSocial($data,$where);
                        
                        }//end postAdd
              }
 
              parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SocialAdmin/showItem');
       
        }//end postUpdate
   }//end socailAdminController
   
?> 