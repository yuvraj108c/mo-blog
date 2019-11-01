<?php

class Post{
    public function getPostsByUsername($username){
        $userPosts = array();
        $postsXML = simplexml_load_file(Constants::$postsXmlPath);

        foreach($postsXML as $post){
            if($post->author == $username){
                array_push($userPosts,$post);
            }
        }
        return $userPosts;
    }
    public function outputPosts($posts){
        if (sizeof($posts) > 0) {
            foreach($posts as $p){
                echo "
                <div class='ui divided items'>
                    <div class='item'>
                        <div class='ui small image'>
                            <img src='".$p->imageUrl ."'>
                        </div>
                    <div class='content'>
                        <div class='header'>".$p->title ."</div>
                        <div class='description'>
                            <p>".$p->description ."</p>
                        </div>
                    <div class='meta'>
                        <span class='author'>".$p->author ."</span>
                        <span class='date'>".$p->createdOn ."</span>
                    </div>
                  </div>
                </div>";
        }
}
    }
}