<?php

	/**
	 * Elgg all group forum discussions page
	 * This page will show all topic dicussions ordered by last comment, regardless of which group 
	 * they are part of
	 * 
	 * @package ElggGroups
	 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
	 * @author Dave Tosh <dave@elgg.com>
	 * @copyright Curverider Ltd 2008
	 * @link http://elgg.com/
	 */

	// Load Elgg engine
		require_once(dirname(dirname(dirname(__FILE__))) . "/engine/start.php");
		
    // Get the current page's owner
		$page_owner = page_owner_entity();
		if ($page_owner === false || is_null($page_owner)) {
			$page_owner = $_SESSION['user'];
			set_page_owner($page_owner->getGUID());
		}
		
	// Display them
	    $area2 = elgg_view_title(elgg_echo("groups:alldiscussion"));
		set_context('search');
	    $area2 .= list_entities_from_annotations("object", "groupforumtopic", "group_topic_post", "", 40, 0, 0, false, true);
	    set_context('groups');
	    
	    $body = elgg_view_layout("two_column_left_sidebar", '', $area2);
        
    // Display page
		page_draw(sprintf(elgg_echo('groups:user')),$body);
		
		
?>