<?php
    require("includes/classes/Header.php");

    $header = new Header("Register","register.css");
    $header->output();
?>

<body>

    <?php
        require "includes/classes/Constants.php";
        require "includes/classes/Account.php";
        require "includes/classes/Messages.php";
        
        session_start();

        $username="";
        $email="";
        $pwd1="";
        $pwd2="";

        if(isset($_POST['registerBtn'])){
            $username = $_POST['username'];
            $email = $_POST['email'];
            $pwd1 =  $_POST['pwd1'];
            $pwd2 =  $_POST['pwd2'];

            if($pwd1 !== $pwd2){
                Messages::setMsg(Constants::$passwordsDoNotMatch,"error");
            }else{

                $account = new Account();
                
                if(!$account->registerUser($username,$email,$pwd1)){
                    // Display error message
                    Messages::setMsg($account->getErrors()[0],"error");
                }else{
                    // Go to login
                    header("Location: login.php");
                }
            }
        }
    ?>

    <?php include "includes/navbar.php"; ?>

    <section id="register">

        <div class="right">

            <h2>Create a new account</h2>

            <div class="ui card">

                <div class="content">

                    <form class="ui large form" method="POST" action="register.php" >

                            <!-- Username -->
                            <div class="field">
                                <label>Username</label>
                                <div class="ui icon input">
                                    <input type="text" name="username" placeholder="Username" value="<?php echo($username)?>"  required>
                                </div>
                            </div>

                            <!-- Email address -->
                            <div class="field">
                                <label>Email</label>
                                <div class="ui icon input">
                                    <input type="email" name="email" placeholder="Email" value="<?php echo($email)?>"  required>
                                </div>
                            </div>


                            <!-- Password -->
                            <div class="field">
                                <label>Password</label>
                                <div class="ui icon input">
                                    <input type="password" name="pwd1" placeholder="Password" value="<?php echo($pwd1)?>"  required>
                                </div>
                            </div>

                            <!-- Confirm password -->
                            <div class="field">
                                <label>Confirm Password</label>
                                <div class="ui icon input">
                                    <input type="password" name="pwd2" placeholder="Confirm password" value="<?php echo($pwd2)?>"  required>
                                </div>
                            </div>
<br>

                            <!-- Message -->
                            <?php echo Messages::display(); ?>

                        <!-- Submit  -->
                        <button class="ui fluid large submit button teal" type="submit" name="registerBtn"
                            id="registerBtn">Sign up</button>

                    </form>

                    <div class="bottom">
                        Already have an account? <a href="login.php">&nbsp;Log In</a>
                    </div>

                </div>

            </div>

        </div>

    </section>

</body>

</html>