<?php

    require("includes/classes/Header.php");
    session_start();

    $header = new Header("homepage","homepage.css");
    $header->output();
?>

<body>
    <?php include "includes/navbar.php"; ?>

    <div class="ui grid">
        <div class="eleven wide column">
            
            <section class="posts">
                <h2>Recent posts</h2>
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
        </div>

        <div class="five wide column">
            <section class="categories">
                <h2>Categories</h2>
                <div class="categories">
                    Music
                </div>
            </section>
        </div>
    </div>
</body>
</html>