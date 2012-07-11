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
      global $user;

      switch ( $_GET["type"] ) {
        case "single":

          if ( $_GET["url_name"] )
            $url_name = $_GET["url_name"];
            $blog = \WpMvc\Blog::find_by_name( "/{$url_name}/", true );

          if ( isset( $blog ) && $blog ) {

            $table_name = "wp_{$blog->blog_id}_posts";
            $name_column = "post_date";
            $post = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE $name_column <= %s ORDER BY $name_column DESC LIMIT 1;", date( 'Y-m-d H:i:s') ) );
            $post = $post[0];

            $post->short_post_date = strftime("%e %B", strtotime($post->post_date));
            $user = \WpMvc\User::find($post->post_author);

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