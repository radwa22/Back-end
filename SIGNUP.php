<?php
session_start();

//34an 25ly el data ely bsglha w tl3 error yrg3ha tany //??
    $fname='';
    $lname='';
    $email='';
    $password='';
    if(isset($_SESSION['session_data'])){
        if(empty($_SESSION['session_data']['fname'])){
            $fname = $_SESSION['session_data']['fname'];
        }
        if(empty($_SESSION['session_data']['lname'])){
            $lname = $_SESSION['session_data']['lname'];
        }
        if(empty($_SESSION['session_data']['email'])){
            $email = $_SESSION['session_data']['email'];
        }
        unset($_SESSION['session_data']);

    }
?>
<!DOCTYPE html>

<html>
<head>
    <title>sign up</title>
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
    <h1>sign up</h1>

    <?php
		if (isset($_SESSION['SIGNUP_errors'])) {
			foreach ($_SESSION['SIGNUP_errors'] as $error) {
				echo "<div class='alert-danger'>{$error}</div>";
			}
			unset($_SESSION['SIGNUP_errors']);
		}

		?>
        <form action="PROCESS.php" method="post">
        <input type="text" name="fname" placeholder="first name" value="<?php echo $fname; ?>">
        <input type="text" name="lname" placeholder="last name" value="<?php echo $lname; ?>">
        <input type="data" name="email" placeholder="email"value="<?php echo $email; ?>" >
        <input type="password" name="password" placeholder="password" value="<?php echo $password; ?>">
        <button type="submit">submit</button>
    </form>
 </div>   
</body>
</html> 