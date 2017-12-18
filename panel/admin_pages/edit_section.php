 <?php

include "blank.php";


function content(){

$conn=new connection();


$name;
$id=$_GET['id'];
$prepare ='SELECT * FROM  sections where id='.$id;
$stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
       $data = $stmt->fetch( PDO::FETCH_ASSOC );
        $name=$data['name'];


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
                                    <form role="form"  id="edit_section" >
                                        
                                        <div class="form-group">
                                            <p>Section Name</p>
                                        <input type="text"  name="name" placeholder="please enter the name" class="pass" required="" value="<?php echo $name;?> ">
                                        </input>
                                        </div>
                                       
                                        
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_section" >
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="id" value="<?php echo $id; ?>" >
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default" name="submit">Submit Button</button>
                                        <button type="reset" class="btn btn-default">Reset Button</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>