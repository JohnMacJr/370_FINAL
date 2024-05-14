<!DOCTYPE html>
<html lang="en">
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <input type="checkbox" id="show-registration" style="display: none;">

    <!-- Login form -->
    <form action="Validatelogin.php" method="post">
        <h2>LOGIN</h2>
        <?php if (isset($_GET['error'])) { ?>   
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>User Name</label>
        <input type="text" name="uname" placeholder="User Name"><br>
        <label>Password</label>
        <input type="password" name="password" placeholder="Password"><br>
        <button type="submit" name="login">Login</button>
        Don't have an account? 
    </form>
    <form action="logon.php" method="post">
    <button type="submit" name="login">SignUp</button>
    </form>

   <!-- Registration form -->

   <!--<form id="registrationForm" action="logon.php" method="post">
    <h2>REGISTER</h2>
    <label>User Name</label>
    <input type="text" name="username" placeholder="User Name"><br>
    <label>Password</label>
    <input type="password" id="password" name="password" placeholder="Password"><br>
    <label>Confirm Password</label>
    <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirm Password"><br>
    <button type="submit" name="register">Register</button>
    Already have an account?
    <label class="login-signup" for="show-registration">Login</label>

    <div id="message">
        <h4>Password must contain:</h4>
        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
        <p id="number" class="invalid">A <b>number</b></b>
        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
    </div>
</form>-->

<script>
var myInput = document.getElementById("password");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

myInput.onkeyup = function() {
    var upperCaseLetters = /[A-Z]/g;
    if(myInput.value.match(upperCaseLetters)) {
        capital.style.opacity = "0";
    } else {
        capital.style.opacity = "1";
    }

    var numbers = /[0-9]/g;
    if(myInput.value.match(numbers)) {
        number.style.opacity = "0";
    } else {
        number.style.opacity = "1";
    }
    if(myInput.value.length >= 8) {
        length.style.opacity = "0";
    } else {
        length.style.opacity = "1";
    }
}

var password = document.getElementById("password");
var confirm_password = document.getElementById("confirm_password");

function validatePassword() {
    if (password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
    } else {
        confirm_password.setCustomValidity('');
    }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
</script>

<script>
    //prevents code from redirecting to register.php when submitting form
document.getElementById("registrationForm").addEventListener("submit", function(event) {
    event.preventDefault();
    
    
    var formData = new FormData(this);
    
   
    var xhr = new XMLHttpRequest();
    xhr.open("POST", "register.php", true);
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
          
            var response = xhr.responseText;
            if (response.startsWith("Error")) {
                alert(response); 
            } else {
                alert(response);
                window.location.href = "login.php";
            }
        }
    };
    xhr.send(formData);
});
</script>
</body>
</html>
