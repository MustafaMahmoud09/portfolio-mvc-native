<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class ContactAdminModel extends Model{
        function getContactAdminById($id){
                  
            try{  

                return parent::connection()->run("SELECT * FROM contact WHERE adminId = ?"
                                 , [$id])->fetchAll(PDO::FETCH_ASSOC);

            }//end try 

            catch(Exception){}//end catch

      }//end getSkillAdminById

      function delete($id){
                          
           try{
                     
                parent::connection()->deleteById('contact', $id);

           }//end try
        
           catch(Exception){}//end catch

     }//end delete


    }//end AboutAdminModel


?>