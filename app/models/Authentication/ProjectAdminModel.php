<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class ProjectAdminModel extends Model{
                       
               function getCategoryById($id){
             
                      try{  

                          return parent::connection()->run("SELECT * FROM category WHERE adminId = ?"
                                             , [$id])->fetchAll(PDO::FETCH_ASSOC);
  
                      }//end try 
      
                     catch(Exception){}//end catch                   
                  
                }//end getCategoryById
                  
                function getIdLastProject(){
                                   
                    $data = parent::connection()->run("SELECT * FROM project")->fetchAll();
                             
                    if(count($data)>0){

                            return $data[count($data)-1]['id'];  
                            
                    }else{
                             
                            return 0;

                    }
                     
            }//end getAllDataSocial

            function insertProject($data){

                try{
                
                       parent::connection()->insert('project',$data);

                }//end try
           
                catch(Exception){echo 22;die;}
             
         }//end insertEducation

         function getProjectById($id){
             
               try{
   
                      return parent::connection()->run("SELECT * FROM project WHERE adminId = ?", [$id])
                                            ->fetchAll(PDO::FETCH_ASSOC);

               }//end try

               catch(Exception){}//end catch

         }

         function delete($id){
                          
                try{
                         
                    parent::connection()->deleteById('project', $id);

                }//end try
            
                catch(Exception){}//end catch

        }//end delete
                
        function getProjectByIdProject($id){

               try{
 
                    return parent::connection()->run("SELECT * FROM project WHERE id = ?", [$id])
                                                             ->fetch(PDO::FETCH_ASSOC);

               }//end try

              catch(Exception){}//end catch

        }//end getProjectByIdProject

        function updateProject($data,$where){
            
            try{

                      parent::connection()->update('project', $data, $where);  

            }//end try
            
            catch(Exception){}//end catch

   }//end updateEducation

    }//end AboutAdminModel


?>