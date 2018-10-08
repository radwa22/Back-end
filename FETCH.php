<?php
$con = mysqli_connect('localhost','root','','loginsystem');
$sql= "SELECT*FROM users";
$query=mysqli_query($con,$sql);
?>