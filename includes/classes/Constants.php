<?php
class Constants
{
    // Path
    public static $usersXmlPath = "data/users.xml";

    //Login
    public static $loginFailed = "Invalid username or password.";

    // Registration errors
    public static $passwordsDoNoMatch = "Your passwords don't match";
    public static $passwordCharacters = "Your password must be between 5 and 30 characters";
    public static $emailTaken = "This email is already in use";
    public static $usernameTaken = "This username already exists";
}