<?php

    require("includes/classes/Header.php");
    session_start();

    $header = new Header("homepage","homepage.css");
    $header->output();
?>

<body>
    <script src="assets/js/homepage.js"></script>

    <?php include "includes/navbar.php"; ?>

    <div class="ui grid">
        <div class="eleven wide column">
            
            <section class="posts">
                <h2>Recent posts</h2>
                <div class="ui container">
                    <?php 
                        if(!isset($_GET["category"])){
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
                        }else{
                            echo "<div class = 'ui divided items' id='posts'></div>";
                        }
                    ?>
                </div>
            </section>
        </div>

        <div class="five wide column">
            <section class="categories">
                <h2>Categories</h2>
                <div class="categories">
                    <?php 
                        require("includes/classes/Constants.php");
                        require("includes/classes/Post.php");

                        $Post = new Post();
                        $categories = $Post->getPostCategories();

                        $category = null;
                        
                        if(isset($_GET["category"])){
                            $category = $_GET["category"];
                        }
                        
                        foreach($categories as $c){
                            $url = "homepage.php?category=" . $c;
                            
                            if($category && $c == $category){
                                echo "<a class='ui teal label' href='".$url ."'>".$c . "</a>";
                            }else{
                                echo "<a class='ui label' href='".$url ."'>".$c . "</a>";
                            }
                        }
                    ?>
                </div>
            </section>
        </div>
    </div>

</body>
</html>