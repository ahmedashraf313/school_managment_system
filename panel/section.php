<?php

require_once "connection/conn.php";


class section extends connection
{



	function __construct(){

			
	       parent::__construct();
	       
		        }



   function add_section(){
         
         $name=func_get_arg(0);
         
			$stmt = $this->DBC->prepare("INSERT INTO sections ( name) VALUES (:var1)");
			$stmt->bindParam(':var1', $name);
			
			$stmt->execute();
                     }  
   
   function get_id(){
     $name=func_get_arg(0);
     
     $prepare ='SELECT * FROM sections  ';
     $stmt= $this->DBC->prepare($prepare);
     $stmt->execute();
     while($data = $stmt->fetch( PDO::FETCH_ASSOC) ){
     	if($data['name']==$name)
     return $data['id'];
           }
           }


   function edit_section(){
           

 	     $id=func_get_arg(0);
 	     $name=func_get_arg(1);
         

         $stmt = $this->DBC->prepare("UPDATE sections set name=:var1  where id=:id");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':var1', $name);
			

			$stmt->execute();




             }



   function delete_section(){
           

 	     $id=func_get_arg(0);
 	    
         

         $stmt = $this->DBC->prepare("DELETE FROM sections   where id=:id");
			$stmt->bindParam(':id', $id);
			
			

			$stmt->execute();




             }          


   }		        
   ?>