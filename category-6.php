  
<?php  get_header(); ?>

<section  style="margin-top:120px; margin-bottom:2%">
<div class="container-fluid">
<div class="row">
    <div class="text-center"><h1 style="text-align:center">Telecomunicaciones</h1></div>
<?php
            $args = array(
            'post_type'=> 'post',
            'category_name'  => 'telecomunicaciones',
              'orderby' => 'post_date',
            'posts_per_page'=>'3',
            'paged' => get_query_var('paged')
           );
            query_posts( $args ); 
            while (have_posts()) : the_post(); 

      global $post;
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
 ?>
    




<div class="col-md-4">
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="background:url('<?php echo $imgDestacada; ?>') center / cover;">
  <div class="mdl-card__title">
    <h2 class="mdl-card__title-text"><?php the_title() ?></h2>
  </div>
  <div class="mdl-card__supporting-text">
   <p><?php echo substr(strip_tags($post->post_content), 0, 500); ?></p>
  </div>
</div>
</div>


















    

       <?php endwhile; ?>

<?php // Wordpress Pagination
                $big = 999999999; // need an unlikely integer
                $links = paginate_links( array(
                    'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                    'format' => '?paged=%#%',
                    'current' => max( 1, get_query_var('paged') ),
                    'total' => $wp_query->max_num_pages,
                    'prev_text'    => '<',
                    'next_text'    => '>',
                    'type' => 'array'
                ) );
                if(!empty($links)){ ?>
    <div class="text-center" style=" text-align: center; width:100%">
                <ul class="pagination pagination-lg" >
                        <?php

                        foreach($links as $link){
                            ?>
                            <li><?php echo $link; ?></li>
                            <?php
                        }
                        wp_reset_query(); ?>
                    </ul>
    </div>
                    <?php } ?>
</div>
</div>    
</section>
<?php get_footer();   ?>