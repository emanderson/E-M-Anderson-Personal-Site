<?php
if ( function_exists('register_sidebar') ) {
    register_sidebars(1, array(
'name' => 'inward',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<li><strong>',
        'after_title' => '</strong></li>',
    ));
    register_sidebars(1, array(
'name' => 'outward',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<li><strong>',
        'after_title' => '</strong></li>',
    ));
    unregister_sidebar_widget ( Links );

function widget_linkslist($args) {
global $wpdb;
    extract($args);
?>

                  <?php
                   $link_cats = $wpdb->get_results("SELECT cat_id, cat_name FROM $wpdb->linkcategories");
 foreach ($link_cats as $link_cat) {
 ?>

        <?php echo $before_widget; ?>

            <?php echo $before_title
                . $link_cat->cat_name
                . $after_title; ?>
                       
    <?php wp_get_links($link_cat->cat_id); ?>
   <?php echo $after_widget; ?>
  
 <?php } ?>

        

<?php
}
register_sidebar_widget('Links List',
    'widget_linkslist');
}
?>