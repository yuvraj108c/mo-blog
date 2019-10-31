<?php
    require "includes/classes/Header.php";
    $header = new Header("Login","login.css");
    $header->output();
?>

<body>

    <?php 
        require "includes/classes/Constants.php";
        require "includes/classes/Account.php";
        require "includes/classes/Messages.php";

        session_start();

        if(isset($_POST['loginBtn'])){
            $username = $_POST['username'];
            $password =  $_POST['password'];

            $account = new Account();

            if(!$account->validateUserLogin($username,$password)){
                // Display error message
                Messages::setMsg($account->getErrors()[0],"error");
            }else{
                $_SESSION['userLoggedIn'] = $username;
                
                // Go to dashboard
                header("Location: dashboard.php");
            }
        }
    ?>

    <section id="login">

        <h2>Log in into your account</h2>

        <div class="ui card">

            <div class="content">

                <form method="POST" class="ui form" action="login.php">

                    <!-- Username -->
                    <div class="field">
                        <label>Username</label>
                        <input type="text" name="username" placeholder="Username" value="John" required>
                    </div>

                    <!-- Password -->
                    <div class="field">
                        <label>Password</label>
                        <input type="password" name="password" placeholder="Password" value="12345" required>
                    </div>

                    <!-- Message -->
                    <?php echo Messages::display(); ?>

                    <!-- Submit btn -->
                    <button class="ui fluid large button teal" type="submit" name="loginBtn">Login</button>

                </form>

                <div class="bottom">
                    Don't have an account? <a href="register.php">&nbsp;Sign up</a>
                </div>

            </div>

    </section>

</body>

</html>