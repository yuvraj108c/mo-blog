<?php
    require("includes/classes/Header.php");
    session_start();

    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: homepage.php");
    }

    $header = new Header("create","create.css");
    $header->output();

?>
<body>
    <?php
        require "includes/classes/Constants.php";
        require "includes/classes/Post.php";

        if (isset($_POST["save"])){
            $username=$_SESSION["userLoggedIn"];
            $title = $_POST['title'];
            $descri = $_POST['descri'];
            $cat =  $_POST['cat'];
            $imgURL =  $_POST['imgURL'];

            $create =new Post();
            $success = $create->createPost($title,$descri,$cat,$imgURL,$username);

            if(!$success){
                echo "Error";
            }else{
                header("Location:dashboard.php");
            }
        }
    ?>

    <?php include "includes/navbar.php"; ?>

    <div id="wrapper">
        <div class="ui attached message">
        <div class="header">
            Create Post
        </div>
        </div>
        <form class="ui form attached fluid segment" method="POST" action="create.php">
            <div class="field">
                <label>Title</label>
                <input type="text" placeholder="Title" name="title" value="Test Post"  required>
            </div>
            <div class="field">
                <label>Description</label>
                <textarea placeholder="Description" name="descri"  required>Thisis a descriptoin"</textarea>
            </div>
            <div class="field">
                <label>Category</label>
                <input type="text" placeholder="Category" name="cat" value="Music" required>
            </div>
            <div class="field">
                <label>Image URL</label>
                <input type="text" placeholder="Image URL" name="imgURL" value="https://voicesofbaltimorecom.files.wordpress.com/2018/07/news.jpg" required>
            </div>
            
            <button class="ui blue submit button" type="submit" name="save" id="save" value="save">Save</div>
        </form>
    </div>
</body>