<?php
   
   namespace PORTFOLIO\controllers\Authentication;
   use PORTFOLIO\core\Controller;
   use PORTFOLIO\models\Authentication\AboutAdminModel;
   use Rakit\Validation\Validator; 
   use PORTFOLIO\core\Session;  
   class AboutAdminController extends Controller{
                  
                  private AboutAdminModel $aboutAdminModel; 
                  function __construct(){

                          parent::AdminLogin();
                          $this->aboutAdminModel = new AboutAdminModel();

                  }//end construct 
                  function index($id){
                           
                           $dataAdmin = $this->aboutAdminModel->getDataAdmin($id); 
                           parent::view('dashboard'.DS.'about-edit.php',['dataAdmin'=>$dataAdmin]);

                  }//end index

                  function postUpdate(){
                               
                            if(isset($_POST['updateDataAdmin'])){

                                          $validator = new Validator;
                              
                           
                                          $validation = $validator->make($_POST , [
                                                       'name'                  => 'required',
                                                       'email'                 => 'required|email',
                                                        'title'                => 'required',
                                                        'city'                 => 'required',
                                                       'country'               => 'required',
                                                        'phone'                => 'required',
                                                       'description'           => 'required',  
                                                        'degree'              => 'required',
                                           ]);
                              
                                            $validation->validate();
                                            $validation->fails();
                                            $errors = $validation->errors()->firstOfAll();
                                             
                                            if(empty($errors)){
                                                  
                                                     $data = [
                                                           'name'         =>     $_POST['name'],
                                                           'email'        =>     $_POST['email'],
                                                           'phoneNumber'  =>     $_POST['phone'],
                                                       ];

                                                       $dataAbout = [
                                                            'title'       =>     $_POST['title'],
                                                            'city'        =>     $_POST['city'],
                                                            'country'     =>     $_POST['country'],
                                                            'description' =>     $_POST['description'],
                                                            'degree'      =>     $_POST['degree']
                                                       ];
                                                    
                                                       if(
                                                         
                                                            parent::checkImage($_FILES['profile']['type'])
                                                      ){

                                                            $nameImage = parent::getUniqueNameImage($_FILES['profile'],'profile','');
                                                            $dataAbout['imageProfile'] = $nameImage;          
                                                      
                                                      }

                                                      $this->aboutAdminModel->updateDataAdmin($data,$dataAbout,
                                                               ['id'=>Session::get(ADMIN_SESSION_KEY)['id']]);
                                                       
                                            }//end if
                              }//end if
                             
                              parent::redirct(AUTHENTICATION_CONTROLLER_REDIRCT.'HomeAdmin/index'); 
                  }//end postUpdate

   }//end AboutAdminController 
   
?>   