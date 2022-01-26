<div class="wrap top_stories_container">
	<div class="story_list_cont">
		<?php 
			// get all top stories post 
			$args = array( 		
			'post_type'	=> 'post',
			'posts_per_page' => 20,
			'meta_key' => 'worth_reading_stories_sort_order',
			'orderby'=>'meta_value',
			'order' =>'ASC',
			'meta_query' => array(
				array(
					'key' => 'worth_reading',
					'value' => '1',
					'compare' => '='
					)
				),		
			);		
			$posts_list = get_posts($args); 
		?>
		<h2>Worth Reading Stories</h2>
		<ul id="sorted_list" class="sort_list">
		<?php 
			if($posts_list):
				$i = 1; 
				foreach ($posts_list as $story): 					
					?>
					<li id="<?php echo $story->ID; ?>">
						<?php echo $i.'. '.$story->post_title . ' <span class="postedDate"> ' . date("g:i a j F Y",strtotime($story->post_date)) . ' </span> '; ?>
						<button class="st_delete">X</button>
					</li>				
			<?php
				$i++;
				endforeach; 
			endif; ?>
		</ul>
	</div>
	<div class="story_list_cont">
		<?php 
			// get all top stories post 
			$args = array( 		
			'post_type' => 'post',
			'posts_per_page' => 300
			);		
			$posts_list = get_posts($args); 
		?>
		<h2>Recent Stories</h2>
		<ul id="un_sorted_list" class="sort_list">
		<?php 
			if($posts_list): 
				foreach ($posts_list as $story): 
					$feat_story = get_post_meta($story->ID, 'worth_reading', true);				
					if($feat_story)
						continue;
					?>
					<li id="<?php echo $story->ID; ?>">						
						<?php echo $story->post_title . ' <span class="postedDate"> ' . date("g:i a j F Y",strtotime($story->post_date)) . ' </span> '; ?>
						<button class="st_delete">X</button>
					</li>				
			<?php endforeach; 
			endif; ?>
		</ul>
	</div>
	
	<div class="clear"></div>

	<p class="submit">
		<input type="submit" name="Submit" class="button-primary sortable_submit" value="<?php esc_attr_e('Save Changes') ?>" />
	</p>
	<script type="text/javascript">
		var data = {
			'action': 'worth-reading-sort', //Set an action for our ajax function
		};
	</script>	
	
</div>