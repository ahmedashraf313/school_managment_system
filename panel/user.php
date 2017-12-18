<?php

require_once "connection/conn.php";
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

class user extends connection
{
	
	private $email;
	private $password;
	private $ip;
	private $date;
	private $time;
	private $id;
	
	
	function __construct(){

			
	       parent::__construct();
	       
		        }
    
    function check(){
         
        

		$this->email=$_SESSION['email'];
		$this->password=$_SESSION['password'];



			$stmt= $this->DBC->prepare("SELECT * FROM  user where email=:var1 AND password=:var2 ");
			$stmt->bindParam(':var1', $this->email);
			$stmt->bindParam(':var2', $this->password);
			$stmt->execute();
			$data = $stmt->fetch( PDO::FETCH_ASSOC );
			    
			if( is_null($data['id']))
				{ echo "not found";

				}
			elseif($data['type']=='admin')
               {
               $this->delete_guest();
			   $id=$data['id'];
			   $stmt = $this->DBC->prepare("UPDATE user set ip=:var1 where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':var1', $this->ip);
				$stmt->execute();   
                
                $this->zone();
				$stmt = $this->DBC->prepare("INSERT INTO visits ( email,ip,type,date,time) VALUES (:var1,:var2,'admin',:var3,:var4) ");
				$stmt->bindParam(':var1', $this->email);
				$stmt->bindParam(':var2', $this->ip);
				$stmt->bindParam(':var3', $this->date);
				$stmt->bindParam(':var4', $this->time);

				$stmt->execute();
			  $_SESSION['admin']=$id;}
				
			elseif($data['type']=='user')
               {
               $this->delete_guest();
               $id=$data['id'];  

				$stmt = $this->DBC->prepare("UPDATE user set ip=:var1 where id=:id");
				$stmt->bindParam(':id', $id);
				$stmt->bindParam(':var1', $this->ip);
				$stmt->execute(); 

                $this->zone();				
               	$stmt = $this->DBC->prepare("INSERT INTO visits ( email,ip,type,date,time) VALUES (:var1,:var2,'user',:var3,:var4) ");
				$stmt->bindParam(':var1', $this->email);
				$stmt->bindParam(':var2', $this->ip);
				$stmt->bindParam(':var3', $this->date);
				$stmt->bindParam(':var4', $this->time);

				$stmt->execute();
			    
			  $_SESSION['user']=$id;}  
	

	        }

	        function get_ip() {
				    $ipaddress = '';
				    if (isset($_SERVER['HTTP_CLIENT_IP']))
				        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
				    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
				        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
				    else if(isset($_SERVER['HTTP_X_FORWARDED']))
				        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
				    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
				        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
				    else if(isset($_SERVER['HTTP_FORWARDED']))
				        $ipaddress = $_SERVER['HTTP_FORWARDED'];
				    else if(isset($_SERVER['REMOTE_ADDR']))
				        $ipaddress = $_SERVER['REMOTE_ADDR'];
				    else
				        $ipaddress = 'UNKNOWN';
				     $this->ip=$ipaddress;
				}


  function add_guest(){
              
         $this->get_ip();

            $stmt= $this->DBC->prepare("INSERT INTO user ( email,ip,type) VALUES (:var1,:var2,'guest') ");
			$stmt->bindParam(':var1', $this->ip);
			$stmt->bindParam(':var2', $this->ip);
			$stmt->execute();

            $this->zone();
            $stmt= $this->DBC->prepare("INSERT INTO visits ( email,ip,type,date,time) VALUES (:var1,:var2,'guest',:var3,:var4) ");
			$stmt->bindParam(':var1', $this->ip);
			$stmt->bindParam(':var2', $this->ip);
			$stmt->bindParam(':var3', $this->date);
			$stmt->bindParam(':var4', $this->time);

			$stmt->execute();
                }
  


 function delete_guest(){

		        $stmt = $this->DBC->prepare("DELETE from user where ip=:ip And type='guest'");
				$stmt->bindParam(':ip', $this->ip);
				$stmt->execute();
			    $stmt = $this->DBC->prepare("DELETE from visits where ip=:ip And type='guest'");
				$stmt->bindParam(':ip', $this->ip);
				$stmt->execute();
                }


 function zone() {

    	date_default_timezone_set("Africa/Cairo");
       $this->date = date("Y-m-d ");
       $this->time = date("h:i:s");
             }


  function add_user(){
           
           $user_email=func_get_arg(0);
           $user_password=func_get_arg(1);
           $related_id=func_get_arg(2);
      
			$stmt = $this->DBC->prepare("INSERT INTO user ( email,password,type,related_id) VALUES (:var1,:var2,'user',:var3)");
			$stmt->bindParam(':var1', $user_email);
			$stmt->bindParam(':var3', $related_id);
			$stmt->bindParam(':var2', $user_password);
			$stmt->execute();

               } 

 function edit_user(){

 	     $id=func_get_arg(0);
 	     $email=func_get_arg(1);
         $password=func_get_arg(2); 
          $related_id=func_get_arg(3); 

         $stmt = $this->DBC->prepare("UPDATE user set email=:var1 ,password=:var2 ,related_id=:related_id where id=:id");
			$stmt->bindParam(':id', $id);
			$stmt->bindParam(':var1', $email);
			$stmt->bindParam(':var2', $password);
			$stmt->bindParam(':related_id', $related_id);

			$stmt->execute();
                              }                
    
  function delete_user(){
				        $id=func_get_arg(0);
				        $stmt = $this->DBC->prepare("DELETE from user where id=:id ");
						$stmt->bindParam(':id', $id);
						$stmt->execute();}  

  


function delete_user_from_department(){
				        $related_id=func_get_arg(0);
				        $stmt = $this->DBC->prepare("DELETE from user where related_id=:related_id ");
						$stmt->bindParam(':related_id', $related_id);
						$stmt->execute();}  


function delete_user_from_section(){
				        $section_id=func_get_arg(0);
				        $stmt = $this->DBC->prepare("SELECT * from departments where section_id=:section_id ");
						$stmt->bindParam(':section_id', $section_id);
						$stmt->execute();
						while ($data = $stmt->fetch( PDO::FETCH_ASSOC )) {
							$related_id=$data['id'];
							
							$this->delete_user_from_department($related_id);

                        }

					}  


  function add_comment(){
          

			 	        $this->email=func_get_arg(0);
			 	        $comment=func_get_arg(1);
			            $stmt = $this->DBC->prepare("SELECT * from user where email=:email ");
					    $stmt->bindParam(':email', $this->email);
					    $stmt->execute();
					    while($data = $stmt->fetch( PDO::FETCH_ASSOC )){
						$this->id=$data['id'];
			            $this->zone();
			            $stmt1 = $this->DBC->prepare("SELECT * from comments where user_id=:id AND date =:date");
					    $stmt1->bindParam(':id', $this->id);
					    $stmt1->bindParam(':date', $this->date);
						$stmt1->execute();
				        $data1 = $stmt1->fetch( PDO::FETCH_ASSOC );
				        if(is_null($data1['comment'])){
			        	$stmt= $this->DBC->prepare("INSERT INTO comments ( comment,user_id,date) VALUES (:var1,:var2,:var3) ");
						$stmt->bindParam(':var1', $comment);
						$stmt->bindParam(':var2', $this->id);
						$stmt->bindParam(':var3', $this->date);
						$stmt->execute();}
			            else {
						$stmt = $this->DBC->prepare("UPDATE comments set comment=:var1 where user_id=:id AND date=:var2");
						$stmt->bindParam(':id', $this->id);
						$stmt->bindParam(':var1', $comment);
						$stmt->bindParam(':var2', $this->date);
						$stmt->execute();  }}}



  function login(){
		if( isset( $_SESSION['admin'] ) ) 
        session_unset($_SESSION['admin']);

        if( isset( $_SESSION['user'] ) ) 
	    session_unset($_SESSION['user']);

     

        $this->add_guest();
         

		?>
        <!DOCTYPE html>
			<html lang="en">

			<head>

			    <meta charset="utf-8">
			    <meta http-equiv="X-UA-Compatible" content="IE=edge">
			    <meta name="viewport" content="width=device-width, initial-scale=1">
			    <meta name="description" content="">
			    <meta name="author" content="">

			    <title>SB Admin 2 - Bootstrap Admin Theme</title>

			    <!-- Bootstrap Core CSS -->
			    <link href="../admin_temp/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

			    <!-- MetisMenu CSS -->
			    <link href="../admin_temp/vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

			    <!-- Custom CSS -->
			    <link href="../admin_temp/dist/css/sb-admin-2.css" rel="stylesheet">

			    <!-- Custom Fonts -->
			    <link href="../admin_temp/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

			    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
			    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
			    <!--[if lt IE 9]>
			        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
			    <![endif]-->

			</head>

			<body>

			    <div class="container">
			        <div class="row">
			            <div class="col-md-4 col-md-offset-4">
			                <div class="login-panel panel panel-default">
			                    <div class="panel-heading">
			                        <h3 class="panel-title">Please Sign In</h3>
			                    </div>
			                    <div class="panel-body">
			                        <form role="form" method="post" action="index.php" >
			                            <fieldset>
			                                <div class="form-group">
			                                    <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>
			                                </div>
			                                <div class="form-group">
			                                    <input class="form-control" placeholder="Password" name="password" type="password" value="">
			                                </div>
			                                <div class="checkbox">
			                                    <label>
			                                        <input name="remember" type="checkbox" value="Remember Me">Remember Me
			                                    </label>
			                                </div>
			                                <!-- Change this to a button or input when using this as a form -->
			                                <input  name="login" class="btn btn-lg btn-success btn-block" type="submit" value="Login">
			                            </fieldset>
			                        </form>
			                    </div>
			                </div>
			            </div>
			        </div>
			    </div>

			    <!-- jQuery -->
			    <script src="../admin_temp/vendor/jquery/jquery.min.js"></script>

			    <!-- Bootstrap Core JavaScript -->
			    <script src="../admin_temp/vendor/bootstrap/js/bootstrap.min.js"></script>

			    <!-- Metis Menu Plugin JavaScript -->
			    <script src="../admin_temp/vendor/metisMenu/metisMenu.min.js"></script>

			    <!-- Custom Theme JavaScript -->
			    <script src="../admin_temp/dist/js/sb-admin-2.js"></script>

			</body>

			</html>
             



	<?php
	
}
}


	    
	?>