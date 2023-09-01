<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\ProjectAdminModel;
   use Rakit\Validation\Validator; 
   
   class ProjectAdminController extends Controller{
               private ProjectAdminModel $projectAdminModel;

               function __construct(){
                    
                        parent::AdminLogin();
                        $this->projectAdminModel = new ProjectAdminModel(); 

               }//end construct

               function index(){
                           
                           $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                           $dataCategory = $this->projectAdminModel->
                                           getCategoryById($dataAdmin['id']);
                           parent::view('dashboard'.DS.'project-add.php',[
                                   'dataCategory' => $dataCategory,
                                   'dataAdmin' => $dataAdmin  
                           ]);      

                }//end index   
                
                function postAdd(){

                  if(isset($_POST['addProject'])){
            
                             $validator = new Validator;
                 
              
                             $validation = $validator->make($_POST + $_FILES, [
                                          'title'         => 'required',
                                           'description'           => 'required',
                                           'date'         => 'required',
                                           'category'           => 'required'
                              ]);
                 
                               $validation->validate();
                               $validation->fails();
                               $errors = $validation->errors()->firstOfAll();
                               if(empty($errors)&&parent::checkImage($_FILES['icon']['type'])){
                                 
                                            $imageName = parent::getUniqueNameImage($_FILES['icon'],'project',
                                                                 $this->projectAdminModel->getIdLastProject()+1);           
                                                           
                                             $data =[
                                                  'title'         => $_POST['title'],
                                                  'description'   => $_POST['description'],
                                                  'date'          => $_POST['date'],
                                                  'categoryId'    => $_POST['category'],
                                                  'icon'          => $imageName,
                                                  'adminId'        => Session::get(ADMIN_SESSION_KEY)['id']
                                             ];
                                             
                                             $this->projectAdminModel->insertProject($data); 

                               }//end if
                  
                     }//end if

                  parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
  
         }

         function showItem(){

            $dataAdmin = Session::get(ADMIN_SESSION_KEY);
            $dataProject = $this->projectAdminModel->getProjectById($dataAdmin['id']); 
     
            parent::view('dashboard'.DS.'project-controll.php',[
           
                           'dataAdmin'     => $dataAdmin,
                           'dataProject' => $dataProject

           ]);

       }//end showItem

       function delete($id){
                         
               $this->projectAdminModel->delete($id);
               parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ProjectAdmin/showItem');

      }//end delete


      function update($id){
                        
           $dataProject = $this->projectAdminModel->getProjectByIdProject($id);  
           $dataAdmin = Session::get(ADMIN_SESSION_KEY);
           $dataCategory = $this->projectAdminModel->
           getCategoryById($dataAdmin['id']);
    
           if(!empty($dataProject)){
               
                parent::view('dashboard'.DS.'project-update.php',[
           
                   'dataProject'=>$dataProject,
                   'dataAdmin'    =>$dataAdmin,
                   'dataCategory' => $dataCategory

                ]
                );die;      

            }//end if

           parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ProjectAdmin/showItem');  

    }//end update


    function postUpdate($id){

       if(isset($_POST['updateProject'])){
            
           $validator = new Validator;


            $validation = $validator->make($_POST + $_FILES, [
                         'title'         => 'required',
                         'description'           => 'required',
                          'date'         => 'required',
                         'category'           => 'required'
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
                              'description'   => $_POST['description'],
                              'date'          => $_POST['date'],
                              'categoryId'    => $_POST['category'],
                              'adminId'        => Session::get(ADMIN_SESSION_KEY)['id']
                         ];

                         if(parent::checkImage($_FILES['icon']['type'])){
                                   
                              $imageName = parent::getUniqueNameImage($_FILES['icon'],'project',
                              $this->projectAdminModel->getIdLastProject()+1); 

                              $data['icon'] = $imageName;

                         }
                         
                         $this->projectAdminModel->updateProject($data,$where); 

             }//end if

         }//end if

           parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ProjectAdmin/showItem');

    }//end postUpdate


   }//end ProjectAdminController
   
?> 