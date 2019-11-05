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
        
        $Post =new Post();
        $id = $_GET["id"];
        $currentPost = $Post->getPostById($id);

    ?>

    <?php include "includes/navbar.php"; ?>

    <div id="wrapper">
        <div class="ui attached message">
        <div class="header">
            Create Post
        </div>
        </div>
        <form class="ui form attached fluid segment" method="POST" action="<?php echo constants::$root . 'includes/handlers/edit-handler.php' ?>">
            <div class="field">
                <label>Title</label>
                <input type="text" placeholder="Title" name="title" value="<?php echo($currentPost->title) ?>"  required>
            </div>
            <div class="field">
                <label>Description</label>
                <textarea placeholder="Description" name="descri"  required><?php echo($currentPost->description) ?></textarea>
            </div>
            <div class="field">
                <label>Category</label>
                <input type="text" placeholder="Category" name="cat" value="<?php echo($currentPost->category) ?>" required>
            </div>
            <div class="field">
                <label>Image URL</label>
                <input type="text" placeholder="Image URL" name="imgURL" value="<?php echo($currentPost->imageUrl) ?>" required>
            </div>
            
            <button class="ui blue submit button" type="submit" name="save" value="<?php echo($currentPost->id) ?>">Save</div>
        </form>
    </div>
</body>