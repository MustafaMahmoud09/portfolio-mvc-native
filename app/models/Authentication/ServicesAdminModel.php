<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class ServicesAdminModel extends Model{

                            
                 function getIdLastService(){
                                   
                              $data = parent::connection()->run("SELECT * FROM service")->fetchAll();
                     
                              if(count($data)>0){

                                         return $data[count($data)-1]['id'];  
                    
                               }else{
                     
                                           return 0;

                                }
             
                   }//end getAllDataSocial

                    function insertService($data){
                
                                 try{
        
                                       parent::connection()->insert('service',$data);

                                 }//end try
   
                                 catch(Exception){}
     
                     }//end insertEducation

                     function getServiceById($id){
                           
                         try{
   
                                  return parent::connection()->run("SELECT * FROM service WHERE adminId = ?", [$id])
                                                     ->fetchAll(PDO::FETCH_ASSOC);
   
                         }//end try
   
                         catch(Exception){}//end catch
   
                 }//end  

                 function delete($id){
                          
                      try{
                                 
                              parent::connection()->deleteById('service', $id);

                      }//end try
                    
                      catch(Exception){}//end catch

               }//end delete

               function getServiceByIdService($id){
                           
                   try{
  
                          return parent::connection()->run("SELECT * FROM service WHERE id = ?", [$id])
                                                     ->fetch(PDO::FETCH_ASSOC);
  
                    }//end try
  
                    catch(Exception){}//end catch
  
            }//end

            function updateService($data,$where){

                try{
  
                          parent::connection()->update('service', $data, $where);  
  
                }//end try
                
                catch(Exception){}//end catch
  
          }//end updateEducation
    }//end AboutAdminModel


?>