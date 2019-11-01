<?php
    require("includes/classes/Header.php");
    session_start();

    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: index.php");
    }

    $header = new Header("Dashboard","dashboard.css");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <section class="posts">
        <div class="ui container">
        
        <?php 
            require "includes/classes/Constants.php";
            require "includes/classes/Post.php";
            
            $post = new Post();
            $userPosts = $post->getPostsByUsername($_SESSION["userLoggedIn"]);
            
            $post->outputPosts($userPosts);
        ?>

        </div>
    </section>
</body>
</html>