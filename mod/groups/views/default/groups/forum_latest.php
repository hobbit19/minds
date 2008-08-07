<h2>Forum latest</h2>
<?php

    $forum = get_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 0, $vars['entity']->guid, 4, 0, "asc", false);
	
    if($forum){
        foreach($forum as $f){
        	    
                $count_annotations = $f->countAnnotations("group_topic_post");
                 
        	    echo "<div class=\"forum_latest\">";
    	        echo "<div class=\"topic_title\"><p>" . $f->title . " (Replies: " . $count_annotations . ")</p></div>";
    	        echo "<div class=\"topic_owner_icon\">" . elgg_view('profile/icon',array('entity' => $f->getOwnerEntity(), 'size' => 'tiny')) . "</div>";	
    	        echo "</div>";
    	        
        }
    }else{
        
        echo elgg_echo("grouptopic:notcreated");
    }
	    
?>