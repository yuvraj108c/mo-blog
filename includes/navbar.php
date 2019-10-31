<?php define("ROOT_URL", "http://localhost/mo-blog/"); ?>

<!-- Navbar -->
<nav class="ui menu">
    <div class="ui container">

        <!-- Logo -->
        <div class="logo">
            <?php
                // Change url to homepage or dashboard
                $url = "";

                if (!isset($_SESSION['userLoggedIn'])) {
                    $url = ROOT_URL;
                }else{
                    $url = ROOT_URL . "dashboard.php";
                }
                echo "<a href='".$url."'><span id='subLogo'>mo&nbsp;</span>-blog</a>";
            ?>
        </div>

        <?php
            // Check if user is logged in
            if (!isset($_SESSION['userLoggedIn'])) {

                // Display login button
                echo "<div class='buttons'>";
                echo "<a class='ui basic grey button' id='loginBtn' href='login.php'>Log In</a>";
                echo "<a class='ui teal button' id='signUpBtn' href='register.php'>Sign up</a>";
                echo "</div>";
            } else  {
                //Display logout
                echo "<div class='buttons'>";
                echo "<a class='ui basic grey button' href='includes/handlers/logout-handler.php'>Log out</a>";
                echo "</div>";
            }
            ?>
    </div>
</nav>