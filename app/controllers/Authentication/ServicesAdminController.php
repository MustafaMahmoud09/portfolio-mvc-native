<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\core\Session;
   use PORTFOLIO\models\Authentication\ServicesAdminModel;
   use Rakit\Validation\Validator;
   
   class ServicesAdminController extends Controller{
                   
                  private ServicesAdminModel $serviceAdminModel;
                  function __construct(){

                            parent::AdminLogin();       
                            $this->serviceAdminModel = new ServicesAdminModel();

                  }//end construct 
                  function index(){
                           
                           $dataAdmin = Session::get(ADMIN_SESSION_KEY);  
                           parent::view('dashboard'.DS.'service-add.php',['dataAdmin'=>$dataAdmin]);    

                  }//end index

                  function postAdd(){

                     if(isset($_POST['addService'])){

                                $validator = new Validator;
                    
                 
                                $validation = $validator->make($_POST + $_FILES, [
                                             'title'         => 'required',
                                              'description'           => 'required',
                                 ]);
                    
                                  $validation->validate();
                                  $validation->fails();
                                  $errors = $validation->errors()->firstOfAll();

                                  if(empty($errors)){
                                                     

                                                $data =[
                                                     'title'         => $_POST['title'],
                                                     'description'           => $_POST['description'],
                                                      'adminId'        => Session::get(ADMIN_SESSION_KEY)['id']
                                                ];

                                                $this->serviceAdminModel->insertService($data); 

                                  }//end if
                     
                        }//end if

                     parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
     
        }

        function showItem(){

              $dataAdmin = Session::get(ADMIN_SESSION_KEY);
              $dataService = $this->serviceAdminModel->getServiceById($dataAdmin['id']); 
  
              parent::view('dashboard'.DS.'service-controll.php',[
        
                        'dataAdmin'     => $dataAdmin,
                        'dataService' => $dataService

              ]);

        }//end showItem

        function delete($id){
                         
               $this->serviceAdminModel->delete($id);
               parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ServicesAdmin/showItem');

       }//end delete

       function update($id){
                        
            $dataService = $this->serviceAdminModel->getServiceByIdService($id);  
            $dataAdmin = Session::get(ADMIN_SESSION_KEY);
            
           if(!empty($dataService)){
               
                parent::view('dashboard'.DS.'service-update.php',[
           
                      'dataService'    =>$dataService,
                      'dataAdmin'    =>$dataAdmin

                ]
               );die;      

           }//end if

           parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ServicesAdmin/showItem');  

     }//end update

          function postUpdate($id){

               if(isset($_POST['updateService'])){

                     $validator = new Validator;
         
      
                     $validation = $validator->make($_POST , [

                                  'title'         => 'required',
                                   'description'         => 'required',
                                 
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
                                          'description'           => $_POST['description'],
                                          'adminId'             => Session::get(ADMIN_SESSION_KEY)['id']
                                    ];
                                   
                                    $this->serviceAdminModel->updateService($data,$where);
                       }//end postAdd
                 }

                 parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'ServicesAdmin/showItem');
      
       }//end postUpdate

   }//end ServicesAdminController
   
?> 