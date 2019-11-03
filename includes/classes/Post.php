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

}