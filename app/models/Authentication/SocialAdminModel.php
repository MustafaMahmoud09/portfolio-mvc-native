<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use Exception;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class SocialAdminModel extends Model{
                        
                 function getIdLastSocail(){
                                   
                            $data = parent::connection()->run("SELECT * FROM social")->fetchAll();
                                     
                            if(count($data)>0){

                                    return $data[count($data)-1]['id'];  
                                    
                            }else{
                                     
                                    return 0;

                            }
                             
                    }//end getAllDataSocial

                    function insertSocial($data){
                                
                        try{
                        
                               parent::connection()->insert('social',$data);
       
                        }//end try
                   
                        catch(Exception){}
                     
                 }//end insertEducation

                 function getSocialById($id){
                           
                        try{
   
                                  return parent::connection()->run("SELECT * FROM social WHERE adminId = ?", [$id])
                                                     ->fetchAll(PDO::FETCH_ASSOC);
   
                        }//end try
   
                        catch(Exception){}//end catch
   
                 }//end 

                 function delete($id){
                          
                        try{
                                     
                                parent::connection()->deleteById('social', $id);
   
                        }//end try
                        
                        catch(Exception){}//end catch
   
                }//end delete

             function getSocialByIdSocial($id){
                           
                   try{
  
                          return parent::connection()->run("SELECT * FROM social WHERE id = ?", [$id])
                                                     ->fetch(PDO::FETCH_ASSOC);
  
                   }//end try
  
                  catch(Exception){}//end catch
  
            }//end

            function updateSocial($data,$where){

                try{
  
                          parent::connection()->update('social', $data, $where);  
  
                }//end try
                
                catch(Exception){}//end catch
  
          }//end updateEducation
    }//end AboutAdminModel


?>