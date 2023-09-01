<?php
   //import
   namespace PORTFOLIO\core;

   class App{
          
           private $parentFolderController = '';
           private $childFolderController = '';
           private $controller = ''; 
           private $method = '';
           private $params = [];
           function __construct(){
                   
                    $this->url();
                    $this->render();         
             
           }//end construct     
         
           private function url(){
                 
                    $queryString = $_SERVER['QUERY_STRING'];
                    
                    if(!empty($queryString)){
                            
                              $url = explode('/',$queryString);  
                            
                              $this->parentFolderController = (isset($url[0])) ? $url[0] : '' ;
                              $this->childFolderController = (isset($url[1])) ? $url[1] : '' ;
                              $this->controller = (isset($url[2])) ? $url[2].'Controller' : '' ;
                              $this->method = (isset($url[3])) ? $url[3] : '' ;
                              
                              unset($url[0],$url[1],$url[2],$url[3]);

                              $this->params = array_values($url);

                    }//end if 

           }//end url

           private function render(){
                  
                     $check = true;

                     if($this->parentFolderController === PARENT_CONTROLLER_FOLDER_NAME){
                                    
                               if(file_exists(CONTROLLERS.DS.$this->childFolderController)){
                                          
                                          $this->controller =
                                             'PORTFOLIO\\'.PARENT_CONTROLLER_FOLDER_NAME.'\\'.$this->childFolderController.'\\'.$this->controller;
                                          
                                          if(class_exists($this->controller)){
                                                    
                                                    $this->controller = new $this->controller;   
                                            
                                                    if(method_exists($this->controller,$this->method)){

                                                           call_user_func_array([$this->controller,$this->method]
                                                                                                   ,$this->params); 

                                                   }//end if
                                                    
                                                    else{
                                                          
                                                          $check = false; 

                                                  }//end else
                                                   
                                         }//end if
       
                                          else{

                                                $check = false;

                                        }//end else

                               }//end if      
                                
                               else{

                                      $check = false;       
                                             
                            }//end else 

                     }//end if   
                       
                     else{
                                
                            $check = false;

                     }//end else 

                     if(!$check){
                                                                          
                             $this->setErrorNotFound();
                             call_user_func_array([$this->controller,$this->method],$this->params);

                     }//end if

           }//end render

           function setErrorNotFound(){
                          
                     $this->controller =
                                    new ("PORTFOLIO\controllers\Error\ErrorController");
                     $this->method = 'notFound';
                     $this->params = [];

           }//end setErrorNotFound 

   }//end App





?>