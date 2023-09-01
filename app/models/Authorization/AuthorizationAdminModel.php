<?php
    //import
    namespace PORTFOLIO\models\Authorization;
    use Exception;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class AuthorizationAdminModel extends Model{

             function login($email,$password){
                     
                     try{

                              $data = parent::connection()->run("SELECT * FROM admin WHERE 
                                                                   email = ? AND password = ?", 
                                                                   [$email,$password])->fetch(PDO::FETCH_ASSOC);
                              if(!empty($data)){
                                    
                                    return parent::connection()->run("SELECT * FROM admin_view WHERE id = ?", 
                                          [$data['id']])->fetch(PDO::FETCH_ASSOC);
                                      
                              }//end if 
                              
                     }//end try

                     catch(Exception){}//end catch
                        
            }//end login 

    }//end AboutAdminModel


?>