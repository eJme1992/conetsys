<?php
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('Please do not load this page directly. Thanks!');
}

if (post_password_required()) {
    ?>
    <?php _e('This post is password protected. Enter the password to view comments.', 'html5reset');?>
    <?php
return;
}
?>

<?php if (have_comments()): ?>

    <h2 id="comments"><?php comments_number(__('No Responses', 'html5reset'), __('One Response', 'html5reset'), __('% Responses', 'html5reset'));?></h2>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link()?></div>
        <div class="prev-posts"><?php next_comments_link()?></div>
    </div>

    <ol class="commentlist panel panel-body">
        <?php wp_list_comments();?>
    </ol>

    <div class="navigation">
        <div class="next-posts"><?php previous_comments_link()?></div>
        <div class="prev-posts"><?php next_comments_link()?></div>
    </div>

<?php else: // this is displayed if there are no comments so far ?>

        <?php if (comments_open()): ?>
            <!-- If comments are open, but there are no comments. -->

        <?php else: // comments are closed ?>
            <p><?php _e('Comments are closed.', 'html5reset');?></p>

        <?php endif;?>

<?php endif;?>

<?php if (comments_open()): ?>

    <div id="respond">

        <h2 class="comentario"><?php comment_form_title(__('Deje su comentario', 'html5reset'), __('Leave a Reply to %s', 'html5reset'));?></h2>

        <div class="cancel-comment-reply">
            <?php cancel_comment_reply_link();?>
        </div>

        <?php if (get_option('comment_registration') && !is_user_logged_in()): ?>
            <p><?php _e('You must be', 'html5reset');?> <a href="<?php echo wp_login_url(get_permalink()); ?>"><?php _e('logged in', 'html5reset');?></a> <?php _e('to post a comment.', 'html5reset');?></p>
        <?php else: ?>

            <form style="margin-bottom:10px;" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">

                <?php if (is_user_logged_in()): ?>

                    <p><?php _e('Logged in as', 'html5reset');?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e('Log out', 'html5reset');?> &raquo;</a></p>
                 <div class="col-md-10">
          f      <?php else: ?>

                    <div class="col-md-10">
                        <div>
                            <input class="form-control" placeholder="Name" required="" type="text" name="author" id="author" value="<?php echo esc_attr($comment_author); ?>" size="22" tabindex="1" <?php if ($req) {
    echo "aria-required='true'";
}
?> />

                        </div>

                        <div>
                            <input class="form-control" placeholder="Email" required="" type="email" name="email" id="email" value="<?php echo esc_attr($comment_author_email); ?>" size="22" tabindex="2" <?php if ($req) {
    echo "aria-required='true'";
}
?> />

                        </div>

                        <!--    <div>
                                        <input class="form-control"  type="text" name="url" id="url" value="<?php echo esc_attr($comment_author_url); ?>" size="22" tabindex="3" />
                                        <label for="url"><?php _e('Website', 'html5reset');?></label>
                                </div>-->


                    <?php endif;?>

                        <!--<p>You can use these tags: <code><?php echo allowed_tags(); ?></code></p>-->

                        <div style="margin-bottom:15px;">
                        <textarea required="" class="form-control" name="comment" id="comment" cols="58" rows="10" tabindex="4"></textarea>
                    </div>




                </div>
                <div class="col-md-10 text-center">
                   <!-- <input style="margin-top:20%" class="btn btn-lg center-block" name="submit" type="submit" id="submit" tabindex="5" value='<?php _e('Enviar <i class="fa fa-plus"></i>', 'html5reset');?>' />
                   -->
                   <button style="margin-top:15px" class="btn btn-lg btn-danger center-block" name="submit" type="submit" id="submit" tabindex="5">Enviar <i class="fa fa-location-arrow"></i></button>
                     <?php comment_id_fields();?>
                    <?php do_action('comment_form', $post->ID);?>
                </div>

            </form>

        <?php endif; // If registration required and not logged in ?>

    </div>

<?php endif;?>
