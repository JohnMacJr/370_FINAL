<?php 
    include "DBConnection.php";
    
    if (isset($_POST['title'])) {
        # This function is used to sanitize input data. It removes leading and trailing whitespaces, slashes, and #converts special characters to HTML entities to prevent SQL injection.
        function validate($data){
    
           $data = trim($data);
    
           $data = stripslashes($data);
    
           $data = htmlspecialchars($data);
    
           return $data;
    
        }
        $title = validate($_POST['title']);
        $sql = "DELETE FROM files WHERE title ='$title'";

        $result = mysqli_query($conn, $sql);
        header("Location: home.php");
    }

    //header("Location: login.php");
?>