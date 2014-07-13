<?php get_header();?>
  
<div class="wide_wrap">
	
	<div class="wrap padding-top-bottom">
		
		<h1 class="search_archive">Printed Media</h1>
		<ul>
		<?php while ( have_posts() ) : the_post();?>
		<?php global $post;?>
			<li>
				<h3>
					<?php echo get_post_meta( get_the_ID(), 'media', true ); ?>  <br>
					
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
				<div style="font-size=10px;">Posted In <?php echo date('d M Y', strtotime($post->post_modified)); ?></div><br>
			</li>
		<?php endwhile; ?>
		<?php nuwhite_content_nav( 'nav-below' ); ?>
		</ul>
		<div class="clear"></div>

	</div>
</div>
  
<?php get_footer();?>