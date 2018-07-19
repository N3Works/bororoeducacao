<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match cookie
?>
				
	<p class="nocomments">Esta página é protegida com senha. Entre com a senha para ver os comentários.<p>
				
		<?php
			return;
    }
 	}

		/* This variable is for alternating comment background */
		$oddcomment = 'alt';
		?>
<div id="commentssection">
<!-- begin editing here -->
<?php if ($comments) : ?>
<h3><?php comments_number('Nenhum Comentário', '1 Comentário', '% Comentários' );?> para <em><?php the_title(); ?></em></h3> 

	<ol class="commentlist">
	<?php foreach ($comments as $comment) : ?>
    
    
    
		<li class="<?php echo $oddcomment; ?>" id="comment-<?php comment_ID() ?>">
           <?php echo get_avatar( $comment, 32 ); ?>
			<cite><?php comment_author_link() ?></cite>
			<?php if ($comment->comment_approved == '0') : ?>
			<em>Seu comentário está aguardando a aprovação do moderador.</em>
			<?php endif; ?>
			<br />
			<small class="commentmetadata"><a href="#comment-<?php comment_ID() ?>" title="">
			<?php comment_date('j \d\e F \d\e Y') ?> as <?php comment_time() ?></a> 
			<?php edit_comment_link('Moderar Comentário','',''); ?></small>

			<?php comment_text() ?>
		</li>

		<?php /* Changes every other comment to a different class */	
			if ('alt' == $oddcomment) $oddcomment = '';
			else $oddcomment = 'alt';
		?>

	<?php endforeach; /* end for each comment */ ?>
	</ol>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' == $post->comment_status) : ?> 
	<!-- If comments are open, but there are no comments. -->
		
	<?php else : // comments are closed ?>
	<!-- If comments are closed. -->
	<p class="nocomments">Comentários fechados.</p>	
	<?php endif; ?>
	
<?php endif; ?>
</div>

<div id="commentform">
<?php if ('open' == $post->comment_status) : ?>
<h3 id="respond">Deixe seu comentário</h3>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
	<p>Você deve estar <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>">logado</a> para postar um comentário.</p>

<?php else : ?>

<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

	<?php if ( $user_ID ) : ?>
	<p>Logado como <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?action=logout" title="Logout desta conta">Logout &raquo;</a></p>

	<?php else : ?>

	<p><input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" size="22" tabindex="1" /><label for="author"><small>Nome <?php if ($req) echo "(obrigatório)"; ?></small></label></p>

	<p><input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" size="22" tabindex="2" /><label for="email"><small>E-Mail (não será publicado) <?php if ($req) echo "(obrigatório)"; ?></small></label></p>

	<p><input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" size="22" tabindex="3" /><label for="url"><small>Website</small></label></p>

	<?php endif; ?>

	<p><textarea name="comment" id="commentbox" cols="100%" rows="10" tabindex="4"></textarea></p>

	<p><input name="submit" type="submit" id="submit" tabindex="5" value="Enviar" /> 
	<input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" /></p>
	
	<?php do_action('comment_form', $post->ID); ?>
</form>
<br />
Obs.: Para sua foto aparecer no comentário, você deve fezer um cadastro com sua foto no site <a href="http://www.gravatar.com" target="_blank">www.gravatar.com</a> e depois fazer um comentário em nosso site utilizando o mesmo e-mail. Automaticamente a foto irá aparecer! ;) 
<?php endif; // if registration required and not logged in ?>

<?php endif; // if you delete this the sky will fall on your head ?>
</div>
