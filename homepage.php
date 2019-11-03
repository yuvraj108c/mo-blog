<?php

    require("includes/classes/Header.php");
    session_start();

    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: index.php");
    }
    
    $header = new Header("homepage","dashboard.css");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <section class="posts">
        <div class="ui container">

    <?php
        
        // Load XML file
        $xml = new DOMDocument;
        $xml->load('./data/posts.xml');

        // Load XSL file
        $xsl = new DOMDocument;
        $xsl->load('./data/xslt/homepage.xsl');

        // Configure the transformer
        $proc = new XSLTProcessor();

        // Attach the xsl rules
        $proc->importStyleSheet($xsl);

        echo $proc->transformToXML($xml);
    ?> 
        </div>
    </section>
</body>
</html>