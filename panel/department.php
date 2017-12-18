<?php

require_once "connection/conn.php";


class department extends connection
{


function __construct(){

			
	       parent::__construct();
	       
		        }
    

 function get_id(){
     $name=func_get_arg(0);
     
     $prepare ='SELECT * FROM departments  ';
     $stmt= $this->DBC->prepare($prepare);
     $stmt->execute();
     while($data = $stmt->fetch( PDO::FETCH_ASSOC) ){
     	if($data['name']==$name)
     return $data['id'];
           }
           }



 function add_department(){
         
         $name=func_get_arg(0);
         $section_id=func_get_arg(1); 
         
			$stmt = $this->DBC->prepare("INSERT INTO departments ( name,section_id) VALUES (:var1,:var2)");
			$stmt->bindParam(':var1', $name);
			$stmt->bindParam(':var2', $section_id);
			
			$stmt->execute();
                     }  
   
    function edit_department(){
         
         $id=func_get_arg(0);
         $name=func_get_arg(1); 
         $section_id=func_get_arg(2);
         
			$stmt = $this->DBC->prepare("UPDATE departments set name=:name , section_id=:section_id where id=:id");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':section_id', $section_id);
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
                     }  

 

    function delete_department(){
         
         $id=func_get_arg(0);
        
         
			$stmt = $this->DBC->prepare("DELETE FROM  departments  where id=:id");
	
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
                     }  
  }
  ?>
