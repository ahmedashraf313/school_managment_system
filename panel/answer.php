<?php

require_once "connection/conn.php";


class answer extends connection
{


function __construct(){

			
	       parent::__construct();
	       
		        }
    


 function add_answer(){
         
         $name=func_get_arg(0);
         $question_id=func_get_arg(1); 
         
			$stmt = $this->DBC->prepare("INSERT INTO answers ( name,question_id) VALUES (:var1,:var2)");
			$stmt->bindParam(':var1', $name);
			$stmt->bindParam(':var2', $question_id);
			
			$stmt->execute();
                     }  
   

  function edit_answer(){
         
         $id=func_get_arg(0);
         $name=func_get_arg(1);
         $question_id=func_get_arg(2); 

         
         
          $stmt = $this->DBC->prepare("UPDATE  answers SET name=:name, question_id=:question_id WHERE id=:id");
          $stmt->bindParam(':name', $name);
          $stmt->bindParam(':question_id', $question_id);
          $stmt->bindParam(':id', $id);
          
          $stmt->execute();
  

                         }  

 function delete_answer(){
        
       $id=func_get_arg(0);
       
        $stmt = $this->DBC->prepare("DELETE  FROM  answers  WHERE id=:id");
          
          $stmt->bindParam(':id', $id);
          
          $stmt->execute();



 }

 
 

  }
  ?>