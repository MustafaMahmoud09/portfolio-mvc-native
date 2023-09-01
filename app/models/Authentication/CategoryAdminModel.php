<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class CategoryAdminModel extends Model{

                function insertCategory($data){

                        try{
                 
                               parent::connection()->insert('category',$data);

                        }//end try
            
                        catch(Exception){}

                }//end insertCategory 

                function getCategoryById($id){
                           
                     try{

                              return parent::connection()->run("SELECT * FROM category WHERE adminId = ?", [$id])
                                                 ->fetchAll(PDO::FETCH_ASSOC);

                     }//end try

                     catch(Exception){}//end catch

              }//end 

              function delete($id){
                          
                   try{
                         parent::connection()->delete('project',[
 
                                       'categoryId' => $id  

                         ]);    
                         parent::connection()->deleteById('category', $id);

                    }//end try
                
                   catch(Exception){}//end catch

           }//end delete

           function getCategoryByIdCategory($id){
                           
                  try{

                        return parent::connection()->run("SELECT * FROM category WHERE id = ?", [$id])
                                                        ->fetch(PDO::FETCH_ASSOC);

                  }//end try

                 catch(Exception){}//end catch

        }//end

        function updateCategory($data,$where){

               try{

                       parent::connection()->update('category', $data, $where);  

               }//end try
            
              catch(Exception){}//end catch

      }//end updateEducation

    }//end AboutAdminModel


?>