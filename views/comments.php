
<div class="comments">
	<?php if ( have_comments() ) : ?>

    <h5>...buzz buzz...</h5>
  
		<ol class="commentlist">
			<?php
				wp_list_comments( array( 'callback' => 'plainhoney_comment' ) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
		<nav id="nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'twentyeleven' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'twentyeleven' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'twentyeleven' ) ); ?></div>
		</nav>
		<?php endif; ?>

	<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we don't want the note on pages or post types that do not support comments.
		 */
		elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) :
	?>
		<p class="nocomments"><?php _e( 'Comments are closed.', 'plainhoney' ); ?></p>
	<?php endif; ?>

	<?php 
    $fields = array(
        'author' => 
          '<li><label for="author">name</label><input id="author" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . $aria_req . ' /></li>',
        'email' => 
          '<li><label for="email">email</label><input id="email" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . $aria_req . ' /></li>'
      );
    $args = array(
      'fields' => $fields,
      'comment_field' =>
        '<li class="comment-form-comment"><label for="comment">Comment</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></li>',
      'title_reply' => '<div class="add-comment">Add a comment</div>',
      'comment_notes_before' => '<ul>',
      'comment_notes_after' => '</ul>'
    );
    comment_form($args); 
  ?>

</div><!-- #comments -->
