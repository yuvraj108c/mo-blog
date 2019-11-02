<?php
class createPosts{
     public function create($title,$descri,$cat,$imgUrl,$username){
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
            $urlElem = $doc->createElement("image-url", $imgUrl);
            $createByElem = $doc->createElement("created-by",$username);
            $createOnElem = $doc->createElement("created-on",date("Y-m-d"));
            
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
?>