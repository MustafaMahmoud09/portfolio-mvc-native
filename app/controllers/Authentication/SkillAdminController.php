<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\SkillAdminModel;
   use Rakit\Validation\Validator; 
   
   class SkillAdminController extends Controller{
                 
                private SkillAdminModel $skillAdminModel;
                function __construct(){
                        
                             parent::AdminLogin();
                             $this->skillAdminModel = new SkillAdminModel();
                       
                }//end construct
                function index(){
                          $dataAdmin = Session::get(ADMIN_SESSION_KEY);                               
                          parent::view('dashboard'.DS.'skill-add.php',[
                                 'dataAdmin' => $dataAdmin
                          ]);      

                }//end index   

                function postAdd(){

                            if(isset($_POST['addSkill'])){

                                          $validator = new Validator;
                              
                           
                                          $validation = $validator->make($_POST , [
                                                       'title'         => 'required',
                                                        'ratio'           => 'required',
                                           ]);
                              
                                            $validation->validate();
                                            $validation->fails();
                                            $errors = $validation->errors()->firstOfAll();

                                            if(empty($errors)){
                                                       
                                                          $data =[
                                                               'title'         => $_POST['title'],
                                                               'ratio'           => $_POST['ratio'],
                                                               'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                                         ];
                                                        
                                                         $this->skillAdminModel->insertSkill($data);

                                            }//end if
                               }//end if

                               parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
               
                  }
                  function showItem(){

                     $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                     $dataSkill = $this->skillAdminModel->getSkillById($dataAdmin['id']); 
              
                     parent::view('dashboard'.DS.'skill-controll.php',[
                    
                                    'dataAdmin'     => $dataAdmin,
                                    'dataSkill' => $dataSkill
  
                    ]);
  
                }//end showItem

              function delete($id){
                         
                     $this->skillAdminModel->delete($id);
                     parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SkillAdmin/showItem');
 
              }//end delete

             function update($id){
                        
                   $dataSkill = $this->skillAdminModel->getSkillByIdSkill($id);  
                   $dataAdmin = Session::get(ADMIN_SESSION_KEY);
              
                  if(!empty($dataSkill)){
                         
                        parent::view('dashboard'.DS.'skill-update.php',[
                     
                             'dataSkill'=>$dataSkill,
                             'dataAdmin'    =>$dataAdmin

                       ]
                      );die;      

                  }//end if

                 parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SkillAdmin/showItem');  

         }//end update


     function postUpdate($id){

           if(isset($_POST['updateSkill'])){

                     $validator = new Validator;
         
      
                     $validation = $validator->make($_POST , [

                                  'title'         => 'required',
                                   'ratio'         => 'required',
                                 
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
                                          'ratio'           => $_POST['ratio'],
                                          'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                    ];
                                   
                                    $this->skillAdminModel->updateSkill($data,$where);
                       }//end postAdd
             }

             parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'SkillAdmin/showItem');
      
       }//end postUpdate

       
    }//end SkillAdminController
   
?> 