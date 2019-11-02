<?php

    require("includes/classes/Header.php");
    session_start();
    // Redirect to homepage if user not logged in
    if(!isset($_SESSION["userLoggedIn"])){
        header("Location: index.php");
    }

    $header = new Header("homepage","");
    $header->output();

    include "includes/navbar.php";
    
    // Load XML file
    $xml = new DOMDocument;
    $xml->load('./data/posts.xml');

    // Load XSL file
    $xsl = new DOMDocument;
    $xsl->load('./data/xslt/posts.xsl');

    // Configure the transformer
    $proc = new XSLTProcessor();

    // Attach the xsl rules
    $proc->importStyleSheet($xsl);

    echo $proc->transformToXML($xml);
?> 