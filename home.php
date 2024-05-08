<?php
/*add formatting for home page 
- display files if there
-select files to edit delete or download
--button to make new file */
     
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document Home</title>
    <link rel="stylesheet" type="text/css" href="home_style.css">
</head>
<body>
    <div class="header">
        <div class="header-content">
            <h1>My Documents</h1>
            <form action="logout.php" method="post">
                <button type="submit">Logout</button>
            </form>
        </div>
    </div>
    <div class="container">
        <button class="create-new-button">
            Create New Document <br>
            <span style="font-size: 200px; font-weight: normal;">+</span>
        </button>

        <!-- documents go here --> 
        <div class="documents">
            <h2>Document 1</h2>
            <p>This is the content of Document 1.</p>
            <button>Edit</button>
        </div>
        <div class="documents">
            <h2>Document 2</h2>
            <p>This is the content of Document 2.</p>
            <button>Edit</button>
        </div>
        <div class="documents">
            <h2>Document 3</h2>
            <p>This is the content of Document 3.</p>
            <button>Edit</button>
        </div>
        <div class="documents">
            <h2>Document 4</h2>
            <p>This is the content of Document 4.</p>
            <button>Edit</button>
        </div>
        <div class="documents">
            <h2>Document 5</h2>
            <p>This is the content of Document 5.</p>
            <button>Edit</button>
        </div>
        <div class="documents">
            <h2>Document 6</h2>
            <p>This is the content of Document 6.</p>
            <button>Edit</button>
        </div>
    </div>
</body>
</html>
