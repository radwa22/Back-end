<?php
require 'helpers.php';
$con = mysqli_connect('localhost','root','','loginsystem')
$sql = "SELECT * FROM users WHERE email = '{$_POST['email']}' LIMIT 1";
$query = mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($query);

if($row){
    if($row['password']==$_POST['password']){
        $_SESSION['sucess'] ='password is correct';
        $_SESSION['user_id']=$row['id'];
        redirect('HOME.php');
    }else{
        $_SESSION['error'] ='password is not correct';
        redirect('LOGIN.php');
    }else{
        $_SESSION['error'] ='your inserted email is not exit';
        redirect('LOGIN.php');
    }
}
