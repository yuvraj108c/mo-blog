<?php

require("../classes/Constants.php");
require("../classes/Post.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];

    $Post = new Post();
    $Post->deletePost($id);

    header("Location: ". Constants::$root . "dashboard.php");
}