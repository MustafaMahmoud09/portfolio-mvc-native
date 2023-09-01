<?php
     //import
     namespace PORTFOLIO\core;
    
     class Controller{
             
              protected function AdminLogin(){
                           
                         Session::startSession(); 

                         if(!Session::itemExist(ADMIN_SESSION_KEY)){
                                      
                                $this->redirct(AUTHORIZATION_CONTROLLER_REDIRCT.'AuthorizationAdmin/login');die;        

                         }//end if
          
              }//end AdminLogin

              protected function getUniqueNameImage($file,$typePage,$number){

                          $type = explode('/',$file['type']);

                          $biscImage =Session::get(ADMIN_SESSION_KEY)['id']
                                         .$typePage.$number.'.'.$type[1];
                                            
                          $nameImage =UPLOAD_GET.$biscImage;

                          move_uploaded_file($file['tmp_name']
                                                  ,UPLOAD_SET.DS.$biscImage);
                          
                          return $nameImage;                        

              }//end getUniqueNameImage
              protected function view(string $path,array $data = []){
                                       
                         extract($data);       
                         require_once VIEWS.DS.$path;

              }//end view
              
              function checkImage($type){
                             
                     if( explode('/',$type)[0] == 'image'){
                                     
                              return true;
                              
                     } 
                     
              }//end checkImage
              protected function redirct(String $path){
                        
                        header("location:".DOMAIN.$path); 

              }//end redirct

     }//end Controller

?>