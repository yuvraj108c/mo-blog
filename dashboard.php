<?php
    require("includes/classes/Header.php");
    session_start();
    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: index.php");
    }

    $header = new Header("Dashboard","");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>
    <h1>Dashboard</h1>
</body>
</html>