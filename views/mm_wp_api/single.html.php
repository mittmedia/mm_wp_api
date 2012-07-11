<?php
global $blog;
global $post;
echo "<pre>";
var_dump( $blog->options->siteurl->option_value );
#var_dump( $blog );
echo "</pre>";
?>
<div xmlns:dc="http://purl.org/dc/elements/1.1/" class="blogTeaser customBlogTeaser">
  <div class="blogDate first">
    <span class="articleDate">29 maj</span>
  </div>
  <div class="blogHeadline">
    <span class="blogLabel withoutLink">Daniela</span>

    <span class="blogLabel withLink">
      <a onclick="window.open(this.href); return false;" href="<?= $blog->options->siteurl->option_value ?>">Daniela</a>
    </span>

    <span class="blogDate middle">
      <span class="articleDate">29 maj</span>
    </span>
    <span class="blogAuthor">daniela</span>

    <a onclick="window.open(this.href); return false;" href="<?= $post->guid ?>"><?= $post->post_title ?></a>

  </div>

  <div class="blogDescription">
    <span class="blogLabel withoutLink">Daniela</span>
    <span class="blogLabel withLink">
      <a onclick="window.open(this.href); return false;" href="<?= $blog->options->siteurl->option_value ?>">Daniela</a>
    </span>
    <span class="blogDate middle">
      <span class="articleDate">29 maj</span>
    </span>
    <span class="blogAuthor">daniela</span>
    <a onclick="window.open(this.href); return false;" href="<?= $post->guid ?>">
      <?= \WpMvc\TextHelper::shorten( $post->post_content, 200 ) ?>
    </a>
  </div>
  <div class="blogDescriptionOneForty">
    <span class="blogLabel withoutLink">Daniela</span>
    <span class="blogLabel withLink">
      <a onclick="window.open(this.href); return false;" href="<?= $blog->options->siteurl->option_value ?>">Daniela</a>
    </span>
    <span class="blogDate middle">
      <span class="articleDate">29 maj</span>
    </span>
    <span class="blogAuthor">daniela</span>
    <a onclick="window.open(this.href); return false;" href="<?= $post->guid ?>">
      <?= \WpMvc\TextHelper::shorten( $post->post_content, 140 ) ?>
    </a>
  </div>
  <div class="blogDescriptionHeader">
      <div class="blogImageFromPolopoly">
        <img src="${daniela}"></div>
        <span class="blogLabel withoutLink">Daniela</span>
        <span class="blogLabel withLink">
          <a onclick="window.open(this.href); return false;" href="<?= $blog->options->siteurl->option_value ?>">Daniela</a>
        </span>
        <span class="blogDate middle">
          <span class="articleDate">29 maj</span>
        </span>
        <span class="blogAuthor">daniela</span>
        <a onclick="window.open(this.href); return false;" href="<?= $post->guid ?>">
          <span class="blogTextLabel">Blogg
            <span class="blogTextColon">:</span>
          </span>
          <span class="blogTextQuote">"</span>
            <?= \WpMvc\TextHelper::shorten( $post->post_content, 100 ) ?>
          <span class="blogTextEndQuote">"</span>
        </a>
        <div class="blogAuthorAndTitle">
          <span class="blogAuthor">daniela</span>
          <span class="comma">,<span class="spacer"> </span></span>
          <span class="blogTitle">Daniela</span>
        </div>
  </div>
  <div class="blogDate last">
    <span class="articleDate">29 maj</span>
  </div>
   <div class="clearer"><!--.--></div>
</div>