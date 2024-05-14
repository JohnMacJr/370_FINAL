<?php

    session_start(); 
    
    include "DBConnection.php";
    
    if (isset($_POST['doc'])) {
        # This function is used to sanitize input data. It removes leading and trailing whitespaces, slashes, and #converts special characters to HTML entities to prevent SQL injection.
        function validate($data){
    
           $data = trim($data);
    
           $data = stripslashes($data);
    
           $data = htmlspecialchars($data);
    
           return $data;
    
        }
        $username = $_SESSION['user_name'];
        $title = validate($_POST['title']);
        $file = validate($_POST['doc']);
        $sql = "INSERT INTO files (username, title, file) VALUES ('$username', '$title', '$file')";

        $result = mysqli_query($conn, $sql);
        header("Location: home.php");
    }
?>