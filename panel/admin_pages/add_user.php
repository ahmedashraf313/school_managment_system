<?php
include "blank.php";




function content(){
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
                                    <form  role="form" id="add_user" >
                                        
                                        <div class="form-group">
                                            <label>Enter the name of the user</label>
                                            <input class="form-control" placeholder="Enter name" name="email" required="">
                                        </div>
                                        <div class="form-group">
                                            <label>select the department of the user</label>
                                            <select class="form-control" name="department">
                                                                                                
                                                    <?php 
                                                    $conn=new connection();
                                                   $prepare ='SELECT * FROM departments ';
                                                   $stmt= $conn->DBC->prepare($prepare);
                                                  $stmt->execute();
                                                  while($data = $stmt->fetch( PDO::FETCH_ASSOC) ) {
                                                            $prepare1 ='SELECT * FROM sections  where id='.$data['section_id'];
                                                           $stmt1= $conn->DBC->prepare($prepare1);
                                                           $stmt1->execute();
                                                           $data1 = $stmt1->fetch( PDO::FETCH_ASSOC);
                                                  
                                                   ?>
                                                  <option > <?php echo $data['name']."-".$data1['name'];   ?> </option>
                                                
                                                   <?php  } ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="add_user" >
                                        </div>

                                        <div class="form-group">
                                            <label>Enter the password</label>
                                            <input class="form-control" placeholder="Enter password" name="password" type="password">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
                                        <input type="reset" class="btn btn-default" value="Reset Button"></input>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>