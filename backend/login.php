<?php

$USERS_PATH_XML = "data/users.xml";

if(isset($_POST["email"]) && isset($_POST["password"])){
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!file_exists($USERS_PATH_XML)){
        $response = array("success" => false, "message" => "Internal Server Error.");
        echo json_encode($response);
        die("Failed to load users.xml");
    }

    $usersXML = simplexml_load_file($USERS_PATH_XML);

    $isValid = false;
    $response;

    // Validate logins
    foreach($usersXML as $user){
        if($user->email == $email && $user->password == $password){
            $isValid = true;
            break;
        }
    }

    if(!$isValid){
        $response = array("success" => false, "message" => "Invalid email or password.");
        echo json_encode($response);
    }else{
        $response = array("success" => true, "message" => "Valid Logins.");
        echo json_encode($response);
    }

}