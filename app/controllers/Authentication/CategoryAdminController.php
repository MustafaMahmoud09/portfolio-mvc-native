<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\CategoryAdminModel;
   use Rakit\Validation\Validator;
   
   class CategoryAdminController extends Controller{     
                      private CategoryAdminModel $categoryAdminModel; 
                      function __construct(){
                                  
                                parent::AdminLogin();         
                                $this->categoryAdminModel = new CategoryAdminModel(); 

                      }//end construct 
                      function index(){
                               
                               $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                               parent::view('dashboard'.DS.'category-add.php',['dataAdmin'=>$dataAdmin]);        
                                
                      }//end index

                      function postAdd(){

                         if(isset($_POST['addCategory'])){

                                      $validator = new Validator;
                          
                       
                                      $validation = $validator->make($_POST , [
                                                   'title'         => 'required'
                                       ]);
                          
                                        $validation->validate();
                                        $validation->fails();
                                        $errors = $validation->errors()->firstOfAll();

                                        if(empty($errors)){
                                                   
                                                      $data =[
                                                           'title'         => $_POST['title'],
                                                           'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                                     ];
                                                    
                                                     $this->categoryAdminModel->insertCategory($data);

                                        }//end if
                            }//end if

                            parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
           
                          }

                          function showItem(){

                               $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                               $dataCategory = $this->categoryAdminModel->getCategoryById($dataAdmin['id']); 
                    
                               parent::view('dashboard'.DS.'category-controll.php',[
                          
                                             'dataAdmin'     => $dataAdmin,
                                             'dataCategory'     => $dataCategory
        
                                ]);
        
                        }//end showItem

                        function delete($id){
                         
                                $this->categoryAdminModel->delete($id);
                                parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'CategoryAdmin/showItem');
            
                       }//end delete

                       function update($id){
                        
                           $dataCategory = $this->categoryAdminModel->getCategoryByIdCategory($id);  
                           $dataAdmin = Session::get(ADMIN_SESSION_KEY);
                   
                            if(!empty($dataCategory)){
                              
                                  parent::view('dashboard'.DS.'category-update.php',[
                          
                                           'dataCategory'    =>$dataCategory,
                                           'dataAdmin'    =>$dataAdmin
     
                                    ]
                                 );die;      
     
                            }//end if
     
                            parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'CategoryAdmin/showItem');  
     
                      }//end update
   
                      function postUpdate($id){

                          if(isset($_POST['updateCategory'])){
             
                                  $validator = new Validator;
                      
                   
                                  $validation = $validator->make($_POST , [
             
                                               'title'         => 'required'
                                              
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
                                                       'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                                 ];
                                                
                                                 $this->categoryAdminModel->updateCategory($data,$where);
                                    }//end postAdd
                           }
             
                           parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'CategoryAdmin/showItem');
                   
                    }//end postUpdate
             
   }//end CategoryAdminController 
   
?> 