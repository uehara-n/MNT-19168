<?php get_header();

?>

  <!--コンテンツ囲みここから -->
  <div id="contents_wrap" class="clearfix">

    <!--メインコンテンツここから -->
    <div id="main_contents">

    	<div class="contents_box png">
        <div class="wrap2 png">
          <div class="box2 png">
            <h2><img src="<?php bloginfo( 'template_url' ); ?>/event/tit.jpg" alt="イベント情報" /></h2>
          </div>
        </div>
      </div>

 				<!--customer_navi-->


				<!--event_content-->
    	<div class="contents_box png">
        <div class="wrap2 png">
          <div class="box2 png">


<?php query_posts( $query_string.'&showposts=30' ); ?>
<?php if( have_posts() ): ?>
                      <?php while( have_posts() ): the_post(); ?>
				<div class="event_content clearfix">
						<!--event_content_left-->
						<div class="event_content_left">
								<p class="pic">
									<?php
									echo gr_get_image(
										'イベントメイン画像',
										array( 'size' => 'thumbnail', 'alt' => esc_attr( post_custom( 'イベント画像説明文01' ) ) )
									)
									?>
										<?php if ( post_custom('イベント画像インポート用メイン') ) : ?>
									      <a href="<?php echo get_permalink(); ?>"><img src="<?php echo site_url(); ?>/wp-content/themes/gaiheki/event/page_image<?php echo post_custom( 'イベント画像インポート用メイン' ); ?>" border="0"></a>
	                 <?php endif; ?>

								</p>
						</div>
						<!--event_content_left-->

						<!--event_content_right-->
						<div class="event_content_right">
								<h3 class="event_title"><?php the_title(); ?></h3>
								<div class="event_text">
										<p><strong>開催日：</strong><?php echo post_custom( 'イベント日時' ); ?><br />
										<strong>開催場所：</strong><?php echo post_custom( 'イベント開催場所 1' ); ?></p>
								</div>
						</div>
						<!--event_content_right-->

						<div class="event_btn_area">
								<p class="event_btn"><a href="<?php the_permalink() ?>" class="banner_alpha"><img src="<?php echo get_stylesheet_directory_uri(); ?>/event/event_btn.gif" alt="詳しく見る" width="158" height="35" class="img_over" /></a></p>
						</div>
				</div>
				<!--event_content-->
				<?php endwhile; ?>
      <?php else: ?>

      <?php endif; ?>
				<!--customer_navi-->
				<div class="customer_navi clearfix">
						<div class="customer_navi_left">
								<p class="customer_red"><?php echo gr_get_posts_count(); ?>件</p>
						</div>

            <div class="page_nav">
                <div class="tablenav"><?php global $wp_rewrite;
    $paginate_base = get_pagenum_link(1);
    if (strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()) {
        $paginate_format = '';
        $paginate_base = add_query_arg('paged', '%#%');
    } else {
        $paginate_format = (substr($paginate_base, -1 ,1) == '/' ? '' : '/') .
        user_trailingslashit('page/%#%/', 'paged');;
        $paginate_base .= '%_%';
    }
    echo paginate_links( array(
        'base' => $paginate_base,
        'format' => $paginate_format,
        'total' => $wp_query->max_num_pages,
        'mid_size' => 5,
        'current' => ($paged ? $paged : 1),
    )); ?></div>
               </div>
				</div>

<?php get_kaiyu(); ?>
</div>
</div>
</div>
				<!--customer_navi-->

	<br style="clear:both;" />
    <?php get_kaiyutoiawase(); ?>
    </div>
    <!--メインコンテンツここまで -->

    <?php get_sidebar(); ?>

  </div>
  <!--コンテンツ囲みここまで -->

<?php get_footer(); ?>
