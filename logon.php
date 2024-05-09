<!DOCTYPE html>

<html>

<head>

    <title>LOGON</title>

</head>

<body>
    <!-- add form to validate new login (probably javascript)
    input for username, password repeat password and submit button
    button sned to home page-->
    <form action="Validatelogon.php" method="post">

        <h2>LOG ON</h2>

        <?php if (isset($_GET['error'])) { ?>   <!--# checks if the 'error' parameter is set in the URL query string. #If it is set, it displays an error message. -->

            <p class="error"><?php echo $_GET['error']; ?></p>

        <?php } ?>

        <label>User Name</label>

        <input type="text" name="uname" placeholder="User Name"><br>

        <label>Password</label>

        <input type="password" name="password1" placeholder="Password"><br>

        <label>Re-enter Password: </label>
        <input type="password" name="password2" placeholder="Re-enter Password"><br><br>

        <button type="submit">Login</button>

     </form>
</body>
</html>
