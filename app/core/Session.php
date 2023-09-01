<?php
    //import
    namespace PORTFOLIO\core;
    
    class Session{
          
          static function startSession(){

                  @session_start();       

          }//end startSession

          static function endSession(){
                     
                   @session_destroy();

          }//end endSession

          static function get($key){

                   if(isset($_SESSION[$key])){
                               
                             return $_SESSION[$key];      

                   }//end if 

          }//end get

          static function set($key,$value){
                        
                    $_SESSION[$key] = $value;   

          }//end set

          static function itemExist($key){
                     
                   if(!empty(self::get($key))){
                             
                            return true;      

                   }//end if 

                   return false;

          }//end itemExist       

    }//end Session


 ?>