<?php get_header();  while(have_posts()): the_post();?>
<?php if (is_page('propiedades') ) { include (TEMPLATEPATH .'/propiedades.php'); } ?>
 <?php if (is_page('inmuebles') ) { include (TEMPLATEPATH .'/inmuebles.php'); } ?>
 <?php if (is_page('internacional') ) { include (TEMPLATEPATH .'/internacional.php'); } ?>
 <?php if (is_page('contactanos') ) { include (TEMPLATEPATH .'/contactanos.php'); } ?>
<?php if (is_page('cotizar') ) { include (TEMPLATEPATH .'/cotizar.php'); } ?>

<div class="container" >

<?php the_content(); ?>
</div>



<?php endwhile; get_footer();   ?>

