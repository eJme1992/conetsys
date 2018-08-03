<?php
include_once 'url.php';
get_header();
while (have_posts()): the_post();
    global $post;
    $title = get_the_title($post->ID);
    $thumbID = get_post_thumbnail_id($post->ID);
    $imgDestacada = wp_get_attachment_url($thumbID);
    ?>

    <section class="row container"  id="noticias">
        <div class="center-block col-md-12">
            <div class="panel-body panel center-block"> 
              
               

                <div class="col-md-10 text-center">
                    <h1><b><?= $title ?></b></h1>
                
                </div>

                <div class="col-md-offset-1 col-md-10 contenido text-justify">

                    <?= the_content(); ?>
                </div>

                <div class="col-md-12">

                    <?php comments_template(); ?>


                </div>


            </div>
        </div>

    </section>

    <?php
endwhile;
get_footer();
?>