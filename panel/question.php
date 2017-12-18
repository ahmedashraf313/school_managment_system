<?php

require_once "connection/conn.php";


class question extends connection
{


function __construct(){

			
	       parent::__construct();
	       
		        }
    

 function get_id(){
     $name=func_get_arg(0);
     
     $prepare ='SELECT * FROM questions  ';
     $stmt= $this->DBC->prepare($prepare);
     $stmt->execute();
     while($data = $stmt->fetch( PDO::FETCH_ASSOC) ){
     	if($data['name']==$name)
     return $data['id'];
           }
           }



 function add_question(){
         
         $name=func_get_arg(0);
         $lesson_id=func_get_arg(1); 
         
    			$stmt = $this->DBC->prepare("INSERT INTO questions ( name,lesson_id) VALUES (:var1,:var2)");
    			$stmt->bindParam(':var1', $name);
    			$stmt->bindParam(':var2', $lesson_id);
    			
    			$stmt->execute();
                         }  

  function edit_question(){
         
         $id=func_get_arg(0);
         $name=func_get_arg(1);
         $lesson_id=func_get_arg(2); 


         
          $stmt = $this->DBC->prepare("UPDATE  questions SET name=:name, lesson_id=:lesson_id WHERE id=:id");
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':lesson_id', $lesson_id);
          $stmt->bindParam(':id', $id);
          
          $stmt->execute();
                         }  


  function delete_question(){

          $id=func_get_arg(0);

          $stmt = $this->DBC->prepare("DELETE FROM questions  WHERE id=:id");
          $stmt->bindParam(':id', $id);
          
          $stmt->execute();
          
          

  }                                              
  


  }
  ?>