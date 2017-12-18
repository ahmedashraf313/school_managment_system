 <?php

include "blank.php";

function content(){
$conn=new connection();


$name;
$pass;
$id=$_GET['id'];
$prepare ='SELECT * FROM  user where id='.$id;
$stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
       $data = $stmt->fetch( PDO::FETCH_ASSOC );
        $email=$data['email'];
        $password=$data['password'];
        $department_id=$data['related_id'];




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
                                    <form role="form"  id="edit_user" >
                                        
                                        <div class="form-group">
                                            <p>user_name</p>
                                        <input type="text"  name="email" placeholder="please enter the name" class="pass" required="" value="<? echo $email;?> ">
                                        </input>
                                        </div>
                                       
                                        <div class="form-group">
                                        <p>password</p>
                                        <input type="password"  name="password" placeholder="please enter the password" class="pass" required="" >
                                        </input>
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

                                                           if($data['id']==$department_id){
                                                  
                                                   ?>
                                                  <option selected="selected" > <?php echo $data['name']."-".$data1['name'];   ?> </option>
                                                
                                                   <?php  }else { ?>
                                                   <option  > <?php echo $data['name']."-".$data1['name'];   ?> </option>
                                                   <?}}?>
                                            </select>
                                        </div>
                                         <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="edit_user" >
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