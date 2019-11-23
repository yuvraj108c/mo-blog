<?php

    require("includes/classes/Header.php");
    session_start();

    $header = new Header("homepage","details.css");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <section class="details">
        <div class="ui container">

    <?php
        require("includes/classes/Constants.php");
        require("includes/classes/Post.php");
        $id = $_GET["id"];

        $Post = new Post();
        $myPost = $Post->getPostById($id);
    ?> 

    <div class="post">
        <h1><?php echo $myPost->title ?></h1>
        <div class="meta">
            <span class="ui label"><?php echo $myPost->category ?></span>
            <span><i class="user icon"></i> <?php echo $myPost->author ?> </span>
            <span><i class="left calendar icon"></i> <?php echo $myPost->createdOn ?> </span>
        </div>
        <img src="<?php echo $myPost->imageUrl ?>" />
        <p class="description"><?php echo $myPost->description ?></p>
    </div>

        </div>
    </section>
</body>
</html>