<?php
get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<?php
			while ( have_posts() ) : the_post();
				$cliente = p2p_type( 'visitas_to_clientes' )->get_connected( $post->ID ); //pre($cliente);
				$cliente_link = get_permalink($cliente->post->ID);
				wp_reset_postdata(); 
			?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">
						<?php echo "<p><a href='{$cliente_link}'>voltar para {$cliente->post->post_title}</a></p>"; ?>
						<h1 class="entry-title">
							<?php
							if( post_password_required() ){
								echo 'Conteúdo protegido';
							}
							else{
								the_title();
							}
							?>
						</h1>
						<?php edit_post_link( 'Editar', '<span class="edit-link">', '</span>' ); ?>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<?php the_content(); ?>
					</div><!-- .entry-content -->
				</article><!-- #post-<?php the_ID(); ?> -->
				<?php comments_template( '', true ); ?>

			<?php endwhile; // end of the loop. ?>

		</div><!-- #content -->
	</div><!-- #primary -->

<?php get_footer(); ?>