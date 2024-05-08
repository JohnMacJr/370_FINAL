<!DOCTYPE html>

<html>

<head>

    <title>LOGON</title>

</head>

<body>
    <!-- add form to validate new login (probably javascript)
    input for username, password repeat password and submit button
    button sned to home page-->
    <label for="usernameInput">Enter username: </label><br>
    <input type="text" id="usernameInput" ><br><br>

    <label for="password1">Enter Password: </label><br>
    <input type="text" id="password1" ><br><br>

    <label for="password2">Re-enter Password: </label><br>
    <input type="text" id="password2" ><br><br>

    <button onclick="passwordCheck()">Submit</button>

    <script>
        function passwordCheck(){
            if(document.getElementById("password1").value.length < 8)
                console.log("Password too short")

            var hasNum = false;
            for(let i = 0; i < document.getElementById("password1").value.length; i++){
                if(document.getElementById("password1").value[i] >= 0 && 
                document.getElementById("password1").value[i] <= 9)
                    hasNum = true;
            }

            if(!hasNum)
                console.log("Password should include at least one digit.")

            if(document.getElementById("password1").value != document.getElementById("password2").value)
                console.log("Passwords should match.")

            //non-alphanumeric character
            for(let i = 0; i < document.getElementById("password1").value.length; i++){
                if(document.getElementById("password1").value[i] < 0 || 
                document.getElementById("password1").value[i] > 9 && 
                document.getElementById("password1").value[i] < 'A' ||
                document.getElementById("password1").value[i] > 'Z' &&
                document.getElementById("password1").value[i] < 'a' ||
                document.getElementById("password1").value[i] > 'z')
                    hasNum = true;
            }
        }
    </script>
</body>
</html>
