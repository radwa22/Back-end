<?PHP

 $ERRORS=[];
//first name
if(isset($_POST['fname'])){
    if(empty($_POST['fname'])){
        $ERRORS[]='first name is empty';
    }
    else{
        if(strlen($_POST['fname'])>2){
            if(strlen($_POST['fname'])<20){
                //first name is valid
            }
            else{
                $ERRORS[]='first name is too long';
            }
        }
        else{
            $ERRORS[]='first name is too short';
        }
    }
}
else{
    $ERRORS[] = 'first name field is required';
}
//last name
if(isset($_POST['lname'])){
    if(empty($_POST['lname'])){
        $ERRORS[]='last name is empty';
    }
    else{
        if(strlen($_POST['lname'])>2){
            if(strlen($_POST['lname'])<20){
                //first name is valid
            }
            else{
                $ERRORS[]='last name is too long';
            }
        }
        else{
            $ERRORS[]='last name is too short';
        }
    }
}
else{
    $ERRORS[] = 'last name field is required';
}
//email
if(isset($_POST['email'])){
    if(empty($_POST['email'])){
        $ERRORS[]='email is empty';
    }
    else{
        if(is_string($_post['email'])){
            if (strlen($_POST['email']) > 10) {
				if (strlen($_POST['email']) < 100) {
					$con = mysqli_connect('localhost', 'root', '', 'loginsystem');
					$sql = "SELECT * FROM users WHERE email = '{$_POST['email']}'";
					$query = mysqli_query($con, $sql);
					if (mysqli_num_rows($query) > 0) {
						$ERRORS[] = 'email field has already been taken';
					}
				} else {
					$ERRORS[] = 'email field must be less than 100 charachters';
				}
			}
            else{
                $ERRORS[]='email is too short';
            }
        }else {
			$ERRORS[] = 'email field must be a string';
		}

        }       
}
else{
    $ERRORS[] = 'email field is required';
}
//passward
if(isset($_POST['passward'])){
    if(empty($_POST['passward'])){
        $ERRORS[]='passward is empty';
    }
    else{
        if(is_string($_POST['passward'])){
            if(strlen($_POST['passward'])>6){
                if(strlen($_POST['passward'])<50){
                    //passward is valid
                }
                else{
                    $ERRORS[]='passward is too long';
                }
            }
            else{
                $ERRORS[]='passward is too short';
            }
        }else {
			$ERRORS[] = 'passward field must be a string';
		}

        }       
}
else{
    $ERRORS[] = 'passward field is required';
}
//insert data in database
if(count($ERRORS==0)){
    $sql = "INSERT INTO users(user_first,user_last,user_email,user_pwd)VALUES('{$_POST['fname']}','{$_POST['lname']}','{$_POST['email']}','{$_POST['password']}')";
    $con = mysqli_connect('localhost','root','','loginsystem');
    mysqli_query($con, $sql);
    if(mysqli_error($con)){
        echo  mysqli_error($con);
    }else{
        session_start();
        $_SESSION['sucess'] = "data saved successfully!";
        header("LOCATION:LOGIN.php");
    }
}else{
    session_start();
        $_SESSION['SIGNUP_data']= $_POST;
        $_SESSION['SIGNUP_errors']= $ERRORS;
        header("LOCATION:SIGNUP.php");
}
?>