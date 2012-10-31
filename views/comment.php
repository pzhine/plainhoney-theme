<li class="comment" id="comment-<?php comment_ID(); ?>">
	<div class="comment-meta">
    <span class="comment-author">
      <?php comment_author(); ?>
    </span>
    <span class="comment-date">
      <?php comment_time('M. jS, Y'); ?>
    </span>
    <?php edit_comment_link( 'edit', '<span class="edit-link">', '</span>' ); ?>
  </div>

	<?php if ( $comment->comment_approved == '0' ) : ?>
					<div class="pending-moderation">Your comment is awaiting moderation</div>
	<?php endif; ?>

	<div class="comment-text">
    <?php
      comment_text(); 
    ?>
  </div>
</li>