<?php
/**
 * @package WordPress
 * @subpackage Proper-Bear-WordPress-Theme
 * @since Proper Bear 1.0
 */
?>

</div>
<?php
?>

<div class="siteFooter-wrapper">
  <footer id="footer" class="siteFooter">
    <div class="source-org vcard copyright" role="contentinfo">
      &copy;<?php echo date("Y");
            echo " ";
            bloginfo('name'); ?>
    </div>
    <?php get_template_part('module', 'contact'); ?>
    <div id="share-root"></div>
  </footer>
</div>

</div>

<?php wp_footer(); ?>

</body>

</html>