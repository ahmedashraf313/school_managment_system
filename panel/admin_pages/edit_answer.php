<?php
include "blank.php";




function content(){
  $conn=new connection();


$name;
$pass;
$id=$_GET['id'];
$prepare ='SELECT * FROM  answers where id='.$id;
$stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
       $data = $stmt->fetch( PDO::FETCH_ASSOC );
        $name=$data['name'];
        $question_id=$data['question_id'];

$prepare ='SELECT * FROM questions where id=:question_id ';
$stmt= $conn->DBC->prepare($prepare);
$stmt->bindParam(':question_id', $question_id);
$stmt->execute();
$data = $stmt->fetch( PDO::FETCH_ASSOC);
 $question_name=$data['name'];

 
 ?>

 <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Forms</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Basic Form Elements
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <form  role="form" id="edit_answer" >
                                        
                                        <div class="form-group">
                                            <label>Enter the name of the Answer</label>
                                            <input class="form-control" placeholder="Enter name" name="name" value="<?php echo $name;?>">
                                        </div>
                                        <div class="form-group">
                                            <label>select the question of the answer</label>
                                            <select class="form-control" name="question" >
                                                                                                
                                                    <?php 
                                                    $conn=new connection();
                                                   $prepare ='SELECT * FROM questions ';
                                                   $stmt= $conn->DBC->prepare($prepare);
                                                  $stmt->execute();
                                                  while($data = $stmt->fetch( PDO::FETCH_ASSOC) ) {
                                                            $prepare1 ='SELECT * FROM lessons  where id='.$data['lesson_id'];
                                                           $stmt1= $conn->DBC->prepare($prepare1);
                                                           $stmt1->execute();
                                                            $data1 = $stmt1->fetch( PDO::FETCH_ASSOC);
                                                           $prepare2 ='SELECT * FROM departments  where id='.$data1['department_id'];
                                                           $stmt2= $conn->DBC->prepare($prepare2);
                                                           $stmt2->execute();
                                                           $data2 = $stmt2->fetch( PDO::FETCH_ASSOC);
                                                           $prepare3 ='SELECT * FROM sections  where id='.$data2['section_id'];
                                                           $stmt3= $conn->DBC->prepare($prepare3);
                                                           $stmt3->execute();
                                                           $data3 = $stmt3->fetch( PDO::FETCH_ASSOC);


                                                           if($question_name==$data['name']){
                                                  
                                                   ?>
                                                  <option  selected="selected"> <?php echo $data['name']."-".$data1['name']."-".$data2['name']."-".$data3['name'];   ?> </option>
                                                
                                                   <?php  }else { ?>

                                                  <option  > <?php echo $data['name']."-".$data1['name']."-".$data2['name']."-".$data3['name'];   ?> </option>
                                                  <?}}?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_answer" >
                                        </div>

                                        
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="id" value="<?echo $id?>" >
                                        </div>

                                        
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
                                        <input type="reset" class="btn btn-default" value="Reset Button"></input>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>