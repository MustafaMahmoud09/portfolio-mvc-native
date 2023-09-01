<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use Exception;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class EducationAdminModel extends Model{
                          
                   function insertEducation($data){
                                
                                  try{
                                        parent::connection()->insert('education',$data);

                                  }//end try
                                  
                                  catch(Exception){}
                   }//end insertEducation

                   function getEducationAdminById($id){
                  
                              try{  

                                  return parent::connection()->run("SELECT * FROM education WHERE adminId = ?"
                                                   , [$id])->fetchAll(PDO::FETCH_ASSOC);
        
                              }//end try 
              
                              catch(Exception){}//end catch

                }//end getSkillAdminById

                function delete($id){
                          
                           try{
                                        
                                   parent::connection()->deleteById('education', $id);

                           }//end try
                           
                           catch(Exception){}//end catch

                }//end delete

                function getEducationByIdEducation($id){
                           
                          try{
 
                                    return parent::connection()->run("SELECT * FROM education WHERE id = ?", [$id])->fetch(PDO::FETCH_ASSOC);

                          }//end try

                          catch(Exception){}//end catch

                }//end

                function updateEducation($data,$where){

                         try{

                                   parent::connection()->update('education', $data, $where);  

                         }//end try
                         
                         catch(Exception){}//end catch

                }//end updateEducation

    }//end AboutAdminModel


?>