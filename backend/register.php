<?php

$USERS_PATH_XML = "data/users.xml";
$USERS_PATH_XSD = "data/users.xsd";

if(isset($_POST["username"]) && isset($_POST["email"]) && isset($_POST["password"])){
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if(!file_exists($USERS_PATH_XML)){
        $response = array("success" => false, "message" => "Internal Server Error.");
        echo json_encode($response);
        die("Failed to load users.xml");
    }
    $users = simplexml_load_file($USERS_PATH_XML);
    $errors = array();

    if(strlen($password) < 5){
        array_push($errors,"Password must have atleast 5 characters.");
    }

    foreach($users as $user){
        if(strtolower($user->username) == strtolower($username)){
            array_push($errors,"Username is already taken.");
        }
        if(strtolower($user->email) == strtolower($email)){
            array_push($errors,"Email already exists.");
        }
    }

    if(sizeof($errors) > 0){
        // Invalid
        $response = array("success" => false, "message" => json_encode($errors));
        echo json_encode($response);
    }else{
        // Update xml file
        $doc = new DOMDocument();
        $doc->load($USERS_PATH_XML);
        
        $userElem = $doc->createElement("user");
        $idAttr = $doc->createAttribute("id");
        $idAttr->value = sizeof($doc->getElementsByTagName("user")) + 1;
        
        $userElem->appendChild($idAttr);
        $usernameElem = $doc->createElement("username", $username);
        $emailElem = $doc->createElement("email", $email);
        $passwordElem = $doc->createElement("password", $password);
        
        $userElem->appendChild($usernameElem);
        $userElem->appendChild($emailElem);
        $userElem->appendChild($passwordElem);

        $doc->getElementsByTagName("users")[0]->appendChild($userElem);

        if (!$doc->schemaValidate($USERS_PATH_XSD)) {
            // Invalid xml
            $response = array("success" => false, "message" => "Invalid XML File.");
            echo json_encode($response);
        }else{
            // Save file
            $doc->save($USERS_PATH_XML);
            $response = array("success" => true, "message" => "Registration was successful.");
            echo json_encode($response);
        }
    }

}