<?php
class Constants
{
    // Path
    public static $usersXmlPath = "data/users.xml";
    public static $postsXmlPath = "data/posts.xml";
    public static $usersXsdPath = "data/xsd/users.xsd";
    public static $postsXsdPath = "data/xsd/posts.xsd";

    //Login
    public static $loginFailed = "Invalid username or password.";

    // Registration errors
    public static $passwordsDoNotMatch = "Your passwords don't match";
    public static $emailTaken = "This email is already in use";
    public static $usernameTaken = "This username already exists";

    public static $invalidXmlFile = "Invalid XML File.";
}