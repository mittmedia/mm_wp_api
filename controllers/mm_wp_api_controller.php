<?php

namespace MmWpApi
{
  class MmWpApiController extends \WpMvc\BaseController
  {
    public function api_call()
    {
      global $blogs;
      global $blog;

      switch ( $_GET["type"] ) {
        case "single":

          if ( $_GET["url_name"] )
            $blog = \WpMvc\Blog::find_by_name( "/sotebrod/", true );

          if ( isset( $blog ) && $blog ) {
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