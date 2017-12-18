 <?php

include "blank.php";
function content(){
$conn=new connection();


$name;
$pass;
$id=$_GET['id'];
$prepare ='SELECT * FROM  departments where id=:id';
$stmt= $conn->DBC->prepare($prepare);
$stmt->bindParam(':id', $id);
$stmt->execute();
$data = $stmt->fetch( PDO::FETCH_ASSOC );
$name=$data['name'];
$section_id=$data['section_id'];
$prepare ='SELECT * FROM sections where id=:section_id ';
$stmt= $conn->DBC->prepare($prepare);
$stmt->bindParam(':section_id', $section_id);
$stmt->execute();
$data = $stmt->fetch( PDO::FETCH_ASSOC);
 $section_name=$data['name'];
           




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
                                    <form role="form"  id="edit_department" >
                                        
                                        <div class="form-group">
                                            <p>Department Name</p>
                                        <input type="text"  name="name" placeholder="please enter the name" class="pass" required="" value="<?php echo $name;?> ">
                                        </input>
                                        </div>
                                       
                                        <div class="form-group">
                                            <label>select the Section of this departmnet</label>
                                            <select class="form-control" name="section">
                                                                                                
                                                    <?php 
                                                    $conn=new connection();
                                                   $prepare ='SELECT * FROM sections ';
                                                   $stmt= $conn->DBC->prepare($prepare);
                                                  $stmt->execute();
                                                  while($data = $stmt->fetch( PDO::FETCH_ASSOC) ) {
                                                    if($data['name']==$section_name){
                                                           
                                                   ?>
                                                  <option selected="selected" > <?php echo $data['name']  ?> </option>
                                                
                                                   <?php  } else {?>
                                                    
                                                  <option > <?php echo $data['name']  ?> </option>
                                                
                                                   <?php  }} ?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_department" >
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="id" value="<? echo $id; ?>" >
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>