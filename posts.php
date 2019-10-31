<?php

$POSTS_PATH_XML = "data/posts.xml";

if(!file_exists($POSTS_PATH_XML)){
    $response = array("success" => false, "message" => "Internal Server Error.");
    echo json_encode($response);
    die("Failed to load posts.xml");
}

$posts = file_get_contents($POSTS_PATH_XML);

echo $posts;