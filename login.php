<!DOCTYPE html>

<html>

<head>

    <title>LOGIN</title>

    <link rel="stylesheet" type="text/css" href="style.css">

</head>

<body>

     <form action="Validatelogin.php" method="post">

        <h2>LOGIN</h2>

        <?php if (isset($_GET['error'])) { ?>   <!--# checks if the 'error' parameter is set in the URL query string. #If it is set, it displays an error message. -->

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password" placeholder="Password"><br>

        <label>Confirm Password</label>

        <input type="password" name="confirm_password" placeholder="Confirm Password"><br>

        <button type="submit">Register</button>

        <button type="submit">Login</button>

     </form>

</body>

</html>
