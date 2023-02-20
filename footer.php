<?php
/**
 * The theme footer component.
 *
 * @package WordPress
 */

?>

</div>

<div class="siteFooter-wrapper">
	<footer id="footer" class="siteFooter">
	<div class="source-org vcard copyright" role="contentinfo">
		&copy;
		<?php
		echo esc_attr( gmdate( 'Y' ) );
			echo ' ';
			bloginfo( 'name' );
		?>
	</div>
	<div id="share-root"></div>
	</footer>
</div>

</div>

<?php wp_footer(); ?>

</body>

</html>
