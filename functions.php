<?php
/*
*My Theme Functions */

// Theme Title
add_theme_support( 'title-tag' );

// Theme css and  jquery file calling
  function pal_css_js_file_calling(){
    wp_enqueue_style( 'pal-style', get_stylesheet_uri( ) );
    wp_register_style( 'pal-bootstrap',get_template_directory_uri().'/css/bootstrap.min.css',array(),'5.0.2','all' );
    wp_register_style( 'pal-custom',get_template_directory_uri().'/css/custom.css',array(),'1.0.0','all' );
    wp_enqueue_style( 'pal-bootstrap');
    wp_enqueue_style( 'pal-custom');

    // jquery
    wp_enqueue_script('jquery');
    wp_enqueue_script('pal-bootstrap',get_template_directory_uri().'/js/bootstrap.min.js',array(),'5.0.2','true');
    wp_enqueue_script('pal-main',get_template_directory_uri().'/js/main.js',array(),'1.0.0','true');

  }
  add_action( 'wp_enqueue_scripts','pal_css_js_file_calling' );

  //Theme function
  function ali_customizer($wp_customize){
      $wp_customize->add_section('ali_header_area',array(
        'title'=>__('Header area','kaziaftab'),
        'description'=>('If your are interested to update here.'),
      ));

      $wp_customize->add_setting('ali_logo',array(
        'default'=> get_bloginfo('template_directory').'/img/logo.png',
      ));
      $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,'ali_logo',array(
        'label'=> 'Logo Upload',
        'description'=>('If your are interested to update logo here.'),
        'setting'=> 'ali_logo',
        'section'=> 'ali_header_area',

      )));

  }
  add_action( 'customize_register','ali_customizer');


