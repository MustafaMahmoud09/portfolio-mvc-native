<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\EducationAdminModel;
   use Rakit\Validation\Validator; 
   
   class EducationAdminController extends Controller{
              
               private EducationAdminModel $educationAdminModel; 
               function __construct(){

                        parent::AdminLogin();
                        $this->educationAdminModel = new EducationAdminModel();

               }//end construct
                  
               function index(){
                          
                        $dataAdmin = Session::get(ADMIN_SESSION_KEY); 
                        parent::view('dashboard'.DS.'education-add.php',['dataAdmin'=>$dataAdmin]);        

               }//end index

               function postAdd(){
                            if(isset($_POST['addEducation'])){

                                          $validator = new Validator;
                              
                           
                                          $validation = $validator->make($_POST , [
                                                       'specialization'         => 'required',
                                                        'institution'           => 'required',
                                                        'description'           => 'required',
                                                         'time'                 => 'required',
                                           ]);
                              
                                            $validation->validate();
                                            $validation->fails();
                                            $errors = $validation->errors()->firstOfAll();

                                            if(empty($errors)){
                                                       
                                                          $data =[
                                                               'specialization'         => $_POST['specialization'],
                                                               'institution'           => $_POST['institution'],
                                                               'description'           => $_POST['description'],
                                                               'time'                 => $_POST['time'],
                                                               'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                                         ];
                                                        
                                                         $this->educationAdminModel->insertEducation($data);
                                            }//end postAdd
                               }

                               parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
               
            }//end postAdd
   
            
            function showItem(){

                   $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                   $dataEducation = $this->educationAdminModel->getEducationAdminById($dataAdmin['id']); 
                   parent::view('dashboard'.DS.'education-controll.php',[
                  
                                  'dataAdmin'     => $dataAdmin,
                                  'dataEducation' => $dataEducation

                  ]);

            }//end showItem

            function delete($id){
                         
                    $this->educationAdminModel->delete($id);
                    parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'EducationAdmin/showItem');

            }//end delete

            function update($id){
                        
                     $dataEducation = $this->educationAdminModel->getEducationByIdEducation($id);  
                     $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                     
                     if(!empty($dataEducation)){
                                
                          parent::view('dashboard'.DS.'education-update.php',[
                            
                                'dataEducation'=>$dataEducation,
                                'dataAdmin'    =>$dataAdmin
                          ]
                        );die;      

                     }//end if

                     parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'EducationAdmin/showItem');  

            }//end update

            function postUpdate($id){

                            if(isset($_POST['UpdateEducation'])){

                                          $validator = new Validator;
                              
                           
                                          $validation = $validator->make($_POST , [
                                                       'specialization'         => 'required',
                                                        'institution'           => 'required',
                                                        'description'           => 'required',
                                                         'time'                 => 'required',
                                           ]);
                              
                                            $validation->validate();
                                            $validation->fails();
                                            $errors = $validation->errors()->firstOfAll();

                                            if(empty($errors)){
                                                       
                                                          $where =[
                                                               
                                                                'id'     => $id    

                                                          ];
                                                          $data =[
                                                               'specialization'         => $_POST['specialization'],
                                                               'institution'           => $_POST['institution'],
                                                               'description'           => $_POST['description'],
                                                               'time'                 => $_POST['time'],
                                                               'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                                         ];
                                                        
                                                         $this->educationAdminModel->updateEducation($data,$where);
                                            }//end postAdd
                               }

                               parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'EducationAdmin/showItem');
            }//end postUpdate

   }//end EducationAdminController
   
?> 