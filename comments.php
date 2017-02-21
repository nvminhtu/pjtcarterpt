<?/* based on twentyten comment template*/ ?>
<div id="comments">
<?php if ( post_password_required() ) : ?>
		<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.', 'rt_theme' ); ?></p>
		</div><!-- #comments -->
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php
	// You can start editing here -- including this comment!
?>

<?php /* if ( have_comments() ) : ?>
<div class="line"><span class="top">[<?php _e( 'top', 'rt_theme' ); ?>]</span></div>
			<h6 id="comments-title"><?php
			printf( _n( 'One Response to %2$s', '%1$s Responses to %2$s', get_comments_number(), 'rt_theme' ),
			number_format_i18n( get_comments_number() ), '<em>' . get_the_title() . '</em>' );
			?></h6>
			
			
<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'rt_theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'rt_theme' ) ); ?></div>
			</div> <!-- .navigation -->
<?php endif; // check for comment navigation ?>

			<ol class="commentlist">
				<?php
					/* Loop through and list the comments. Tell wp_list_comments()
					 * to use twentyten_comment() to format the comments.
					 * If you want to overload this in a child theme then you can
					 * define twentyten_comment() and that will be used instead.
					 * See twentyten_comment() in twentyten/functions.php for more.
					 */
					/*wp_list_comments(  					
                                array(
                                'walker'            => null,
                                'max_depth'         => 4,
                                'style'             => 'ul',
                                'callback'          => rt_comments, 
                                'type'              => 'all',  
                                'avatar_size'       => 48,
                                )
					); 
				?>
			</ol>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
			<div class="navigation">
				<div class="nav-previous"><?php previous_comments_link( __( '<span class="meta-nav">&larr;</span> Older Comments', 'rt_theme' ) ); ?></div>
				<div class="nav-next"><?php next_comments_link( __( 'Newer Comments <span class="meta-nav">&rarr;</span>', 'rt_theme' ) ); ?></div>
			</div><!-- .navigation -->
<?php endif; // check for comment navigation ?>

		<?php if ( ! comments_open() ) :?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'rt_theme' ); ?></p>
		<?php endif; // end ! comments_open() ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
?> 
			
<?php /* endif; // end have_comments() */ ?>




 
<?php if ($post->comment_status == 'open') : ?>
           
     
		<div id="respond">
          <div class="clear"></div>
          
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
		<p><a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>"><?php _e('Log in','rt_theme'); ?></a> <?php _e('to post a comment.','rt_theme'); ?></p>
		<?php else:?>
		<br /> <div class="line"><span class="top">[<?php _e( 'top', 'rt_theme' ); ?>]</span></div>
          <div class="respond-cont">
		<h5 id="reply-title"><?php _e('Leave a Reply','rt_theme');?></h5><span class="cancel-reply"><?php cancel_comment_reply_link(__("Cancel Reply",'rt_theme')); ?></span>
		<div class="clear"></div>
          
			<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" class="showtextback">
				<div class='personal_data'>
					<?php if ( $user_ID ) : ?>
					
						<p><?php _e('Logged in as','rt_theme'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title=""><?php _e('Log out','rt_theme'); ?> &raquo;</a></p>
						
					<?php else : ?>
                
                
                            <div class="text-boxes">
                            <input type="text" tabindex="1"  value="<?php if($comment_author):echo $comment_author;else:_e('Name','rt_theme');  if ($req) _e(' (required)','rt_theme');endif; ?>" id="author" class="comment_input" name="author"/> 			
                            <input type="text" tabindex="2"  value="<?php if($comment_author_email):echo $comment_author_email;else:_e('Email (will not be published)','rt_theme');  if ($req) _e(' (required)','rt_theme');endif; ?>" id="email" class="comment_input" name="email"/>
                            <input type="text" tabindex="3"  value="<?php if($comment_author_url):echo $comment_author_url;else:_e('Website','rt_theme');  if ($req) _e('','rt_theme');endif; ?>" id="url" class="comment_input last" name="url"/> 			
                            </div>
              
					
					<?php endif; ?>
					
				</div>
				
                    <div class="message">
                     <textarea tabindex="4" class="comment_textarea" rows="10" cols="100%" id="comment" name="comment"><?php _e('Comment','rt_theme');?></textarea>
                    </div>
                    
                    <input type="submit" value="<?php _e('Submit','rt_theme');?>" tabindex="5" id="submit" class="button comment_submit" name="submit"/>
               
				<p>
				<?php 
				comment_id_fields();
				do_action('comment_form', $post->ID);
				?></p>
			</form>
          </div>  
            
		<?php endif;?>
		</div><!-- #respond -->
<?php endif; ?>


</div><!-- #comments -->