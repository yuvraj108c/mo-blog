<?php
    require("includes/classes/Header.php");
    session_start();

    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: index.php");
    }

    $header = new Header("Dashboard","dashboard.css");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <section class="posts">
        <div class="ui container">
        
        <?php 
            require "includes/classes/Constants.php";
            require "includes/classes/Post.php";

            $POST = new Post();
            $myPosts = $POST->getPostsByUsername($_SESSION["userLoggedIn"]);
            
            if(!$myPosts){
                echo "Create a post to get started!";
            }else{
                // Load XML file
                $xml = new DOMDocument;
                $xml->loadXML($myPosts);

                // Load XSL file
                $xsl = new DOMDocument;
                $xsl->load('./data/xslt/dashboard.xsl');
                
                // Configure the transformer
                $proc = new XSLTProcessor();
                
                // Attach the xsl rules
                $proc->importStyleSheet($xsl);
                echo $proc->transformToXML($xml);
            }
        ?>

        </div>
    </section>
</body>
</html>