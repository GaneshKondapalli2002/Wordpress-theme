<?php
/**
 * The template file for displaying the comments and comment form for the

 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
*/
?>
  <div class="comments" id="comments"> 
	<?php
  if ( post_password_required() ) {
	  return;
  }
  if ( $comments ) {
		$comments_number = absint( get_comments_number() );
  ?>
  <div class="comments-header">
		<h3 class="comment-reply-title">
		<?php
		if ( ! have_comments() ) {
		esc_html_e( 'Leave a comment', 'vaxi' );
		} elseif ( '1' === $comments_number ) {
		/* translators: %s: post title */
		printf( esc_html_x( 'One reply on &ldquo;%s&rdquo;', 'comments title', 'vaxi' ), esc_html( get_the_title() ) );
		} else {
		echo sprintf(
		/* translators: 1: number of comments, 2: post title */
		esc_html(_nx(
			'%1$s reply on &ldquo;%2$s&rdquo;',
			'%1$s replies on &ldquo;%2$s&rdquo;',
			$comments_number,
			'comments title',
			'vaxi'
		)),
		number_format_i18n( $comments_number ),
		esc_html( get_the_title() )
		);
	  }
    ?>
	  </h3><!-- .comments-title -->
  </div><!-- .comments-header -->
	<div class="comments-inner section-inner thin max-percentage">
	<?php
	wp_list_comments(
	  array(
			'walker'      => new TwentyTwenty_Walker_Comment(),
			'avatar_size' => 120,
			'style'       => 'div',
		)
	);
	$comment_pagination = paginate_comments_links(
		array(
					'echo'      => false,
					'end_size'  => 0,
					'mid_size'  => 0,
					'next_text' => esc_html__( 'Newer Comments', 'vaxi' ) . ' <span aria-hidden="true">&rarr;</span>',
					'prev_text' => '<span aria-hidden="true">&larr;</span> ' . esc_html__( 'Older Comments', 'vaxi' ),
				)
		);
		if ( $comment_pagination ) {
		  $pagination_classes = '';
			// If we're only showing the "Next" link, add a class indicating so.
			if ( false === strpos( $comment_pagination, 'prev page-numbers' ) ) {
				$pagination_classes = ' only-next';
			}
			?>
			<nav class="comments-pagination pagination
      <?php 
      echo esc_html($pagination_classes); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- static output ?>" aria-label="<?php esc_attr_e( 'Comments', 'vaxi' ); ?>">					
      <?php 
      $allowed_html = wp_kses_allowed_html (array(
      'a' => array(
         'class' => array(),
         'href' => array(),
         'title' => array()
       )
       )
       );
       echo wp_kses( $comment_pagination, $allowed_html ); ?>
		   </nav>
			<?php
			}
			?>
		</div><!-- .comments-inner -->
	<?php
  }
  if ( comments_open() || pings_open() ) {
	if ( $comments ) {
		echo '';
	}
  $comment_args = array( 
  'title_reply'=> esc_html__('Join the Discussion', 'vaxi') ,
  'comment_notes_before'=> esc_html__('Your email address will not be published.', 'vaxi') ,
  'fields' => apply_filters( 'comment_form_default_fields', array(  
  'author' => '<div class="col-md-12 mt-1 p-0 mb-1">' . 
  '<label>' .esc_html__("Enter your name", 'vaxi') . '</label>' .
	'<input class="form-control form-control-lg" id="author" placeholder=' .esc_html__("Name", 'vaxi') . '  name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) . '" size="30"' . ' /></div>',   
  'email'  => '<div class="col-md-12 p-0 mb-1">' .
	'<label>' .esc_html__("Enter your email", 'vaxi') . '</label>' .
  '<input class="form-control form-control-lg" id="email" placeholder=' .esc_html__("Email", 'vaxi') . ' name="email" type="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="30"' . ' />'.'</div>',
 ) ),
  'comment_field' => '<div class="col-12 p-0 mb-1">
	<label>' .esc_html__("Enter your message", 'vaxi') . '</label>' .
  '<textarea class="form-control" id="comment" placeholder=' .esc_html__("Comment", 'vaxi') . ' name="comment" cols="45" rows="8" aria-required="true"></textarea>' .
  '</div>',
  'comment_notes_after' => ''
);
comment_form($comment_args);
} elseif ( is_single() ) {
?>
<div class="comment-respond" id="respond">
<p class="comments-closed"><?php esc_html_e( 'Comments are closed.', 'vaxi' ); ?></p>
</div><!-- #respond -->
<?php
} 	?>   
</div>    