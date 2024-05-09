<?php 

session_start(); 

include "DBConnection.php";

if (isset($_POST['uname']) && isset($_POST['password1']) && isset($_POST['password2'])) {
    # This function is used to sanitize input data. It removes leading and trailing whitespaces, slashes, and #converts special characters to HTML entities to prevent SQL injection.
    function validate($data){

       $data = trim($data);

       $data = stripslashes($data);

       $data = htmlspecialchars($data);

       return $data;

    }

    $uname = validate($_POST['uname']);
    $pass1 = validate($_POST['password1']);
    $pass2 = validate($_POST['password2']);

    if (empty($uname)) {

        header("Location: logon.php?error=User Name is required");  # if username is empty user is redirected to the logon page.

        exit();

    }
    else if(empty($pass1)){
        header("Location: logon.php?error=Password is required");  # if password is empty user is redirected to the logon page.

        exit();
    }
    else if(empty($pass2)){
        header("Location: logon.php?error=Password is required");  # if password is empty user is redirected to the logon page.

        exit();
    }

    else if($pass1 != $pass2){
        header("Location: logon.php?error=Passwords dont match");  #user is redirected to the logon page.

        exit();
    }
    else if(strlen($pass1) < 8){
        header("Location: logon.php?error=Password too short");  #user is redirected to the logon page.

        exit();
    }
    else if(!preg_match('~[0-9]+~', $pass1)){
        header("Location: logon.php?error=Password must contain number");  #user is redirected to the logon page.

        exit();
    }
    else if(ctype_alnum($pass1)){
        header("Location: logon.php?error=Password must contain special character");  #user is redirected to the logon page.

        exit();
    }


    else{

        $sql = "SELECT * FROM users WHERE username='$uname'";
        
        $result = mysqli_query($conn, $sql);
         

        if (mysqli_num_rows($result) == 1) {

            header("Location: logon.php?error=User Name is taken");

        exit();

        }else{

            $sql2 = "INSERT INTO users (username, password) 
            VALUES ('$uname', '$pass1')";
            
            if (mysqli_query($conn, $sql2)) {
                header("Location: home.php?error=test");
            }
            else
                header("Location: home.php?error=test2");
            exit();

        }

    }

}else{

    header("Location: Validatelogin1111.php");

    exit();

}
?>