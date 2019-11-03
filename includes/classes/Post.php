<?php

class Post{
    public function getPostsByUsername($username){
        $userPosts = array();
        $postsXML = simplexml_load_file(Constants::$postsXmlPath);
        $hasPosts = false;
        $xml = new SimpleXMLElement("<posts/>");

        foreach($postsXML as $post){
            if($post->author == $username){
                $hasPosts = true;

                $p = $xml->addChild("post");
                $p->addChild("title", $post->title);
                $p->addChild("description", $post->description);
                $p->addChild("category", $post->category);
                $p->addChild("imageUrl", $post->imageUrl);
                $p->addChild("author", $post->author);
                $p->addChild("createdOn", $post->createdOn);
            }
        }

        if($hasPosts){
            return $xml->asXML();
        }else{
            return false;
        }
    }
    public function createPost($title,$descri,$cat,$imgUrl,$username){
        $users = simplexml_load_file(Constants::$postsXmlPath);

            // Update xml file
            $doc = new DOMDocument();
            $doc->load(Constants::$postsXmlPath);
            
            $postElem = $doc->createElement("post");
            $idAttr = $doc->createAttribute("id");
            $idAttr->value = sizeof($doc->getElementsByTagName("post")) + 1;
            
            $postElem->appendChild($idAttr);
            $titleElem = $doc->createElement("title", $title);
            $descriElem = $doc->createElement("description", $descri);
            $catElem = $doc->createElement("category", $cat);
            $urlElem = $doc->createElement("imageUrl", $imgUrl);
            $createByElem = $doc->createElement("author",$username);
            $createOnElem = $doc->createElement("createdOn",date("Y-m-d"));
            
            $postElem->appendChild($titleElem);
            $postElem->appendChild($descriElem);
            $postElem->appendChild($catElem);
            $postElem->appendChild($urlElem);
            $postElem->appendChild($createByElem);
            $postElem->appendChild($createOnElem);

            $doc->getElementsByTagName("posts")[0]->appendChild($postElem);

           if (!$doc->schemaValidate(Constants::$postsXsdPath)) {
                // Invalid xml
                array_push($this->errorArray, Constants::$invalidXmlFile);
                return false;
            }else{
               // Save file
                $doc->save(Constants::$postsXmlPath);
                return true; 
            }
         }
}