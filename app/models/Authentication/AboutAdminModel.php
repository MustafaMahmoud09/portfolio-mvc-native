<?php
    //import
    namespace PORTFOLIO\models\Authentication;
    use Exception;
    use PDO;
    use PORTFOLIO\core\Model;
    
    class AboutAdminModel extends Model{
                 
              function getDataAdmin($id){
                        
                       try{

                                 return parent::connection()->run("SELECT * FROM admin_view WHERE id = ?", 
                                 [$id])->fetch(PDO::FETCH_ASSOC);      

                        }//end try

                        catch(Exception){  }//end catch
                       
              }//end getDataAdmin

              function updateDataAdmin($data,$dataAbout,$where){
                                 
                                $whereAbout = [
                                       'adminId' => $where['id'] 
                                ];  

                                parent::connection()->update('admin', $data, $where); 
                                parent::connection()->update('about', $dataAbout, $whereAbout); 

              }//end updateDataAdmin 

    }//end AboutAdminModel

?>