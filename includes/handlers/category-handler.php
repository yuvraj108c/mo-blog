<?php

require("../classes/Constants.php");
require("../classes/Post.php");

header('Content-type: text/xml');

if(isset($_GET["category"])){
    $category=$_GET["category"];

    $Post = new Post();
    $Post->getPostsByCategoryAndSaveToFile($category);

    // Open temp file
    $file = file_get_contents("temp.xml");
    echo $file;

    // Delete tmp file
    unlink("temp.xml");
}