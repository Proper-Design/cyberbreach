<?php 

// takes a single param $name and returns a use element

function proper_icon($name){

  if(isset($name)){

    $svg_root = get_stylesheet_directory_uri() . '/_/svg/symbols.svg';
    $svg_relative_root = wp_make_link_relative($svg_root);
    $use_format = '<use xlink:href="%1$s#%2$s">';

    return sprintf($use_format, $svg_root, $name);

  }else{
    return null;
  }

}

 ?>