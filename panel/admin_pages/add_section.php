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
                                    <form  role="form" id="add_section" >
                                        
                                        <div class="form-group">
                                            <label>Enter the name of the section</label>
                                            <input class="form-control" placeholder="Enter name" name="name" required="">
                                        </div>
                                        
                                        <div class="form-group">
                                
                                            <input type="hidden" class="form-control" placeholder="Enter text" name="action" value="add_section" >
                                        </div>

                                        
                                        
                                        <input type="submit" class="btn btn-default" name="submit" value="Submit Button"></input>
                                        <input type="reset" class="btn btn-default" value="Reset Button"></input>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                               
                                     
    <!-- /#wrapper -->


    <?php } ?>