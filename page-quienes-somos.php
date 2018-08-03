<?php
get_header();
?>

<section id="about">
    <div class="row" style="width:100%">
        
        <div class="col-md-10 mx-auto card-body">
            <div class="text-center">
                <h1><b>NOSOTROS</b></h1>
 

            </div>



            <?php
            if (have_posts()): while (have_posts()): the_post();
                    global $post;
                    $thumbID = get_post_thumbnail_id($post->ID);
                    $imgDestacada = wp_get_attachment_url($thumbID);
                    ?>
                    <div class="text-justify">
                        <img src="<?php echo $imgDestacada; ?>" class="img-responsive center-block">
                        <?php the_content(); ?>
                        <hr>
                    </div>
                    <?php
                endwhile;
            endif;
            ?>




        </div>
    </div>
</section>
<div class="text-center"><h1>VALORES</h1></div>
<div  style="background: url('<?php echo get_stylesheet_directory_uri() ?>/img/fondo23.jpg') no-repeat center top fixed;-webkit-background-size: cover; background-size: cover; min-height:300px">
            <div  class="row" style="color:#fff; width:100%">

            <?php
            $args = array(
                'post_type' => 'valor',
                'orderby' => 'date',
                'order' => 'asc',
                'posts_per_page' => 10,
                'paged' => get_query_var('paged')
            );
            query_posts($args);
            while (have_posts()) : the_post();

                global $post;

                $thumbID = get_post_thumbnail_id($post->ID);
                $imgDestacada = wp_get_attachment_url($thumbID);
                ?>

                           

                        <div class="col-md-3 text-center" style="margin-top:15px; margin-bottom:15px;">
                            <div>
                                
                                <h2><?php the_title() ?></h2>
                                <div class="text-justify"><?php the_content(); ?></div>
                                 <img src="<?php echo $imgDestacada; ?>" class="img-responsive img-rounded img-thumbnail center-block">
                            </div>
                        </div>
                     
                

            <?php endwhile; ?>
</div>
</div>
<hr>
<div>
	<div class="text-center"><h1>NUESTRAS INSTALACIONES</h1></div>
    <?php echo do_shortcode("[WRGF id=176]"); ?> 
</div>
<?php get_footer(); ?>