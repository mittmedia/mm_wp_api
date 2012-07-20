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
      global $current_site;


      if ( $_GET["url_name"] ) {
        $url_name = $_GET["url_name"];
        $blog = \WpMvc\Blog::find_by_name( "/{$url_name}/", true );
      }

      switch ( $_GET["type"] ) {
        case "single":
          if ( !isset( $blog ) && !$blog ) {
            echo "No blog found with the name $url_name";
            die;
          } else {
            $table_name = "wp_{$blog->blog_id}_posts";
            $name_column = "post_date";
          }
          $post = $wpdb->get_results( $wpdb->prepare( "SELECT * FROM $table_name WHERE $name_column <= %s ORDER BY $name_column DESC LIMIT 1;", date( 'Y-m-d H:i:s') ) );
          $post = $post[0];

          $post->short_post_date = strftime("%e %B", strtotime($post->post_date));
          $user = \WpMvc\User::find($post->post_author);

          switch ( $_GET["legacy"] ) {
            case "1":
              $this->render( $this, "single-1" );
            break;
          }
        break;

        case "list":
          global $list_data;

          $post_by_blog_limit = isset($_GET["posts_from_blog"]) ? intval($_GET["posts_from_blog"]) : 1;
          $limit = isset($_GET["limit"]) ? intval($_GET["limit"]) : 10;
          $start_at = isset($_GET["start_at"]) ? (intval($_GET["start_at"])-1) : 0;

          $blogs = \WpMvc\Blog::all( false );

          $posts_data = array();
          $list_data = array();

          foreach ( $blogs as $blog ) {
            $posts_data = $wpdb->get_results( $wpdb->prepare( "SELECT post_date, post_author, post_title, guid FROM wp_{$blog->blog_id}_posts WHERE post_status = 'publish' AND post_date <= %s ORDER BY post_date DESC LIMIT {$post_by_blog_limit};", date( 'Y-m-d H:i:s') ) );
            foreach ( $posts_data as $post_data ) {
              if ($post_data->post_title) {
                $list_data[$post_data->post_date] = $post_data;
                $list_data[$post_data->post_date]->path = $blog->path;
                $list_data[$post_data->post_date]->author = $post_data->post_author;
                $list_data[$post_data->post_date]->post_time = strftime("%H:%M", strtotime($post_data->post_date));
              }
            }
          }

          krsort($list_data);

          $list_data = array_slice($list_data, $start_at, $limit);
          foreach ( $list_data as $list_item ) {
            $blog = \WpMvc\Blog::find_by_name( $list_item->path, true );
            $list_item->blog = $blog;
            $list_item->user = \WpMvc\User::find($list_item->author, false);
          }
          $limit = isset( $_GET["limit"] ) ? intval( $_GET["limit"] ) : 5;
          $this->render( $this, "list-1" );
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