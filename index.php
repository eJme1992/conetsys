<?php  get_header();   
 while(have_posts()): the_post();?>
 <section>
<div class="container">

    <h2><?php the_title() ?></h2>  
	<?php the_content(); 

		$thumbID = get_post_thumbnail_id($post->ID);
                  echo  $imgDestacada = wp_get_attachment_url($thumbID);
	?>

</div>
</section>
<?php endwhile;
get_footer();   ?>