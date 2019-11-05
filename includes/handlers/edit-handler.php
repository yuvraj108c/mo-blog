<?php

require("../classes/Constants.php");
require("../classes/Post.php");

if (isset($_POST["save"])){
    $id=$_POST["save"];
    $title = $_POST['title'];
    $descri = $_POST['descri'];
    $cat =  $_POST['cat'];
    $imgURL =  $_POST['imgURL'];

    $Post = new Post();
    $Post->updatePost($id,$title,$descri,$cat,$imgURL);
    header("Location: ". Constants::$root . "dashboard.php");
}