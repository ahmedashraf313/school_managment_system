<?php
include "blank.php";




function content(){
    date_default_timezone_set("Africa/Cairo");
    $date = date("Y-m-d ");
    $id=$_SESSION['user']; 
    $conn=new connection();  
         $prepare ="SELECT * FROM user where id = '$id'";
         $stmt= $conn->DBC->prepare($prepare);
         $stmt->execute();
         $data = $stmt->fetch( PDO::FETCH_ASSOC );
         $email=$data['email'];
         $prepare1 ="SELECT * FROM comments where user_id = '$id' AND date = '$date'";
         $stmt1= $conn->DBC->prepare($prepare1);
         $stmt1->execute();
         $data1 = $stmt1->fetch( PDO::FETCH_ASSOC );
         $comment=$data1['comment'];
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
                                    <form  role="form" id="add_comment" >
                                        
                                        <div class="form-group">
                                            <label> the email of the user</label>
                                            <input disabled="" class="form-control" placeholder="Enter name" value="<?php echo $email;?>">
                                        </div>
                                        
                                            
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="add_comment" >
                                        </div>

                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="email" value="<?php echo $email;?>" >
                                        </div>

                                        <div class="form-group">
                                            <label>Enter your comment</label>
                                            <input class="form-control" placeholder="Enter comment" name="comment" required="" value="<?php echo $comment;?>">
                                        </div>
                                        
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
                                        <input type="reset" class="btn btn-default" value="Reset Button"></input>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>