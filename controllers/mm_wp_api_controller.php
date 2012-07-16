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


      if ( $_GET["url_name"] )
        $url_name = $_GET["url_name"];
        $blog = \WpMvc\Blog::find_by_name( "/{$url_name}/", true );

      if ( !isset( $blog ) && !$blog ) {
        echo "No blog found with the name $url_name";
        die;
      } else {
        $table_name = "wp_{$blog->blog_id}_posts";
        $name_column = "post_date";
      }

      switch ( $_GET["type"] ) {
        case "single":
          $post = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE $name_column <= %s ORDER BY $name_column DESC LIMIT 1;", date( 'Y-m-d H:i:s') ) );
          $post = $post[0];

          $post->short_post_date = strftime("%e %B", strtotime($post->post_date));
          $user = \WpMvc\User::find($post->post_author);

          switch ( $_GET["legacy"] ) {
            case: "1":
              $this->render( $this, "single-1" );
            break;
        break;

        case "list":
          $limit = isset( $_GET["limit"] ) ? intval( $_GET["limit"] ) : 5;
          echo $limit;
        break;

      }
    }

    public function index()
    {
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