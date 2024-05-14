<!--
    connect to DBConnection

    search for files for 'username' (from the login/ logon)
    display the files (while *more files left*){
        make div with file name (first line of file) and contents
        div named file name? (to reference to)
        div has buttons to download (href)
        edit (input box with contents in and mysql query)
        delete (mysql query) (deletes div)
    }
 -->
 <!DOCTYPE html>
<html>
<head>
    <title>Document Home</title>
    <link rel="stylesheet" type="text/css" href="home_style.css">
</head>
<body>
    <script>
        function makeDiv(title, doc){ 
            const outer = document.createElement("div");
            outer.class = "documents";
            const title_h = document.createElement("h1");
            title_h.innerText = title;
            outer.appendChild(title_h);

            const doc_p = document.createElement("p");
            doc_p.innerText = doc;
            outer.appendChild(doc_p);

            const edit_btn = document.createElement("button");
            edit_btn.innerHTML = "edit";
            edit_btn.onclick=  function() { editDoc(outer, doc_p, title_h);}
            outer.appendChild(edit_btn);

            const delete_form = document.createElement("form");
            delete_form.action = "deletefile.php";
            delete_form.method = "post";

            const delete_title = document.createElement("input");
            delete_title.type="hidden";
            delete_title.name = 'title';
            delete_title.value = title;
            delete_form.appendChild(delete_title);
            
            const delete_btn = document.createElement("button");
            delete_btn.innerText = "delete";
            delete_btn.type = "submit";
            delete_form.appendChild(delete_btn);
            outer.appendChild(delete_form);


            document.body.appendChild(outer);
        }

        function makeNewDoc(){
            const newDoc_form = document.createElement("form");
            newDoc_form.action = "createfile.php";
            newDoc_form.method = "post";

            const title_label = document.createElement("label");
            title_label.innerText = "title";
            newDoc_form.appendChild(title_label);
            const title_input = document.createElement("input");
            title_input.type = "text";
            title_input.name = "title";
            newDoc_form.appendChild(title_input);
            newDoc_form.appendChild(document.createElement("br"));

            const Doc_label = document.createElement("label");
            Doc_label.innerText = "document";
            newDoc_form.appendChild(Doc_label);
            const Doc_input = document.createElement("input");
            Doc_input.type = "text";
            Doc_input.name = "doc";
            newDoc_form.appendChild(Doc_input);
            newDoc_form.appendChild(document.createElement("br"));

            const submit_btn = document.createElement("button");
            submit_btn.type = "submit";
            submit_btn.innerText = "submit";
            newDoc_form.appendChild(submit_btn);

            document.body.appendChild(newDoc_form);
        }

        function editDoc(outer, doc_p, title_h){
            const editDoc_form = document.createElement("form");
            editDoc_form.action = "editfile.php";
            editDoc_form.method = "post";
            
            const edit_label = document.createElement("label");
            edit_label.innerText = "document";
            editDoc_form.appendChild(edit_label);
            const edit_input = document.createElement("input");
            edit_input.type = "text";
            edit_input.name = "doc";
            edit_input.value = doc_p.textContent;
            editDoc_form.appendChild(edit_input);
            editDoc_form.appendChild(document.createElement("br"));

            const edit_title = document.createElement("input");
            edit_title.type = "hidden";
            edit_title.name = "title";
            edit_title.textContent = title_h;
            edit_title.value = title_h.textContent;
            editDoc_form.appendChild(edit_title);
            editDoc_form.appendChild(document.createElement("br"));

            const submit_btn = document.createElement("button");
            submit_btn.type = "submit";
            submit_btn.innerText = "submit";
            editDoc_form.appendChild(submit_btn);

            outer.appendChild(editDoc_form);
        }
    </script>

    <?php //put all the files on the homepage
        error_reporting(0);
        include "DBConnection.php";
        session_start();
        echo "<br>";
        echo "<br>";
        echo "<br>";
        $uname = $_SESSION["user_name"];

        $sql = "SELECT file FROM files WHERE username='$uname'";
        $sql2 = "SELECT title FROM files WHERE username='$uname'";

        $result = mysqli_query($conn, $sql);

        $result2 = mysqli_query($conn, $sql2);

        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)) {
            $this_file = $row['file'];

            $row2=mysqli_fetch_array($result2,MYSQLI_ASSOC);
            $this_title = $row2['title'];

            echo '<script type="text/javascript">', "makeDiv('$this_title', '$this_file' );", '</script>';

        }
    ?>
    <div class="header">
        <div class="header-content">
            <h1>My Documents</h1>
            <form action="login.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <div class="container">
        <button class="create-new-button" onclick="makeNewDoc()"><!-- onclick creates input and form to sql query to add file-->
            Create New Document <br>
            <span style="font-size: 200px; font-weight: normal;">+</span>
        </button>

    </div>
    
</body>
</html>
