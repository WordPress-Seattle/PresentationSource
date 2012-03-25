<?php get_header(); ?>

<div id="primary">
	<div id="content" role="main">

		<article id="post-0" class="post error404 not-found">
			<header class="entry-header">
				<h1 class="entry-title">This is a new template</h1>
			</header>

			<div class="entry-content">
				
				<p>You can get the child theme's URL with <a href="http://codex.wordpress.org/Function_Reference/get_stylesheet_directory_uri">get_stylesheet_directory_uri()</a>:</p>
				
				<a href="http://en.wikipedia.org/wiki/Joe_Strummer">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/joe-strummer-memorial.jpg" class="aligncenter" alt="Joe Strummer memorial on Avenue A" />
				</a>
				
				<p>You can get the parent theme's URL with <a href="http://codex.wordpress.org/Function_Reference/get_template_directory_uri">get_template_directory_uri()</a>:</p>
				
				<img src="<?php echo get_template_directory_uri(); ?>/images/headers/trolley.jpg" class="aligncenter" alt="WordPress" />

				<p>FYI: <a href="http://codex.wordpress.org/Template_Hierarchy">Template Hierarchy</a></p>
			</div><!-- .entry-content -->
		</article><!-- #post-0 -->

	</div><!-- #content -->
</div><!-- #primary -->

<?php get_footer(); ?>