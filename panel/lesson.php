<?php

require_once "connection/conn.php";


class lesson extends connection
{

function add_lesson(){
         
         $name=func_get_arg(0);
         $department_id=func_get_arg(1); 
         
			$stmt = $this->DBC->prepare("INSERT INTO lessons ( name,department_id) VALUES (:var1,:var2)");
			$stmt->bindParam(':var1', $name);
			$stmt->bindParam(':var2', $department_id);
			
			$stmt->execute();
                     }  

 function edit_lesson(){
         
         $id=func_get_arg(0);
         $name=func_get_arg(1);

         $department_id=func_get_arg(2); 
         
			$stmt = $this->DBC->prepare("UPDATE  lessons set name=:name ,department_id=:department_id WHERE id=:id");
			$stmt->bindParam(':name', $name);
			$stmt->bindParam(':department_id', $department_id);
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
                     }                      
   

function get_id(){
     $name=func_get_arg(0);
     
     $prepare ='SELECT * FROM lessons  ';
     $stmt= $this->DBC->prepare($prepare);
     $stmt->execute();
     while($data = $stmt->fetch( PDO::FETCH_ASSOC) ){
     	if($data['name']==$name)
     return $data['id'];
           }
           }



 function delete_lesson(){
         
         $id=func_get_arg(0);
         

       
			$stmt = $this->DBC->prepare("DELETE FROM  lessons  WHERE id=:id");
			
			$stmt->bindParam(':id', $id);
			
			$stmt->execute();
                     }           


















}?>
