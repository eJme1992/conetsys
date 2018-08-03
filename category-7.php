  
<?php  get_header(); ?>

<section  style="margin-bottom:2%">
<div class="container-fluid">
<div class="row">
    <div class="col-md-12 text-center"><h1><b><i class="fa fa-signal" aria-hidden="true"></i>
 Telecomunicaciones<br></b></h1></div>
 <div class="col-md-12" style="height:25px"></div>
<?php
            $args = array(
            'post_type'=> 'post',
            'category_name'  => 'telecomunicaciones',
              'orderby' => 'post_date',
            'posts_per_page'=>'12',
            'paged' => get_query_var('paged')
           );
            query_posts( $args ); 
            while (have_posts()) : the_post(); 

      global $post;
$thumbID = get_post_thumbnail_id( $post->ID );
$imgDestacada = wp_get_attachment_url( $thumbID );
 ?>
    




<div class="col-md-3" style="margin-top:8%; margin-bottom:6%;" >
<div class="demo-card-wide mdl-card mdl-shadow--2dp" style="background:url('<?php echo $imgDestacada; ?>') center / cover; width:100%;">
  <div style="background-color: rgba(223, 223, 223,0.7); min-height:300px;">
  <div class="mdl-card__title" style="">
    <h2 class="mdl-card__title-text"><h4><b><i class="fa fa-check" aria-hidden="true"></i>
<?php the_title() ?></b></h4></h2>
  </div>
  <div class="mdl-card__supporting-text">
   <p><?php echo substr(strip_tags($post->post_content), 0, 500); ?></p>
  </div>
</div>
</div>
<div style="height:15px"></div>
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