 <?php
setlocale( LC_TIME, 'sv_SE.utf8');

global $list_data;
global $current_site;

?>
<div class="customBlog_customBlogListTeaserWrapper">
  <?php
  $i = 1;
  foreach ( $list_data as $list_item )
  {
    #print_r($list_item->user->ID);
    ?>
    <div class="customBlog_blogListTeaser position<?= $i; ?> <?= $i == 1 ? 'first' : ''; ?>">
      <div class="customBlog_blogImageTeaser">
        <img alt="<?= $list_item->blog->option->blogname->option_value ?>" class="the_author_photo size_40" src="http://<?= $current_site->domain ?>/wp-content/uploads/mm-uploads/userphotos/thum_<?= $list_item->user->ID ?>_40.jpg" />
      </div>
      <div class="customBlog_blogHeadline">
        <div class="customBlog_blogLabel"><?= $list_item->blog->option->blogname->option_value ?></div>
        <div class="customBlog_blogDate"><?= $list_item->post_time ?></div>
        <a onclick="window.open(this.href); return false;" href="<?= $list_item->guid ?>"><?= $list_item->post_title ?></a>
      </div>
      <div class="customBlog_clearer"><!-- --></div>
    </div>
    <!--
    <div class="customBlog_blogListTeaser position2">
      <div class="customBlog_blogImageTeaser">
        <img alt="Linda &Aring;berg Luthman - H&ouml;ga Kusten Poeten" class="the_author_photo size_40"
        src="http://blogg.allehanda.se/wp-content/uploads/mm-uploads/userphotos/thum_112_40.jpg" />
      </div>
      <div class="customBlog_blogHeadline">
        <div class="customBlog_blogLabel">Linda Åberg Luthman - Höga Kusten Poeten</div>
        <div class="customBlog_blogDate">07:48</div>
        <a onclick="window.open(this.href); return false;" href="http://blogg.allehanda.se/lindaabergluthmanhogakustenpoeten/?p=122/">Idag blir det väder.</a>
      </div>
    </div>
    -->
  <?php
    $i++;
  } ?>
</div>