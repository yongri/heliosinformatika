<?php get_header();?>
  
<div class="wide_wrap content">
	<div class="wrap padding-top-bottom">
    
		<h1 class="search_archive">Printed Media</h1>
		
		<?php while ( have_posts() ) : the_post();?>
		<div class='post'>
			<h2><?php echo get_post_meta( get_the_ID(), 'media', true ); ?>  </h2>
			<h3><a href="<?php the_permalink(); ?>"><?php echo the_title(); ?></a></h3>
			<hr size='1' color='grey'>
			<div class='entry' align='justify'>
				<?php the_content('Read More'); ?>
			</div>
		</div>    
		<?php endwhile; ?>
		<div class="clear"></div>
	</div>
</div>
  
<?php get_footer();?>