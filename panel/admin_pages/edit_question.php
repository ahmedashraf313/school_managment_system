<?php
include "blank.php";




function content(){
  $conn=new connection();


$name;
$pass;
$id=$_GET['id'];
$prepare ='SELECT * FROM  questions where id='.$id;
$stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
       $data = $stmt->fetch( PDO::FETCH_ASSOC );
        $name=$data['name'];
        $lesson_id=$data['lesson_id'];

$prepare ='SELECT * FROM lessons where id=:lesson_id ';
$stmt= $conn->DBC->prepare($prepare);
$stmt->bindParam(':lesson_id', $lesson_id);
$stmt->execute();
$data = $stmt->fetch( PDO::FETCH_ASSOC);
 $lesson_name=$data['name'];

 
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
                                    <form  role="form" id="edit_question" >
                                        
                                        <div class="form-group">
                                            <label>Enter the name of the question</label>
                                            <input class="form-control" placeholder="Enter name" name="name" value="<?php echo $name?>">
                                        </div>
                                        <div class="form-group">
                                            <label>select the lesson of the question</label>
                                            <select class="form-control" name="lesson" >
                                                                                                
                                                    <?php 
                                                    $conn=new connection();
                                                   $prepare ='SELECT * FROM lessons ';
                                                   $stmt= $conn->DBC->prepare($prepare);
                                                  $stmt->execute();
                                                  while($data = $stmt->fetch( PDO::FETCH_ASSOC) ) {
                                                            $prepare1 ='SELECT * FROM departments  where id='.$data['department_id'];
                                                           $stmt1= $conn->DBC->prepare($prepare1);
                                                           $stmt1->execute();
                                                            $data1 = $stmt1->fetch( PDO::FETCH_ASSOC);
                                                           $prepare2 ='SELECT * FROM sections  where id='.$data1['section_id'];
                                                           $stmt2= $conn->DBC->prepare($prepare2);
                                                           $stmt2->execute();
                                                           $data2 = $stmt2->fetch( PDO::FETCH_ASSOC);

                                                           if($lesson_name==$data['name']){
                                                  
                                                   ?>
                                                  <option  selected="selected"> <?php echo $data['name']."-".$data1['name']."-".$data2['name'];   ?> </option>
                                                
                                                   <?php  }else { ?>

                                                  <option  > <?php echo $data['name']."-".$data1['name']."-".$data2['name'];   ?> </option>
                                                  <?}}?>
                                            </select>
                                        </div>
                                        
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_question" >
                                        </div>

                                        
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="id" value="<?php echo $id?>" >
                                        </div>

                                        
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
                                        <input type="reset" class="btn btn-default" value="Reset Button"></input>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>