<?php get_header(); ?>

<?php
if( get_post_meta( get_the_id(), '_di_magazine_show_breadcrumb', true ) == 1 ) {
	di_magazine_breadcrumbs();
}
?>

<div class="col-md-12">
	<div class="left-content sngl-pg" >
	<?php
	while( have_posts() ) : the_post();

		get_template_part( 'template-parts/content', 'page' );
		
		comments_template();
		
	endwhile;
	?>

	</div>
</div>
<?php get_footer(); ?>
