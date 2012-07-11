<?php

namespace MmWpApi
{
  class MmWpApiController extends \WpMvc\BaseController
  {
    public function api_call()
    {
      global $blogs;
      global $blog;
      global $wpdb;
      global $post;
      global $posts;

      switch ( $_GET["type"] ) {
        case "single":

          if ( $_GET["url_name"] )
            $blog = \WpMvc\Blog::find_by_name( "/hastlivpaschemat/", true );

          if ( isset( $blog ) && $blog ) {

            $table_name = "wp_{$blog->blog_id}_posts";
            $name_column = "post_date";
            $post = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE $name_column <= %s ORDER BY $name_column DESC LIMIT 1;", date( 'Y-m-d H:i:s') ) );
            $post = $post[0];
            //var_dump($results);

            #$return_object = new $class_name();



            $this->render( $this, "single" );
          }

          exit();
        break;
      }
      exit();
      #echo "ergrtg";
      //$blogs = \WpMvc\Blog::all(false);
      //foreach ( $blogs as $blog ) {
      //  echo $blog->path;
      //}

      //echo "<pre>";
      //print_r( $blogs );
      //echo "</pre>";
    }

    public function index()
    {
      //global $current_site;
      //global $site;

      //$site = \WpMvc\Site::find( $current_site->id );

      if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
        echo "POST";
      }
      if ( $_GET ) {
        echo "GET";
      }

      $this->render( $this, "index" );

    }
  }
}