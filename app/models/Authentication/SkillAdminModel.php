<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class SkillAdminModel extends Model{
                   
          function insertSkill($data){
                                
                 try{
                 
                        parent::connection()->insert('skill',$data);

                 }//end try
            
                 catch(Exception){}
              
                }//end insertEducation

                function getSkillById($id){
                           
                     try{

                               return parent::connection()->run("SELECT * FROM skill WHERE adminId = ?", [$id])
                                                  ->fetchAll(PDO::FETCH_ASSOC);

                     }//end try

                     catch(Exception){}//end catch

              }//end 

              function delete($id){
                          
                     try{
                                  
                             parent::connection()->deleteById('skill', $id);

                     }//end try
                     
                     catch(Exception){}//end catch

          }//end delete

          function getSkillByIdSkill($id){
                           
              try{

                        return parent::connection()->run("SELECT * FROM skill WHERE id = ?", [$id])
                                                   ->fetch(PDO::FETCH_ASSOC);

              }//end try

              catch(Exception){}//end catch

          }//end

          function updateSkill($data,$where){

              try{

                        parent::connection()->update('skill', $data, $where);  

              }//end try
              
              catch(Exception){}//end catch

        }//end updateEducation

    }//end AboutAdminModel


?>