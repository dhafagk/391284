<div id="comments" class="comments-area">
<?php
/**
 *
 *  Comments themplate - Adapted Version of Kubrick's
 *
 *  There are 2 distinct sections after the protection area ::
 *  Display Comments is a loop surrounding the wp_list_comments() function
 *  The Form/Login section uses comment_form() to do everything
 *  ( Finally the RSS link is at the end of the page )
 *
 *  */
 
// ##########  Do not delete these lines
if ( post_password_required() ) { ?>
    <p class="no-comments"><?php _e('This post is password protected. Enter the password to view comments.', 'kubrick'); ?></p>
<?php
    return; }
// ##########  End do not delete section
 
// Display Comments Section
if ( have_comments() ) : ?>
		<h3><?php comments_number('No Responses', 'One Response', '% Responses');?> <?php printf('to %s', the_title('', '', false)); ?></h3>
        <div class="comment-navigation">
            <div class="align-left"><?php previous_comments_link() ?></div>
            <div class="align-right"><?php next_comments_link() ?></div>
        </div>
    <ol class="commentlist">
     <?php
     wp_list_comments(array(
      // see http://codex.wordpress.org/Function_Reference/wp_list_comments
      // 'login_text'        => 'Login to reply',
      // 'callback'          => null,
      // 'end-callback'      => null,
      // 'type'              => 'all',
      // 'avatar_size'       => 32,
      // 'reverse_top_level' => null,
      // 'reverse_children'  =>
      ));
      ?>
    </ol>
        <div class="comment-navigation">
            <div class="align-left"><?php previous_comments_link() ?></div>
            <div class="align-right"><?php next_comments_link() ?></div>
        </div>
    <?php
    if ( ! comments_open() ) : // There are comments but comments are now closed
        echo"<p class='no-comments'>Comments are closed.</p>";
    endif;
 
else : // I.E. There are no Comments
    if ( comments_open() ) : // Comments are open, but there are none yet
        // echo"<p>Be the first to write a comment.</p>";
    else : // comments are closed
        // Put Something Here if you want it to say anything when comments are disabled
    endif;
endif;
 
// Display Form/Login info Section
// the comment_form() function handles this and can be used without any paramaters simply as "comment_form()"
comment_form(array(
  // see codex http://codex.wordpress.org/Function_Reference/comment_form for default values
  // tutorial here http://blogaliving.com/wordpress-adding-comment_form-theme/
  'comment_field' => '<p><textarea name="comment" id="comment" cols="58" rows="10" tabindex="4" aria-required="true"></textarea></p>',
  'label_submit' => 'Submit Comment',
  'comment_notes_after' => ''
  ));
 
?>
</div>