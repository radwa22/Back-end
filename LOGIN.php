<?php
  session_start()
?>
<!DOCTYPE html>

<html>
<head>
    <title>Login</title>
    <style>
            .container{
                padding:16px;  
                display: inline-block;
            }
            input{
             width: 100%;
             padding: 15px;
             margin: 5px 0 22px 0;
             display: inline-block;
             border: none;
             background: #f1f1f1;  
            }
            button{
                border: none;
                width: 50%;
                height: 50px;
                opacity: .9;
                background-color: #df2525;
                color: #f1f1f1;
                font-size: 30px;
            }
           button:hover {
             opacity:1;
         }  
         </style>
</head>
<body>
 <div class="container">
    <h1>Log In Please!</h1>
    <?PHP
        if(isset($_SESSION['sucess'])){
                echo "<div class='alert-danger'>{$_SESSION['sucess']}</div>";
                unset($_SESSION['sucess']);
            }
    ?>
        <form action="PROCESS.php" method="post">
        <input type="data" name="email" placeholder="email">
        <input type="password" name="password" placeholder="password">
        <button type="submit">Log In</button>
    </form>
 </div>   
</body>
</html> 
<?php