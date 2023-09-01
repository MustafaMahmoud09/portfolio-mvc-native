<?php
    //import
    namespace PORTFOLIO\models\User;
    use Exception;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class UserModel extends Model{
               
                function selectDataAdminById($id){
                                
                                try{  

                                        return parent::connection()->run("SELECT * FROM admin_view WHERE id = ?"
                                                                       , [$id])->fetch();
                            
                                }//end try 
                                
                                catch(Exception){}//end catch

                }//end selectDataAdminById  
                
                function getSkillAdminById($id){
                  
                        try{  

                              return parent::connection()->run("SELECT * FROM skill WHERE adminId = ?"
                                                       , [$id])->fetchAll(PDO::FETCH_ASSOC);
            
                        }//end try 
                
                        catch(Exception){}//end catch

                }//end getSkillAdminById
                function getEducationAdminById($id){
                  
                    try{  

                          return parent::connection()->run("SELECT * FROM education WHERE adminId = ?"
                                                   , [$id])->fetchAll(PDO::FETCH_ASSOC);
        
                    }//end try 
            
                    catch(Exception){}//end catch

            }//end getSkillAdminById

            function getServiceAdminById($id){
                  
                try{  

                      return parent::connection()->run("SELECT * FROM service WHERE adminId = ?"
                                               , [$id])->fetchAll(PDO::FETCH_ASSOC);
    
                }//end try 
        
                catch(Exception){}//end catch

        }//end getSkillAdminById

        function getSocialAdminById($id){
                  
            try{  

                  return parent::connection()->run("SELECT * FROM social WHERE adminId = ?"
                                           , [$id])->fetchAll(PDO::FETCH_ASSOC);

            }//end try 
    
            catch(Exception){}//end catch

     }//end getSkillAdminById
   
     function getAllDataProduct($adminId){

          try{  

                   return parent::connection()->run("SELECT * FROM project_view WHERE adminId = ?"
                                             , [$adminId])->fetchAll(PDO::FETCH_ASSOC);

            }//end try 
  
            catch(Exception){}//end catch          

     }//end getAllDataProduct 

     function getDataProduct($adminId,$id){

        try{  

                 return parent::connection()->run("SELECT * FROM project_view WHERE adminId = ? AND id = ?"
                                           , [$adminId,$id])->fetch(PDO::FETCH_ASSOC);

          }//end try 

          catch(Exception){}//end catch          

      }//end getAllDataProduct 

      function insertContact($data){
               
              try{
        
                     parent::connection()->insert('contact',$data);

              }//end try
   
              catch(Exception){}
     
       }//end insertEducation

   }//end AboutAdminModel


?>