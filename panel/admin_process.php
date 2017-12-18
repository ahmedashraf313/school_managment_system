<?php
header("Content-Type: text/javascript; charset=utf-8");
require "user.php";
require "department.php";
require  "section.php";
require  "lesson.php";
require  "question.php";
require  "answer.php";


$admin=new user();
$department=new department();
$section=new section();
$lesson=new lesson();
$question=new question();
$answer=new answer();





if(isset($_POST['action']))
$action=$_POST['action'];

else
	$action=$_GET['action'];

 

 if($action=='add_item'){

					$title=$_POST['title'];
					$name=$_POST['name'];
					$prepare ='SELECT * FROM  category';
					$stmt= $conn->prepare($prepare);
			        $stmt->execute();
			        while($data = $stmt->fetch( PDO::FETCH_ASSOC )){
			        if($title==$data['title']){
		            $id=$data['id'];
		              break;
		              }}
						$stmt = $conn->prepare("INSERT INTO items (name,cat_id ) VALUES (:var1,:id)");
						$stmt->bindParam(':var1', $name);
						$stmt->bindParam(':id', $id);
						$stmt->execute();
						}



elseif($action=='add_user'){
		$email=$_POST['email'];

		$password=md5($_POST['password']);
        
        if(isset($_POST['department'])){
		$name=$_POST['department'];
		$arr = explode("-", $name, 2);
         $department_name = $arr[0];

		$department_id=$department->get_id($department_name);

		$admin->add_user($email,$password,$department_id);}

		else 
			echo "no departments to add users please add department first";
		}

elseif($action=='add_section'){
 	$name=$_POST['name'];
   $section->add_section($name);}

elseif($action=='add_dapartment'){
		$name=$_POST['name'];
         
         if(isset($_POST['section'])){
		$section_name=$_POST['section'];

		
		$section_id=$section->get_id($section_name);

		$department->add_department($name,$section_id);}
		else
			echo "no sections to add departments please add section first";
		}


elseif($action=='add_lesson'){
		$name=$_POST['name'];

		
        if(isset($_POST['department'])){
		$string=$_POST['department'];
		$arr = explode("-", $string, 2);
         $department_name = $arr[0];

		$department_id=$department->get_id($department_name);

		$lesson->add_lesson($name,$department_id);}
		else
			echo "no departments to add lessons please add department first";
		}


elseif($action=='add_question'){
		
		$name=$_POST['name'];

if(isset($_POST['lesson'])){
		$string=$_POST['lesson'];
		$arr = explode("-", $string, 2);
         $lesson_name = $arr[0];

		$lesson_id=$lesson->get_id($lesson_name);

		$question->add_question($name,$lesson_id);}
		else
			echo "no lessons to add questions please add lessons first";
		}


elseif($action=='add_answer'){
		$name=$_POST['name'];

		
 if(isset($_POST['question'])){
		$string=$_POST['question'];
		$arr = explode("-", $string, 2);
         $question_name = $arr[0];


		$question_id=$question->get_id($question_name);

		$answer->add_answer($name,$question_id);}
		else
			echo "no questions to add answers please add questions first";

		}

elseif($action=='edit_user'){
	
	    $email=$_POST['email'];
		$id=$_POST['id'];
        $password=md5($_POST['password']);
        
        $string=$_POST['department'];
		$arr = explode("-", $string, 2);
         $department_name = $arr[0];


		$department_id=$department->get_id($department_name);        
       $admin->edit_user($id,$email,$password,$department_id);}


 

elseif($action=='edit_section'){
	    $name=$_POST['name'];
		$id=$_POST['id'];
       $section->edit_section($id,$name);
                                 }

elseif($action=='add_comment'){
	
		$comment=$_POST['comment'];
	    $email=$_POST['email'];
       

       $admin->add_comment($email,$comment);
                                 }

elseif($action=='edit_department'){
	
		$department_name=$_POST['name'];
	    $department_id=$_POST['id'];
	    $section_name=$_POST['section'];
	    $section_id=$section->get_id($section_name);

       

       $department->edit_department($department_id,$department_name,$section_id);
                                 }                                


elseif($action=='edit_lesson'){
		$id=$_POST['id'];
		$name=$_POST['name'];

		$string=$_POST['department'];
		$arr = explode("-", $string, 2);
         $department_name1 = $arr[0];
         $arr1 = explode(" ", $department_name1, 1);
         $department_name = $arr1[0];

		$department_id=$department->get_id($department_name);

		$lesson->edit_lesson($id,$name,$department_id);
		}

elseif($action=='edit_question'){
		$id=$_POST['id'];
		$name=$_POST['name'];

		$string=$_POST['lesson'];
		$arr = explode("-", $string, 2);
         $lesson_name= $arr[0];
         
		$lesson_id=$lesson->get_id($lesson_name);

		$question->edit_question($id,$name,$lesson_id);
		}
elseif($action=='edit_answer'){
		$id=$_POST['id'];
		$name=$_POST['name'];

		$string=$_POST['question'];
		$arr = explode("-", $string, 2);
         $question_name= $arr[0];
         
		$question_id=$question->get_id($question_name);

		$answer->edit_answer($id,$name,$question_id);
		}


else if ($action=='delete_answer'){
    $id=$_GET['id'];
    $answer->delete_answer($id);
header("Location:http://localhost/school_managment_system/panel/admin_pages/view_answers.php");

}
		
else if ($action=='delete_question'){
    $id=$_GET['id'];
    $question->delete_question($id);
header("Location:http://localhost/school_managment_system/panel/admin_pages/view_questions.php");

}
		
else if ($action=='delete_lesson'){
    $id=$_GET['id'];
    $lesson->delete_lesson($id);
header("Location:http://school_managment_system/panel/admin_pages/view_lessons.php");

}

else if ($action=='delete_department'){
    $id=$_GET['id'];
    $department->delete_department($id);
    $admin->delete_user_from_department($id);
header("Location:http://localhost/school_managment_system/panel/admin_pages/view_departments.php");

}
		
else if ($action=='delete_section'){
    $id=$_GET['id'];
    $admin->delete_user_from_section($id);
    $section->delete_section($id);
    
header("Location:http://localhost/school_managment_system/panel/admin_pages/view_sections.php");

}

else if ($action=='delete_user'){
    $id=$_GET['id'];
    echo $id;
    $admin->delete_user($id);
header("Location:http://localhost/school_managment_system/admin_pages/view_users.php");

}
?>

