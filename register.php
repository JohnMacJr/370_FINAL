<?php
session_start();

include "DBConnection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $username = validate($_POST["username"]);
    $password = validate($_POST["password"]);
    $confirm_password = validate($_POST["confirm_password"]);

    // Additional validation
    if (empty($username)) {
        echo "<script>alert('User Name is required');</script>";
        exit();
    } elseif (empty($password)) {
        echo "<script>alert('Password is required');</script>";
        exit();
    } elseif ($password !== $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
        exit();
    }

    // Check if the username already exists
    $check_sql = "SELECT * FROM login WHERE username = ?";
    $check_stmt = $conn->prepare($check_sql);
    $check_stmt->bind_param("s", $username);
    $check_stmt->execute();
    $result = $check_stmt->get_result();
    if ($result->num_rows > 0) {
        // Username already exists
        echo "Username already exists";
        exit();
    }

    // Insert user into the database
    $insert_sql = "INSERT INTO login (username, password) VALUES (?, ?)";
    $insert_stmt = $conn->prepare($insert_sql);
    $insert_stmt->bind_param("ss", $username, $password);

    if ($insert_stmt->execute()) {
        // Registration successful
        echo "Registration successful! Please login.";
        header("Location: login.php");
        exit();
    } else {
        // Registration failed
        echo "Error: " . $conn->error;
        exit();
    }
} else {
    header("Location: login.php");
    exit();
}

$conn->close();
?>
