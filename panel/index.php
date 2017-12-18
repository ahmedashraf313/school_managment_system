<?php
require "user.php";

$user=new user();

 //if( isset( $_POST['login']) ) 
 //unset($_POST['login']);

$user->login();

if(isset($_POST['login'])){
unset($_POST['login']);

$email= $_POST['email'] ;
$password= md5($_POST['password']) ;
$_SESSION['email']=$email;
$_SESSION['password']=$password;
$user->check();

 

if( isset( $_SESSION['admin'] ) ) {
   //$_SESSION['admin']=$val;
	header("Location:http://localhost/school_managment_system/panel/admin_pages/index.php");}




if( isset( $_SESSION['user'] ) ) {
   //$_SESSION['admin']=$val;
	header("Location:http://localhost/school_managment_system/index.php");}



}
	


?>