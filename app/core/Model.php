<?php
     //import
     namespace PORTFOLIO\core;
     use Dcblogdev\PdoWrapper\Database;

     class Model{
              
               protected function connection(){
                       
                        $options = [
                            //required
                            'username' => USERNAME,
                            'database' => DB_NAME,
                             //optional
                            'password' => PASSWORD,
                            'type' => TYPE,
                            'charset' => 'utf8',
                            'host' => HOST,
                            'port' => PORT
                     ];
                    
                     return new Database($options);

                }//end connection 

     }//end Controller

?>